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
    </div>
    <div class="breadcrumb bg-primary text-white" style="margin-top: 60px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $ambil_paket['id_paket']) ?>">Informasi Tender</a>
        </li>
        <?php if ($ambil_paket['id_kualifikasi'] == 22) { ?>
            <li class="nav-item">
                <a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction / Binding Harga</a>
            </li>
        <?php } else { ?>

        <?php } ?>
        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $ambil_paket['id_paket']) ?>">Negosiasi</a>
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
            <div class="float-right" style="margin-top: -50px;">
                <a href="javascript:;" class="btn btn-grad5" onclick="lihat_sumary_binding(<?= $ambil_paket['id_paket'] ?>)"> <i class="fa fa-file" aria-hidden="true"></i> Lihat Summary Binding</a>
            </div>
        </div>
    </div>
    <!-- ini Untuk Yang Buat Vendor -->

    <div class="row justify-content-center h-100 mt-5 mb-5">
        <div class="col-md-12 col-xl-3 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card btn-grad5">
                <div class="card-body contacts_body">
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
                <div class="card-body contacts_body" style="margin-top: -400px;">
                    <!-- ini untuk list vendor -->
                    <ui class="contacts" id="yangAktif">
                    </ui>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-12 col-xl-6">
            <div class="card btn-grad5">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="<?= base_url('assets/img/servant.png') ?>" class="rounded-circle user_img">
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span style="font-size: 30px;">BINDING TAHAP <?= $ambil_paket['tahap_binding'] ?></span>
                        </div>
                    </div>
                </div>
                <!-- ini untuk letakan pesanya -->
                <?php if ($vendor == null) { ?>
                    <div class="card-body msg_card_body">
                        <center>
                            <img src="<?= base_url() ?>assets/img/chatfitur.png" style="width: 100%;" alt="">
                            <span class="text-center">Chat Penawaran Vendor Binding Auction , Klik List Vendor Yang Ingin Di Chat</span>
                            <span class="text-center">Lalu Input Hasil Penawaran Setiap Tahap Binding Di Masing Masing Vendor</span>
                        </center>
                    </div>
                <?php } else { ?>
                    <div class="card-body msg_card_body">

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
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

<div class="modal fade" id="modal_lihat_vendor_mengikuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Summary Binding</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3>Tahap Binding 1</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Vendor</th>
                            <th>Harga Penawaran</th>
                            <th>Peringkat</th>
                        </tr>
                    </thead>
                    <tbody id="binding_sumaary_1"></tbody>
                </table>

                <h3>Tahap Binding 2</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Vendor</th>
                            <th>Harga Penawaran</th>
                            <th>Peringkat</th>
                        </tr>
                    </thead>
                    <tbody id="binding_sumaary_2"></tbody>
                </table>

                <h3>Tahap Binding 3</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Vendor</th>
                            <th>Harga Penawaran</th>
                            <th>Peringkat</th>
                        </tr>
                    </thead>
                    <tbody id="binding_sumaary_3"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>