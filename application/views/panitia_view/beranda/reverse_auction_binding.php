<!-- BARU -->
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<div id="main" class="container">
    <input type="hidden" name="id_paket" id="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
    <div class="breadcrumb bg-primary text-white" style="margin-top: 20px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $ambil_paket['id_paket']) ?>">Informasi Tender</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="card-body bg-white">
            <div class="container-fluid">
                <div class="row">
                    <center>
                        <h2>BIDDING / E-AUCTION</h2>
                    </center>
                    <br>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Kode Tender</th>
                                <td><?= $ambil_paket['kode_tender'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Paket</th>
                                <td><?= $ambil_paket['nama_paket'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Jenis Pengadaan</th>
                                <td><?= $ambil_paket['nama_jenis_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Metode Pemilihan</th>
                                <td><?= $ambil_paket['nama_metode_pemilihan'] ?></td>
                            </tr>
                            <tr>
                                <th>Divisi</th>
                                <td><?= $ambil_paket['nama_unit_kerja'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="width: 100%;">
            <div class="card-header bg-primary text-white">
                <label for="" style="font-size: 20px;">TAHAP BIDDING</label>
                <?php
                $date_binding_2 = $ambil_paket['start_time_binding'];
                $date_binding_22 = new DateTime($date_binding_2);
                $date_binding_3 = $ambil_paket['start_time_binding'];
                $date_binding_33 = new DateTime($date_binding_3);
                $binding_2 = $date_binding_22->modify("+5 minutes");
                $binding_3 = $date_binding_33->modify("+6 minutes");
                // binding 2 mulai
                $rem2 = strtotime($binding_2->format('Y-m-d H:i')) - time();
                $min2 = floor(($rem2 % 3600) / 60);
                $sec2 = ($rem2 % 60);

                // binding 3 mulai
                $rem3 = strtotime($binding_3->format('Y-m-d H:i')) - time();
                $min3 = floor(($rem3 % 3600) / 60);
                $sec3 = ($rem3 % 60);
                ?>
                <input type="hidden" class="form-control time_waktu_binding" value="<?= $min2 . ':' . $sec2 ?>">
                <input type="hidden" class="form-control time_waktu_binding3" value="<?= $min3 . ':' . $sec3 ?>">
            </div>
            <div class="card-body">
                <h3>Tahap Bidding 1</h3>
                <div class="float-right">
                    <label for="" style="font-size: 20px;">WAKTU : Sudah Selesai

                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Vendor</th>
                            <th>Harga Penawaran</th>
                            <th>Dokumen Penawaran</th>
                            <th>Peringkat Penawaran</th>
                        </tr>
                    </thead>
                    <tbody id="binding_sumaary_1"></tbody>
                </table>

                <h3>Tahap Bidding 2</h3>
                <?php if (date('Y-m-d H:i') >= $binding_2->format("Y-m-d H:i")) { ?>
                <?php } else { ?>
                    <div class="alert alert-warning alert-dismissible fade show warning_binding2" style="display:none" role="alert">
                        <strong>Warning</strong>
                        <h4>TAHAP BINDING HAMPIR SELESAI SEGERA SELESAIKAN TAHAP INI</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show danger_binding2" style="display:none" role="alert">
                        <strong>INFORMASI !!</strong>
                        <h6>
                            TAHAP BINDING SUDAH SELESAI TERIMAKASIH
                        </h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="float-right">
                    <?php if (date('Y-m-d H:i') >= $binding_2->format("Y-m-d H:i")) { ?>
                        <label for="" style="font-size: 20px;">WAKTU : Sudah Selesai
                    <?php } else { ?>
                        <label for="" style="font-size: 20px;">WAKTU : </label><label class="countdown" style="font-size: 20px;"></label>
                    <?php } ?>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Vendor</th>
                            <th>Harga Penawaran</th>
                            <th>Peringkat Penawaran</th>
                        </tr>
                    </thead>
                    <?php if (date('Y-m-d H:i') >= $binding_2->format("Y-m-d H:i")) { ?>
                        <tbody id="binding_sumaary_2_biasa"></tbody>
                    <?php } else { ?>
                        <tbody id="binding_sumaary_2"></tbody>
                    <?php } ?>
                </table>

                <div class="tahap_3_binding" style="display: none;">
                    <h3>Tahap Bidding 3</h3>
                    <?php if (date('Y-m-d H:i') >= $binding_3->format("Y-m-d H:i")) { ?>
                    <?php } else { ?>
                        <div class="alert alert-warning alert-dismissible fade show warning_binding3" style="display:none" role="alert">
                            <strong>Warning</strong>
                            <h4>TAHAP BINDING HAMPIR SELESAI SEGERA SELESAIKAN TAHAP INI</h4>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show danger_binding3" style="display:none" role="alert">
                            <strong>INFORMASI !!</strong>
                            <h6>
                                TAHAP BINDING SUDAH SELESAI TERIMAKASIH
                            </h6>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="float-right">
                    <?php if (date('Y-m-d H:i') >= $binding_3->format("Y-m-d H:i")) { ?>
                        <label for="" style="font-size: 20px;">WAKTU : Sudah Selesai
                    <?php } else { ?>
                        <label for="" style="font-size: 20px;">WAKTU : </label><label class="countdown3" style="font-size: 20px;"></label>
                    <?php } ?>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Vendor</th>
                                <th>Harga Penawaran</th>
                                <th>Peringkat Penawaran</th>
                            </tr>
                        </thead>
                        <?php if (date('Y-m-d H:i') >= $binding_3->format("Y-m-d H:i")) { ?>
                            <tbody id="binding_sumaary_3_biasa"></tbody>
                        <?php } else { ?>
                            <tbody id="binding_sumaary_3"></tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>