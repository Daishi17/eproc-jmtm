<?php
if ($paket['id_kualifikasi'] == 6 || $paket['id_kualifikasi'] == 4 || $paket['id_kualifikasi'] == 10) { ?>
    <div class="container">
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

        <?php    } else { ?>
            <div class="float-right p-3">
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
            </div>
        <?php    } ?>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-primary">
                <li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
            </ol>
        </nav>
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
        <?php    } else { ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
                </li>
                <?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 23|| $paket['id_kualifikasi'] == 23) { ?>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
                    </li>
                <?php } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } ?>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
                </li>
            </ul>
        <?php    } ?>

        <div class="tab-content p-2 card">
            <!-- tender -->
            <div class="cointainer">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tbl_ba_prakualifikasi">

                        <!-- <tr>
                            <td>2</td>
                            <td>Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <select name="" id="select_ba_pra" onchange="ba_pra()" class="form-control">
                            <option value="">--Pilih Ba--</option>
                            <option value="1">Ba-01-HASIL EVALUASI PRAKUALIFIKASI</option>
                            <option value="2">Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</option>
                            <option value="3">Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</option>
                            <option value="4">Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</option>
                            <option value="5">Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" id="paket_id" value="<?= $paket['id_paket'] ?>">
            <div id="ba-pra1" style="display:none">
                <?php $this->load->view('ba_tender/pra/1', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra2" style="display:none">
                <?php $this->load->view('ba_tender/pra/2', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra3" style="display:none">
                <?php $this->load->view('ba_tender/pra/3', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra4" style="display:none">
                <?php $this->load->view('ba_tender/pra/4', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra5" style="display:none">
                <?php $this->load->view('ba_tender/pra/5', $paket['id_paket']); ?>
            </div>
        </div>
    </div>
<?php } else if ($paket['id_kualifikasi'] == 13 || $paket['id_kualifikasi'] == 8 || $paket['id_kualifikasi'] == 15) { ?>
    <div class="container">
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

        <?php    } else { ?>
            <div class="float-right p-3">
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
            </div>
        <?php    } ?>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-primary">
                <li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
            </ol>
        </nav>
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
        <?php    } else { ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
                </li>
                <?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 23) { ?>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
                    </li>
                <?php } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } ?>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
                </li>
            </ul>
        <?php    } ?>

        <div class="tab-content p-2 card">
            <!-- table ba -->
            <div class="cointainer">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tbl_ba_prakualifikasi">

                        <!-- <tr>
                            <td>2</td>
                            <td>Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <!-- tender -->
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <select name="" id="select_ba_pra" onchange="ba_pra()" class="form-control">
                            <option value="">--Pilih Ba--</option>
                            <option value="1">Ba-01-HASIL EVALUASI PRAKUALIFIKASI</option>
                            <option value="2">Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</option>
                            <option value="3">Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</option>
                            <option value="4">Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</option>
                            <option value="5">Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" id="paket_id" value="<?= $paket['id_paket'] ?>">
            <div id="ba-pra1" style="display:none">
                <?php $this->load->view('ba_tender/pra/1', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra2" style="display:none">
                <?php $this->load->view('ba_tender/pra/2', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra3" style="display:none">
                <?php $this->load->view('ba_tender/pra/3', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra4" style="display:none">
                <?php $this->load->view('ba_tender/pra/4', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra5" style="display:none">
                <?php $this->load->view('ba_tender/pra/5', $paket['id_paket']); ?>
            </div>
        </div>
    </div>
<?php } else if ($paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 9 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 23) {  ?>
    <div class="container">
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

        <?php    } else { ?>
            <div class="float-right p-3">
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
            </div>
        <?php    } ?>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-primary">
                <li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
            </ol>
        </nav>
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
        <?php    } else { ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
                </li>
                <?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 23) { ?>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
                    </li>
                <?php } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } ?>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
                </li>
            </ul>
        <?php    } ?>

        <div class="tab-content p-2 card">
            <!-- tender -->
            <div class="cointainer">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tbl_ba_pascakualifikasi">


                    </tbody>
                </table>
            </div>
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <select name="" id="select_ba_pasca" onchange="ba_pasca()" class="form-control">
                            <option value="">--Pilih Ba--</option>
                            <option value="1">Ba-01-BUKA DAN EVALUASI FILE 1</option>
                            <option value="2">Ba-02-PEMBERITAHUAN PERINGKAT TEKNIS</option>
                            <option value="3">Ba-03-BUKA DAN EVALUASI FILE 2</option>
                            <option value="4">Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI</option>
                            <option value="5">Ba-05-SERAH TERIMA HASIL PENGADAAN</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" id="paket_id" value="<?= $paket['id_paket'] ?>">
            <div id="ba-pasca1" style="display:none">
                <?php $this->load->view('ba_tender/pasca/1', $paket['id_paket']); ?>
            </div>
            <div id="ba-pasca2" style="display:none">
                <?php $this->load->view('ba_tender/pasca/2', $paket['id_paket']); ?>
            </div>
            <div id="ba-pasca3" style="display:none">
                <?php $this->load->view('ba_tender/pasca/3', $paket['id_paket']); ?>
            </div>
            <div id="ba-pasca4" style="display:none">
                <?php $this->load->view('ba_tender/pasca/4', $paket['id_paket']); ?>
            </div>
            <div id="ba-pasca5" style="display:none">
                <?php $this->load->view('ba_tender/pasca/5', $paket['id_paket']); ?>
            </div>
        </div>
    </div>
