<style>
    .contacts {
        list-style: none;
        padding: 0;
    }

    .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
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

    .contacts li {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }

    .active-angga {
        background: rgb(7, 6, 18);
        background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
    }

    .user_img {
        height: 70px;
        width: 70px;
        border: 1.5px solid #f5f6fa;

    }

    .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }
</style>
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>
<form id="form_gugurin_vendor_semua">
    <input type="hidden" name="ambil_id_paket" value="<?= $paket['id_paket'] ?>">
</form>
<div id="main" class="container">
    <input type="hidden" id="id_paket_evaluasi" value="<?= $paket['id_paket'] ?>">
    <input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
    <div class="float-right p-3">
        <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
    </div>
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb bg-primary">
            <li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Informasi Tender</a></li>
        </ol>
    </nav>
    <div id="demo"></div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $paket['id_paket']) ?>">Reverse Auction / Binding Harga</a>
        </li> -->
        <?php if ($paket['penetapan_pemenang'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
            </li>
        <?php    } else { ?>

        <?php    }
        ?>
    </ul>
    <br>
    <div class="tab-content">
        <div class="content">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Penetapan Pemenang
                </div>
                <div class="card-body">
                    <div style="overflow-x:auto;">
                        <?php if ($vendor == null) { ?>
                            <table class="table">
                            <?php    } else { ?>
                                <table class="table" id="tbl_penetapan_pemenang_auction">
                                <?php } ?>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>Harga Penawaran (Rp)</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
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
<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
<!-- Modal Chat Lihat -->
<div class="modal fade" id="alasan_batalkan_pemanang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Batalkan Pemenang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form_saya_mau_batalkan">
                    <input type="hidden" id="id_ambil_mengikuti_paket" name="saya_ambil_id_mengikuti_paket">
                    <textarea name="alasan_saya_batalkan_tender" class="form-control" id="alasan_saya_batalkan_tender" cols="30" rows="10"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-times"></i> Batal</button>
                <button type="button" class="btn btn-success" onclick="Kirim_batalkan_pemenang()"> <i class="fas fa fa-papper-plane"></i> Kirim Pembatalan</button>
            </div>
        </div>
    </div>
</div>