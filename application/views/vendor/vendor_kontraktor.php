<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<div class="container">
    <br>
    <ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
        <li><a style="text-decoration: none; color:white;" href="#">Vendor Aktif</a></li>

    </ol>
    <div class="content">
        <h6>Filter SBU</h6>
        <div class="row">
            <div class="col-md-6">
                <select name="filter_sbu" class="form-control">
                    <option value="">Semua</option>
                    <?php foreach ($sbu as $key => $value) { ?>
                        <option value="<?= $value['id_sbu'] ?>"><?= $value['kode_sbu'] ?> | <?= $value['nama_sbu'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <h6>Filter SBU Kualifikasi Usaha</h6>
        <div class="row">
            <div class="col-md-6">
                <select class="form-control" name="kualifikasi_usaha_sbu" id="exampleFormControlSelect1">
                    <option value="Kualifikasi Besar (B1)">Kualifikasi Besar (B1)</option>
                    <option value="Kualifikasi Besar (B2)">Kualifikasi Besar (B2)</option>
                    <option value="Kualifikasi Menengah (M1)">Kualifikasi Menengah (M1)</option>
                    <option value="Kualifikasi Menengah (M2)">Kualifikasi Menengah (M2)</option>
                    <option value="Kualifikasi Kecil (K1)">Kualifikasi Kecil (K1)</option>
                    <option value="Kualifikasi Kecil (K2)">Kualifikasi Kecil (K2)</option>
                    <option value="Kualifikasi Kecil (K3)">Kualifikasi Kecil (K3)</option>
                </select>
            </div>
        </div>
        <br>
        <button class="btn btn-sm btn-grad7" style="width: 100px;  color:white" name="filter" id="filter3" type="button"> <img src="<?= base_url('assets/img/perahu.png') ?>" style="width: 30px;" alt=""> Filter</button><br>
        <br>
        <div style="overflow-x: auto;">
            <table id="tbl_kontraktor" class="table table-hover text-center" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
                <thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
                    <tr>
                        <th>No</th>
                        <!-- <th>Username Vendor</th> -->
                        <th>Nama Perusahaan</th>
                        <th>Jenis Pengadaan</th>
                        <th>Kualifikasi Usaha</th>
                        <th>SBU</th>
                        <th>Email Perusahaan</th>
                        <th>Status Dokumen</th>
                        <th>Status Kirim Undangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
            </table>
        </div>
        <br>
    </div>
</div>

<!-- modal detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="overflow-x: auto;">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-active table-bordered">
                                <tr>
                                    <th>Username</th>
                                    <th><label id="username_vendor"></label></th>
                                </tr>
                                <tr>
                                    <th>NPWP</th>
                                    <th><label id="npwp_usaha"></label></th>
                                </tr>
                                <tr>
                                    <th>Bentuk Usaha</th>
                                    <th><label id="bentuk_usaha"></label></th>
                                </tr>
                                <tr>
                                    <th>Tanggal Mendaftar</th>
                                    <th><label id="tanggal_mendaftar"></label></th>
                                </tr>
                                <tr>
                                    <th>Tanggal Diterima</th>
                                    <th><label id="tanggal_diterima"></label></th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-active table-bordered">
                                <tr>
                                    <th>Email</th>
                                    <th><label id="email_vendor"></label></th>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th><label id="alamat_usaha"></label></th>
                                </tr>
                                <tr>
                                    <th>Kode Pos</th>
                                    <th><label id="kode_pos_usaha"></label></th>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <th><label id="provinsi"></label></th>
                                </tr>
                                <tr>
                                    <th>Kabupaten/Kota</th>
                                    <th><label id="kabupaten"></label></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal detail -->
<div class="modal fade" id="modalBan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle2"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="overflow-x: auto;">
                            <table class="table table-active table-bordered">
                                <tr>
                                    <th>Username</th>
                                    <th><label id="username_vendor2"></label></th>
                                </tr>
                                <tr>
                                    <th>Nama Usaha</th>
                                    <th><label id="nama_usaha2"></label></th>
                                </tr>
                                <tr>
                                    <th>Bentuk Usaha</th>
                                    <th><label id="bentuk_usaha2"></label></th>
                                </tr>
                                <tr>
                                    <th>NIB</th>
                                    <th><label id="nib"></label></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: -10px;">
                    <div class="col-md-12">
                        <form action="#" action="POST" id="formData">
                            <input type="hidden" value="" id="id_vendor" name="id_vendor">
                            <div class="form-group">
                                <label for="alasan_daftar_hitam">
                                    <h6>Alasan Daftar Hitam</h6>
                                </label>
                                <textarea name="alasan_daftar_hitam" id="alasan_daftar_hitam" class="form-control"></textarea>
                                <p class="alasan-daftar-hitam-error text-danger"></p>
                                <br>
                            </div>
                            <button type="button" onclick="save()" class="btn btn-sm btn-danger float-right">Blacklist Vendor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- new update modalsbu -->
<div class="modal fade" id="modalsbu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nm_vendor"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="overflow-x: auto;">
                            <table id="table_sbu" class="table table-bordered">
                                <thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode</th>
                                        <th>Masa Berlaku</th>
                                        <th>Bukti</th>
                                        <!-- <?php if ($this->session->userdata('id_role') == 2) { ?>

                                        <?php    } else { ?>
                                            <th>Aksi</th>
                                        <?php    } ?> -->
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>