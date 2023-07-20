<!------ Include the above in your HEAD tag ---------->
<style>
    .profileku {
        width: 100% !important;
        /* padding: 5px 10px; */
        /* margin-bottom: 15px !important;*/
        height: 20%;
        background-color: rgba(0, 0, 0, 0.3);
    }

    .user_img_ku {
        height: 50px;
        width: 50px;
        border: 1.5px solid #f5f6fa;
    }

    body,

    .chat {
        margin-top: auto;
        margin-bottom: auto;
    }

    .card {
        height: 700px;
        border-radius: 15px !important;
        background: rgb(34, 193, 195);
        background: linear-gradient(260deg, rgba(34, 193, 195, 1) 0%, rgba(19, 85, 138, 0.9528186274509804) 100%);
    }

    .contacts_body {
        padding: 0.10rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }

    .msg_card_body {
        overflow-y: auto;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
    }

    .card-footer {
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
    }

    .container {
        align-content: center;
    }

    .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
    }

    .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .type_msg {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        height: 50px !important;
        overflow-y: auto;
    }

    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .attach_btn {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
        height: 50px;
    }

    .send_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
        height: 50px;

    }

    .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .contacts {
        list-style: none;
        padding: 0;
    }

    .contacts li {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .active {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .user_img {
        height: 50px;
        width: 50px;
        border: 1.5px solid #f5f6fa;

    }

    .user_img_msg {
        height: 50px;
        width: 50px;
        border: 1.5px solid #f5f6fa;

    }

    .img_cont {
        position: relative;
        height: 50px;
        width: 50px;
    }

    .img_cont_msg {
        height: 40px;
        width: 40px;
    }

    .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.4em;
        border: 1.5px solid white;
    }

    .offline {
        background-color: #c23616 !important;
    }

    .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }

    .user_info_ku {
        /* margin-top: auto; */
        margin-bottom: auto;
        margin-left: 15px;
    }

    .user_info_ku span {
        font-size: 15px;
        color: white;
    }


    .user_info span {
        font-size: 15px;
        color: white;
    }

    .user_info_ku p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    .user_info p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    .video_cam {
        margin-left: 50px;
        margin-top: 5px;
    }

    .video_cam span {
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }

    .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
    }

    .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
    }

    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_head {
        position: relative;
    }

    #action_menu_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }

    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .action_menu ul li i {
        padding-right: 10px;

    }

    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }

    @media(max-width: 576px) {
        .contacts_card {
            margin-bottom: 15px !important;
        }
    }

    .btn-grad5 {
        width: 100%;
        background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        border-radius: 10px;
    }

    .btn-grad5:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        box-shadow: 0 0 40px #1CB5E0;
        text-decoration: none;
    }

    .btn-grad6 {
        width: 100%;
        background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;

        border-radius: 10px;
    }

    .btn-grad6:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        box-shadow: 0 0 40px #1CB5E0;
        text-decoration: none;
    }

    .btn-grad15 {
        background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
    }

    .btn-grad15 {
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;

    }

    .btn-grad15:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
        box-shadow: 0 0 40px #fc00ff;
    }
