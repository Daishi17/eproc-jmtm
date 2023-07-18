<?php
$this->admin_login->cek_login();
?>
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<div class="container">
    <br>
    <br>
    <ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
        <li><a style="text-decoration: none; color:white;" href="#">Identitas Agency</a></li>

    </ol>
    <div id="step1">
        <div class="content">

            <section class="card" id="cardhide">
                <div class="content tab-content">
                    <form action="<?= base_url('tender/simpan') ?>" method="post" accept-charset="utf-8" enctype="application/x-www-form-urlencoded" id="formTambahPaket">

                        <table class="table table-bordered">


                            <tr>
                                <td class="bgwarning" width="350px">Nama*</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">Alamat*</td>
                                <td>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">Provinsi*</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">Kabupaten/ Kota *</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">Telepon*</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">Fax*</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">Web Site*</td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td class="bgwarning" width="350px">Penanggung Jawab</td>
                                <td>
                                    <?= $this->session->userdata('nama_admin'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="bgwarning" width="350px">NIP</td>
                                <td>
                                    <?= $this->session->userdata('nip'); ?>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group row">
                            <div class="col-10">
                                <a class="btn btn-success " href=""> <span class="glyphicon glyphicon-file"></span><i class="fa fa-save"></i> Simpan</a>&nbsp;
                                <a class="btn btn-primary" href="<?= base_url() ?>beranda"> Kembali</a>&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>