<?php } else if ($paket['id_kualifikasi'] == 17 || $paket['id_kualifikasi'] == 11 || $paket['id_kualifikasi'] == 7) { ?>
    <div class="container">
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>

        <?php    } else { ?>
            <div class="float-right p-3">
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
                <a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
                <a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
            </div>
        <?php    } ?>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-primary">
                <li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Beranda &raquo; Informasi Tender</a></li>
            </ol>
        </nav>
        <?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 2) { ?>
        <?php    } else { ?>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>">Informasi Tender</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link bg-info text-white active" href="<?= base_url('panitiajmtm/beranda/pertanyaantender/' . $paket['id_paket']) ?>">Pertanyaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>">Evaluasi</a>
                </li>
                <?php if ($paket['id_kualifikasi'] == 16 || $paket['id_kualifikasi'] == 15 || $paket['id_kualifikasi'] == 12 || $paket['id_kualifikasi'] == 14 || $paket['id_kualifikasi'] == 18 || $paket['id_kualifikasi'] == 20 || $paket['id_kualifikasi'] == 21 || $paket['id_kualifikasi'] == 23) { ?>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggah_prakualifikasi/' . $paket['id_paket']) ?>">Sangahan Prakualifikasi</a>
                    </li>
                <?php } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_negosiasi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/negosiasi/' . $paket['id_paket']) ?>">Negosiasi</a>
                    </li>
                <?php    } ?>
                <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_sangahan_akhir['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } else { ?>
                    <li class="nav-item">
                        <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $paket['id_paket']) ?>">Sangahan</a>
                    </li>
                <?php    } ?>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="<?= base_url('panitiajmtm/beranda/berita_acara/' . $paket['id_paket']) ?>">Berita Acara</a>
                </li>
            </ul>
        <?php    } ?>

        <div class="tab-content p-2 card">
            <!-- tender -->
            <div class="cointainer">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tbl_ba_prakualifikasi">

                        <!-- <tr>
                            <td>2</td>
                            <td>Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</td>
                            <td></td>
                            <td><a href="" class="btn btn-sm btn-primary">Upload</a></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <select name="" id="select_ba_pra" onchange="ba_pra()" class="form-control">
                            <option value="">--Pilih Ba--</option>
                            <option value="1">Ba-01-HASIL EVALUASI PRAKUALIFIKASI</option>
                            <option value="2">Ba-02-EVALUASI TEKNIS FILE I PRAKUALIFIKASI</option>
                            <option value="3">Ba-03-EVALUASI HARGA FILE II PRAKUALIFIKASI</option>
                            <option value="4">Ba-04-KOREKSI ARITMATIK HARGA TIMPANG DAN NEGOSIASI PRAKUALIFIKASI</option>
                            <option value="5">Ba-05-SERAH TERIMA HASIL PENGADAAN PRAKUALIFIKASI</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" id="paket_id" value="<?= $paket['id_paket'] ?>">
            <div id="ba-pra1" style="display:none">
                <?php $this->load->view('ba_tender/pra/1', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra2" style="display:none">
                <?php $this->load->view('ba_tender/pra/2', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra3" style="display:none">
                <?php $this->load->view('ba_tender/pra/3', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra4" style="display:none">
                <?php $this->load->view('ba_tender/pra/4', $paket['id_paket']); ?>
            </div>
            <div id="ba-pra5" style="display:none">
                <?php $this->load->view('ba_tender/pra/5', $paket['id_paket']); ?>
            </div>
        </div>
    </div>
<?php } else { ?>
<?php } ?>

</div>

<!-- Modal -->

<div class="modal fade" id="modal_upload_pra" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Modal BA Prakualifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="form_dok_pra" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                        <input type="hidden" name="no_ba">
                        <input type="file" name="ba_pra" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_upload_pasca" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Modal BA Pascakualifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="form_dok_pasca" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
                        <input type="hidden" name="no_ba">
                        <input type="file" name="ba_pasca" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>