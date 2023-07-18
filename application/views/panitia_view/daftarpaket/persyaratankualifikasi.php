<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/js/bootstrap-multiselect.js" integrity="sha512-s0VCuriWT4mPGBCj40RRj2np9tC8DZzn1csx9SBgpQ0kD5O7JDh40UhMmSe55WcCO1XVxY9dhskbEtwqBI+8mw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/css/bootstrap-multiselect.css" integrity="sha512-OHshaM9AIV6bjWvySuN7LZ8NCLs6NJIpbMTEO5O1EssOPCJGjuiB3fD8eutT3V/ENgo0+cS+2WUAHL2NdGsyZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<div class="container">
    <form action="" id="form_update_audit">
        <input type="hidden" name="tahun_audit_terselek">
    </form>
    <!-- ========================INI UNTUK BAGIAN CHEKED  -->
    <!-- TDP -->
    <form action="" id="form_checked_tdp">
        <input type="hidden" name="checked_tdp">
    </form>

    <form action="" id="form_masa_berlaku_tdp">
        <input type="hidden" name="mulai_berlaku_tdp">
        <input type="hidden" name="selesai_berlaku_tdp">
    </form>

    <form action="" id="form_reset_tdp">
        <input type="hidden" name="reset_tdp">
    </form>

    <form action="" id="update_ke_persyartan_seumur_hidup">
        <input type="hidden" name="id_persyaratan_vms_detail_second">
    </form>

    <form action="" id="update_nib_terselek">
        <input type="hidden" name="nib_terselek">
    </form>
    <?php for ($i = 1; $i < 99; $i++) {  ?>
        <form action="" id="update_ke_persyartan_seumur_hidup">
            <input type="hidden" id="berlaku_mulai_all<?= $i ?>" name="masa_berlaku_mulai">
        </form>
    <?php } ?>

    <!-- ========================END CHECKED -->
    <input type="hidden" name="id_paket" id="soyun" value="<?= $paket['id_paket'] ?>">
    <input type="hidden" name="id_paket" id="soyun2" value="<?= $paket['id_paket'] ?>">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb bg-primary">
            <li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Daftar Paket &raquo; Persyaratan Kualifikasi</a></li>
        </ol>
    </nav>
    <div class="bs-callout bs-callout-info">
        <b>Petunjuk :</b><br />
        1. Pilih Persyaratan Kualifikasi dengan memberikan ceklis dan<br />
        2. Untuk Menambahkan Persyartan Kualifikasi,klik button Tambah Syarat
    </div>
    <div id="demo"></div>
    <?= $this->session->flashdata('message') ?>
    <?= $this->session->flashdata('error') ?>
    <div style="padding: 20px;">
        <?php if ($cek_persyaratan_vms == null) { ?>
            <form method="POST" action="<?= base_url('panitiajmtm/daftarpaket/simpan_persyaratan_tender/' . $paket['id_paket']) ?>">
                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                    <div class="card-header btn-grad">
                        Persyratan Kualifikasi
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header btn-grad">
                                        <label for="">NIB (NO. KBLI)</label>
                                    </div>
                                    <div class="card-body">
                                        <center>

                                            <select name="nib_persyaratan" id="nib_persyaratan" class="form-control select2bs4" style="width: 200px;">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($nib as $key => $value) { ?>
                                                    <option value="<?= $value['sub_kategori_nib4'] ?>"><?= $value['sub_kategori_nib4'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </center>
                                        <center>
                                            <div style="overflow-x: true;" class="pl-5 pr-5">
                                                <table class="table">
                                                    <thead id="table_nib">
                                                        </tbody>
                                                </table>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header btn-grad">
                                        <label for="">Keuangan</label>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <select name="status_audit" id="audit" class="form-control select2bs4" style="width: 200px;">
                                                <option value="Audit">Audit</option>
                                                <option value="Tidak Audit">Tidak Audit</option>
                                            </select>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header btn-grad">
                                        <label for="">Tahun Audit</label>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <select name="tahun_audit" id="" class="form-control select2bs4" style="width: 200px;">
                                                <option value="2018 - 2019">2018 - 2019</option>
                                                <option value="2019 - 2020">2019 - 2020</option>
                                                <option value="2020 - 2021">2020 - 2021</option>
                                                <option value="2021 - 2022">2021 - 2022</option>
                                                <option value="2022 - 2023">2022 - 2023</option>
                                                <option value="2023 - 2024">2023 - 2024</option>
                                                <option value="2024 - 2025">2024 - 2025</option>
                                                <option value="2025 - 2026">2025 - 2026</option>
                                                <option value="2026 - 2027">2026 - 2027</option>
                                                <option value="2027 - 2028">2027 - 2028</option>
                                                <option value="2028 - 2029">2028 - 2029</option>
                                                <option value="2029 - 2030">2029 - 2030</option>
                                            </select>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                    <div class="card-header btn-grad">
                        Persyratan Kualifikasi
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="btn-grad">
                                    <th>No</th>
                                    <th></th>
                                    <th>Nama Persyaratan</th>
                                    <th colspan="3">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $berlaku = 1;
                                $seumur_hidup = 1;
                                foreach ($perysaratan_vms as $key => $value) { ?>
                                    <tr>
                                        <td style="width: 10px;"><?= $no++ ?></td>
                                        <td><input type="checkbox" value="1" name="status_persyaratan_vms[]"></td>
                                        <td style="width: 400px;"><?= $value['nama_persyaratan_vms'] ?></td>
                                        <input type="hidden" name="nama_persyaratan_detail[]" value="<?= $value['nama_persyaratan_vms'] ?>">
                                        <td> <select id="seumur_hidup<?= $seumur_hidup ?>" class="form-control form-control-sm select2" name="seumur_hidup[]">
                                                <option value="0">Tidak Seumur Hidup</option>
                                                <option value="1">Seumur Hidup</option>
                                            </select>
                                            <small class="text-danger"><i>Pilih Masa Berlaku Persyaratan!!</i></small>
                                        </td>
                                        <td id="berlaku_mulai<?= $berlaku ?>" style="width: 150px;"><select name="tanggal_mulai_berlaku[]" class="form-control form-control-sm select2bs4">
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </td>
                                        <td id="berlaku_selesai<?= $berlaku ?>" style="width: 150px;"><select name="tanggal_selesai_berlaku[]" class="form-control form-control-sm select2bs4">
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php $berlaku++ ?>
                                    <?php $seumur_hidup++ ?>
                                <?php  } ?>
                            </tbody>
                        </table>
                        <center>
                            <button type="submit" class="btn btn-grad8 text-white" style="width: 300px;"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </center>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <form method="POST" action="<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_tender/' . $paket['id_paket']) ?>" id="form_update_perysaratan">
                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                    <div class="card-header btn-grad">
                        Persyratan Kualifikasi
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                    <div class="card-header btn-grad">
                                        <label for="">NIB (NO. KBLI)</label>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <select name="nib_persyaratan" id="nib_persyaratan" class="form-control select2bs4" style="width: 200px;">
                                                <option value="<?= $cek_nib_dan_audit['nib_persyaratan'] ?>"><?= $cek_nib_dan_audit['nib_persyaratan'] ?>-- Pilih --</option>
                                                <?php foreach ($nib as $key => $value) { ?>
                                                    <option value="<?= $value['sub_kategori_nib4'] ?>"><?= $value['sub_kategori_nib4'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </center>
                                        <center>
                                            <div style="overflow-x: true;" class="pl-5 pr-5">
                                                <table class="table">
                                                    <thead id="table_nib">
                                                        </tbody>
                                                </table>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                    <div class="card-header btn-grad">
                                        <label for="">Status Audit</label>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <select name="status_audit" id="audit" class="form-control select2bs4" style="width: 200px;">
                                                <option value="<?= $cek_nib_dan_audit['status_audit'] ?>"><?= $cek_nib_dan_audit['status_audit'] ?></option>
                                                <option value="Audit">Audit</option>
                                                <option value="Tidak Audit">Tidak Audit</option>
                                            </select>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                    <div class="card-header btn-grad">
                                        <label for="">Tahun Audit</label>
                                    </div>
                                    <div class="card-body">
                                        <center>
                                            <select name="tahun_audit" id="" class="form-control select2bs4" style="width: 200px;">
                                                <option value="<?= $cek_nib_dan_audit['tahun_audit'] ?>"><?= $cek_nib_dan_audit['tahun_audit'] ?></option>
                                                <option value="2018 - 2019">2018 - 2019</option>
                                                <option value="2019 - 2020">2019 - 2020</option>
                                                <option value="2020 - 2021">2020 - 2021</option>
                                                <option value="2021 - 2022">2021 - 2022</option>
                                                <option value="2022 - 2023">2022 - 2023</option>
                                                <option value="2023 - 2024">2023 - 2024</option>
                                                <option value="2024 - 2025">2024 - 2025</option>
                                                <option value="2025 - 2026">2025 - 2026</option>
                                                <option value="2026 - 2027">2026 - 2027</option>
                                                <option value="2027 - 2028">2027 - 2028</option>
                                                <option value="2028 - 2029">2028 - 2029</option>
                                                <option value="2029 - 2030">2029 - 2030</option>
                                            </select>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-grad8 ml-4 mb-5 text-white" style="width: 300px;"><i class="fas fa-save mr-2"></i>Update</button>
                    </center>
                </div>
            </form>
            <br>
            <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                <div class="card-header btn-grad">
                    persyaratan Dari VMS
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="btn-grad">
                                <th>No</th>
                                <th></th>
                                <th>Nama Persyaratan</th>
                                <th colspan="3">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $buat_checked = 1;
                            $id_persyaratan_vms_detail_nomer = 1;
                            $berlaku = 1;
                            $seumur_hidup = 1;
                            foreach ($cek_persyaratan_vms as $key => $value) { ?>
                                <tr>
                                    <input type="hidden" value="<?= $value['id_persyaratan_vms_detail'] ?>" name="id_persyaratan_vms_detail" id="id_persyaratan_vms_detail<?= $id_persyaratan_vms_detail_nomer ?>">
                                    <td style="width: 10px;"><?= $no++ ?></td>
                                    <td>
                                        <?php if ($value['status_persyaratan_vms'] == 1) { ?>
                                            <input type="checkbox" id="persyaratan_checked<?= $buat_checked ?>" checked value="1" name="status_persyaratan_vms[]">
                                        <?php } else { ?>
                                            <input type="checkbox" id="persyaratan_checked<?= $buat_checked ?>" value="1" name="status_persyaratan_vms[]">
                                        <?php } ?>
                                    </td>
                                    <td style="width: 400px;"><?= $value['nama_persyaratan_detail'] ?></td>
                                    <input type="hidden" name="nama_persyaratan_detail[]" value="<?= $value['nama_persyaratan_detail'] ?>">
                                    <td>
                                        <?php if ($value['seumur_hidup'] == 1) { ?>
                                            <center>
                                                <a href="javascript:;" class="btn btn-sm btn-success" onclick="update_masa_berlaku(<?= $value['id_persyaratan_vms_detail'] ?>)">Seumur Hidup</a><br>
                                                <small class="text-danger"><i>Pilih Masa Berlaku Persyaratan!!</i></small>
                                            </center>
                                        <?php } else { ?>
                                            <center>
                                                <a href="javascript:;" class="btn btn-sm btn-danger" onclick="update_masa_berlaku2(<?= $value['id_persyaratan_vms_detail'] ?>)">Tidak Seumur Hidup</a><br>
                                                <small class=" text-danger"><i>Pilih Masa Berlaku Persyaratan!!</i></small>
                                            </center>
                                        <?php } ?>
                                    </td>
                                    <?php if ($value['seumur_hidup'] == 1) { ?>

                                    <?php } else { ?>
                                        <td style="width: 150px;">
                                            <?php if ($value['tanggal_berlaku_awal'] == NULL) { ?>
                                                <a href="javascript:;" onclick="update_masa_tahun(<?= $value['id_persyaratan_vms_detail'] ?>)" class="btn btn-sm btn-grad"><?= $value['tanggal_berlaku_awal'] ?> <i class="fa fa-calendar-alt"></i> Pilih Tahun <?= $value['tanggal_berlaku_selesai'] ?></a>
                                            <?php } else { ?>
                                                <a href="javascript:;" onclick="update_masa_tahun(<?= $value['id_persyaratan_vms_detail'] ?>)" class="btn btn-sm btn-grad"><i class="fa fa-calendar-alt"></i> <?= $value['tanggal_berlaku_awal'] ?> - <?= $value['tanggal_berlaku_selesai'] ?></a>
                                            <?php } ?>

                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php $berlaku++ ?>
                                <?php $seumur_hidup++ ?>
                                <?php $buat_checked++ ?>
                                <?php $id_persyaratan_vms_detail_nomer++ ?>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Button trigger modal -->
                <!-- <?php if ($paket['id_metode_pemilihan'] == 8) { ?>

				<?php    } else { ?>
					<center>
						<button type="button" style="width: 300px;" class="btn btn-primary" onclick="lihat_vendor_ke_undang(<?= $paket['id_paket'] ?>)">
							<i class="fas fa-users"></i> Detail Vendor Terundang
						</button>
					</center>
				<?php } ?> -->
                <br>
            </div>
        <?php } ?>
        <form method="POST" action="<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_tender/' . $paket['id_paket']) ?>">
            <div class="row" style="margin-top: 40px;">
                <div class="col-md-12">
                    <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                        <div class="card-header btn-grad">
                            Persyratan tambahan
                            <button type="button" class="btn btn-sm btn-grad9 text-white float-right" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                                Tambah Persyaratan
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="table_syarat_syarat">
                                <tr>
                                    <th width="250px">Nama Persyaratan</th>
                                    <th width="400px">Keterangan</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nama_persyaratan'] ?></td>
                                        <td><?= $value['keterangan'] ?></td>
                                        <td>
                                            <?php
                                            if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                <p>Tidak ada File</p>
                                            <?php } else { ?>
                                                <a href="<?= base_url('file_persyaratan_tambahan/' . $value['file_persyaratan_tambahan']) ?>">
                                                    <img width="25px" src="<?= base_url('assets/img/file-icon.png') ?>" alt=""></a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!-- <a href="javascript:;" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal<?= $value['id_persyaratan_tender'] ?>">
												<i class="fa fa-edit"></i>
											</a> -->
                                            <a href="<?= base_url('panitiajmtm/daftarpaket/delete_persyaratan_tambahan/' . $value['id_persyaratan_tender']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <br>
        <center>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Persyartaan Peralatan </th>
                        <th>Persyartaan Tenaga Ahli </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php if ($paket['sts_peralatan'] == 1) { ?>
                                <a href="javascript:;" onclick="unupdate_status_peralatan(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-success">Sudah Dipilih <i class="fa fa-check"></i></a>
                            <?php  } else { ?>
                                <a href="javascript:;" onclick="update_status_peralatan(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-danger">Belum Dipilih <i class="fa fa-times"></i></a>
                            <?php   }  ?>
                        </td>
                        <td>
                            <?php if ($paket['sts_tenaga_ahli'] == 1) { ?>
                                <a href="javascript:;" onclick="unupdate_status_tenaga_ahli(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-success">Sudah Dipilih <i class="fa fa-check"></i></a>
                            <?php  } else { ?>
                                <a href="javascript:;" onclick="update_status_tenaga_ahli(<?= $paket['id_paket'] ?>)" class="btn btn-sm btn-danger">Belum Dipilih <i class="fa fa-times"></i></a>
                            <?php   }  ?>
                    </tr>
                </tbody>
            </table>
        </center>
        <br>
        <a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 300px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
    </div>
</div>

</div>
</div>

<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
    <div class="modal fade" id="exampleModal<?= $value['id_persyaratan_tender'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header btn-grad">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Persyaratan Kualifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('panitiajmtm/daftarpaket/update_persyaratan_tambahan/' . $value['id_paket']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b> Nama Persyaratan</b></label>
                            <input class="form-control" name="nama_persyaratan" value="<?= $value['nama_persyaratan'] ?>">
                            <br>
                            <label for="exampleFormControlTextarea1"><b> Keterangan </b></label>
                            <textarea class="form-control" name="keterangan"><?= $value['keterangan'] ?></textarea>
                            <input type="hidden" name="id_persyaratan_tender" value="<?= $value['id_persyaratan_tender'] ?>">
                            <input type="hidden" name="id_paket" value="<?= $value['id_paket'] ?>">
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-grad">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Persyaratan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('panitiajmtm/daftarpaket/persyaratan_tambahan_save/' . $paket['id_paket']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><b> Nama Persyaratan</b></label>
                        <input class="form-control" name="nama_persyaratan_tambahan">
                        <br>
                        <label for="exampleFormControlTextarea1"><b> Keterangan </b></label>
                        <textarea class="form-control" name="keterangan_tambahan"></textarea>
                        <br>
                        <label for=""><b> Lampiran File </b></label>
                        <input type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file_persyaratan_tambahan" class="form-control form-control-sm">
                        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_update_masa_berlaku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-grad">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Tahun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update_tahun_persyaratan">
                    <div class="form-group">
                        <input type="hidden" name="id_persyaratan_vms_detail_for_tahun">
                        <label><b>Tahun Mulai Berlaku</b></label>
                        <select name="tanggal_berlaku_awal_for_tahun" class="form-control form-control-sm select2bs4">
                            <option value="2020">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                        <br>
                        <label><b>Tahun Selesai Berlaku</b></label>
                        <select name="tanggal_berlaku_selesai_for_tahun" class="form-control form-control-sm select2bs4">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="vendor_ke_undang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header btn-grad">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Vendor Terundang Sesuai Persyaratan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover" id="table_vendor_terundang_persyaratan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nib</th>
                            <th>Nama Vendor</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL UPDATE SEUMUR HIDUP -->