</style>
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<div id="main" class="container">
    <input type="hidden" name="id_paket" id="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
    <div class="float-right p-3">
        <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>

        <?php if ($ambil_paket['id_kualifikasi'] == 16 || $ambil_paket['id_kualifikasi'] == 15 || $ambil_paket['id_kualifikasi'] == 12 || $ambil_paket['id_kualifikasi'] == 14 || $ambil_paket['id_kualifikasi'] == 18) { ?>
        <?php } else { ?>
            <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>

        <?php } ?>


        <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
    </div>
    <div class="breadcrumb bg-primary text-white" style="margin-top: 60px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $ambil_paket['id_paket']) ?>">Informasi Tender</a>
        </li>
        <?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>
            <li class="nav-item">
                <a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $ambil_paket['id_paket']) ?>">Reverse Auction / Binding Harga</a>
            </li>
        <?php } else { ?>

        <?php } ?>
        <li class=" nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $ambil_paket['id_paket']) ?>">Pertanyaan</a>
        </li>

        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $ambil_paket['id_paket']) ?>">Evaluasi</a>
        </li>
        <?php if ($ambil_paket['id_kualifikasi'] == 16 || $ambil_paket['id_kualifikasi'] == 14 || $ambil_paket['id_kualifikasi'] == 15 || $ambil_paket['id_kualifikasi'] == 12 || $ambil_paket['id_kualifikasi'] == 18) { ?>

        <?php } else { ?>
            <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
            <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_prakualifikasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $ambil_paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
                </li>
            <?php    } else { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $ambil_paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
                </li>
            <?php    } ?>
        <?php } ?>
        <?php if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_prakualfiikasi_satu_file_penetapan['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
            </li>
        <?php    } else { ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
            </li>
        <?php    } ?>
        <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>
        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_paket['id_paket']) ?>">Sangahan</a>
            </li>
        <?php    } else { ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_paket['id_paket']) ?>">Sangahan</a>
            </li>
        <?php    } ?>
        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $ambil_paket['id_paket']) ?>">Berita Acara</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="card-body bg-white">
            <div class="container-fluid">
                <div class="row">
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
    <!-- ini Untuk Yang Buat Vendor -->
    <center>
        <h2>TAHAP BINDING <?= $ambil_paket['tahap_binding'] ?></h2>
    </center>
    <div class="tab-content">
        <div class="card-body bg-white">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Nama Vendor</th>
                                <td><?= $vendor['username_vendor'] ?></td>
                                <td></td>
                            </tr>
                            <?php if ($ambil_paket['tahap_binding'] == 1) { ?>
                                <tr>
                                    <th>Input Harga Penawaran</th>
                                    <td>
                                        <input type="hidden" name="nama_vendor" value="<?= $vendor['username_vendor'] ?>">
                                        <input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
                                        <input type="hidden" name="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
                                        <input type="hidden" name="tahap_binding" value="1">
                                        <input type="hidden" name="tahap_binding_next" value="2">
                                        <input type="text" style="width:400px" readonly class="form-control penawaran_binding1" value="<?= "Rp " . number_format($vendor['harga_penawaran_binding_1'], 2, ',', '.'); ?>" name="penawaran_binding">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Download Dokumen Binding Penawaran</th>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="https://vms.jmtm.co.id/file_binding/<?= $vendor['file_penawaran_binding_1'] ?>"><img style="width: 30px;" src="<?= base_url('assets/img/pdf.png') ?>" alt=""> <?= $vendor['file_penawaran_binding_1'] ?></a>
                                    </td>
                                </tr>
                            <?php  } else if ($ambil_paket['tahap_binding'] == 2) { ?>
                                <tr>
                                    <th>Input Harga Penawaran</th>
                                    <td>
                                    <input type="hidden" name="nama_vendor" value="<?= $vendor['username_vendor'] ?>">
                                        <input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
                                        <input type="hidden" name="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
                                        <input type="hidden" name="tahap_binding" value="2">
                                        <input type="hidden" name="tahap_binding_next" value="3">
                                        <input type="text" style="width:400px" readonly class="form-control penawaran_binding2" value="<?= "Rp " . number_format($vendor['harga_penawaran_binding_2'], 2, ',', '.'); ?>" name="penawaran_binding">
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <th>Input Harga Penawaran</th>
                                    <td>
                                        <input type="hidden" name="nama_vendor" value="<?= $vendor['username_vendor'] ?>">
                                        <input type="hidden" name="id_vendor" value="<?= $vendor['id_vendor'] ?>">
                                        <input type="hidden" name="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
                                        <input type="hidden" name="tahap_binding" value="3">
                                        <input type="hidden" name="tahap_binding_next" value="selesai">
                                        <input type="text" style="width:400px" class="form-control penawaran_binding3" value="<?= $vendor['harga_penawaran_binding_3'] ?>" name="penawaran_binding">
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <table class="">
                            <tr>
                                <th>PANITIA</th>
                                <th><span class="badge badge-primary" style="font-size: large;"> <img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img"> </span></th>
                                <th>PENYEDIA</th>
                                <th><span class="badge badge-danger" style="font-size: large;"> <img src="<?= base_url('assets/img/test1.png') ?>" class="rounded-circle user_img"></span></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="float-right binding_tahap_1" style="margin-top: -50px; display:none;">
                    <a href="javascript:;" class="btn btn-grad5" onclick="Tahap_binding()"> <i class="fa fa-step-forward" aria-hidden="true"></i> Lanjut Ke Tahap Binding Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>
    <?php if ($ambil_paket['tahap_binding'] == 1) { ?>
    <?php } else { ?>
        <div class="row justify-content-center h-100 mt-5 mb-5">
            <div class="col-md-12 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-body contacts_body btn-grad5">
                        <ui class="contacts">
                            <li class="profileku">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="<?= base_url('assets/img/test1.png') ?>" class="rounded-circle user_img_ku">
                                    </div>
                                    <div class="user_info_ku">
                                        <span><?= $this->session->userdata('nama_pegawai') ?></span>
                                    </div>
                                </div>
                            </li>
                        </ui>
                    </div>
                    <div class="card-body contacts_body btn-grad5" style="margin-top: -400px;">
                        <!-- ini untuk list vendor -->
                        <ui class="contacts" id="yangAktif">
                        </ui>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="card">
                    <div class="card-header msg_head btn-grad5">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span><?= $vendor['username_vendor'] ?></span>
                                <p><?= $vendor['email_vendor'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- ini untuk letakan pesanya -->
                    <div class="card-body msg_card_body" id="letakpesan">
                    </div>
                    <div class="card-footer btn-grad5">
                        <div class="replay_orang"></div>
                        <form id="form_auction" enctype="multipart/form-data">
                            <input type="hidden" name="tahap_binding_chat" value="<?= $ambil_paket['tahap_binding'] ?>">
                            <input type="hidden" name="replay_tujuan">
                            <input type="hidden" name="replay_isi">
                            <div class="nongol_dok" style="display: none;">
                                <div class="bs-callout bs-callout-info ada_file" style="width: 300px;">
                                    <label class="fake_input_dok"></label>
                                    <a href="javascript:;" class="float-right" onclick="hapus_data_file()">X</a>
                                </div>
                            </div>
                            <input type="hidden" name="id_paket" value="<?= $ambil_paket['id_paket'] ?>">
                            <?php if ($vendor == null) { ?>

                            <?php } else { ?>
                                <input type="hidden" name="id_penerima" id="id_penerima" value="<?= $vendor['id_vendor'] ?>">
                            <?php } ?>
                            <input type="hidden" name="id_pengirim" id="id_pengirim" value="<?= $this->session->userdata('id_pegawai'); ?>">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text attach_btn">
                                        <button class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                        <br>
                                        <button class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
                                    </div>
                                    <input type="file" style="display:none;" id="file" name="dokumen_chat" />
                                    <input type="file" style="display:none;" id="file_img" name="img_chat" />
                                    <textarea name="isi" style="width: 350px;" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <style>
                    div.sticky {
                        position: sticky;
                        top: 0;
                        background-color: yellow;
                        padding: 50px;
                        font-size: 20px;
                    }
                </style>
            </div>
        </div>
    <?php  } ?>
</div>
<!-- Modal Chat Lihat -->
<div class="modal fade" id="modal_liha_chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalTitle">Pesan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="pesan_kosong"></p>
                <div class="card-header bg-primary text-white p-2">
                    <label for=""> PESAN DARI PENYEDIA</label>
                </div>
                <div class="card contacts_body" style=" height: 500px;
      border-radius: 15px !important;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(7, 6, 18, 1) 0%, rgba(42, 41, 136, 1) 100%);">
                    <ui class="contacts" id="yangAktif">
                    </ui>
                </div>
            </div>
            <div class="modal-footer">
                <div class="bs-callout-info col-md-12">
                    Balas Pesan Dengan Mengklik Pesan Baru<br>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="btn-grad5" style="position: sticky;
  bottom: 0;">
    <table>
        <tr class="table">
            <?php
            $date2 = $ambil_paket['start_time_binding'];
            $date20 = new DateTime($date2);
            $date_plus20 = $date20->modify("+3 minutes");
            $rem = strtotime($date_plus20->format('Y-m-d H:i')) - time();
            $min = floor(($rem % 3600) / 60);
            $sec = ($rem % 60);
            ?>
            <th style="width: 300px;font-size:20px">WAKTU TAHAP BINDING <?= $ambil_paket['tahap_binding'] ?> <input type="hidden" class="form-control time_waktu_binding" value="<?= $min . ':' . $sec ?>"></th>
            <td>
                <div class="countdown" style="font-size: 30px;"></div>
                <div class="alert alert-warning alert-dismissible fade show warning_binding" style="display:none" role="alert">
                    <strong>Warning</strong>
                    <h4>TAHAP BINDING <?= $ambil_paket['tahap_binding'] ?> HAMPIR SELESAI SEGERA SELESAIKAN TAHAP <?= $ambil_paket['tahap_binding'] ?> INI</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show danger_binding" style="display:none" role="alert">
                    <strong>Danger</strong>
                    <h4>TAHAP BINDING <?= $ambil_paket['tahap_binding'] ?> SUDAH SELESAI</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </td>
            <td>

            </td>
        </tr>
    </table>
</div>