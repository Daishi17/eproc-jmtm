<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Transpo - Transport & Logistics HTML Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JMTM EPROC</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css" integrity="sha512-NicFTMUg/LwBeG8C7VG+gC4YiiRtQACl98QdkmfsLy37RzXdkaUAuPyVMND0olPP4Jn8M/ctesGSB2pgUBDRIw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="Shortcut Icon" href="<?= base_url('assets/img/unnamed.png') ?>" type="image/x-icon" sizes="96x96" />
    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/') ?>all.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/') ?>flaticon.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/') ?>bootstrap.min.css" />
    <link href="<?= base_url('assets/onix/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature) -->
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/') ?>magnific-popup.css" />
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/') ?>owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/') ?>select2.css" />

    <!-- css rehan -->
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css/style2.css') ?>">


    <!-- Template Style -->
    <link rel="stylesheet" href="<?= base_url('assets/teamplate_transpo/css//style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/boostrapnew/DataTables/media/css/jquery.dataTables.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="<?= base_url('assets/teamplate_transpo/css/') ?>glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/teamplate_transpo/css/') ?>swiper-bundle.min.css" rel="stylesheet">

</head>

<body>
    <style>
        .opa {
            opacity: 0.7;
            background: #052c52;
        }

        .tulisan_jalan {
            text-decoration: none;
            color: white;
        }

        .marquee {
            height: 60px;
            width: 100%;
            overflow: hidden;
            position: relative;
            transition: 0.5s;
            background-size: 200% auto;
            background-image: linear-gradient(to right,
                    #36d1dc 0%,
                    #5b86e5 51%,
                    #36d1dc 100%);
            padding: 8px 0 4px 0;
            text-decoration: none;
        }

        .marquee:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 10px yellow;
            text-decoration: none;
        }

        .card-titleangga {
            white-space: nowrap;
            width: 200px;
            height: 300px;
            overflow: hidden;
            color: black;
            text-overflow: ellipsis;
        }

        .marquee div {
            display: inline-block;
            width: 300%;
            height: 80px;

            position: absolute;
            overflow: hidden;

            animation: marquee 20s linear infinite;
        }

        .marquee span {
            float: left;
            width: 25%;
        }

        @keyframes marquee {
            0% {
                left: 0;
            }

            100% {
                left: -150%;
            }
        }

        .btn-grad {
            background-image: linear-gradient(to right,
                    #000046 0%,
                    #1cb5e0 51%,
                    #000046 100%);
        }

        .btn-grad {
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px white;
        }

        .btn-grad:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 20px yellow;
            text-decoration: none;
        }

        .btn-grad11 {
            background-image: linear-gradient(to right, #ED4264 0%, #FFEDBC 51%, #ED4264 100%)
        }

        .btn-grad11 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad11:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 0 40px #ED4264;
        }


        .btn-grad12 {
            background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
        }

        .btn-grad12 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad12:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 0 40px #ED4264;
        }

        .btn-grad13 {
            background-image: linear-gradient(to right, #191970 0%, #000428 51%, #191970 100%)
        }

        .btn-grad13 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad13:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 0 40px #000428;
        }

        .btn-grad14 {
            background-image: linear-gradient(to right, #800000 0%, #000000 59%, #800000 100%)
        }

        .btn-grad14 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad14:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 0 40px #EB5757;
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

        .btn-grad70 {
            width: 100%;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 40px #eee;
            border-radius: 10px;
        }

        .btn-grad70:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 40px #1CB5E0;
            text-decoration: none;
        }
    </style>
    <!--=================================
    Header -->
    <div id="myNav" class="overlay bg-dark ">
        <nav class="navbar bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img width="200" src="<?= base_url('assets/teamplate_transpo/img/JMTMLOGOKU.png') ?>" alt="logo">
                </a>
                <a href="#" id="ham" onclick="closeNav()">
                    <div id="nav-icon3" class="animated-icon3">
                        <span class="bg-white"></span>
                        <span class="bg-white"></span>
                        <span class="bg-white"></span>
                        <span class="bg-white"></span>
                    </div>
                </a>
            </div>
        </nav>

        <div class="overlay-content mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-6 text-white d-md-flex flex-md-column align-items-md-center d-none">
                    <div class="main-contact text-white w-75 mb-5">
                        <i class="fas fa-map-marked-alt"></i>
                        <div class="main-contact-info text-left">
                            <h6 class="text-white mt-0">Kantor Pusat Jasamarga
                            </h6>
                            <small>Taman Mini Indonesia Indah</small>
                        </div>
                    </div>
                    <div class="main-contact text-white w-75 mb-5">
                        <i class="fas fa-phone-volume"></i>
                        <div class="main-contact-info text-left">
                            <h6 class="text-white mt-0">Kontak
                            </h6>
                            <small>0815-2680-4622</small>
                        </div>
                    </div>
                    <div class="main-contact text-white w-75">
                        <i class="fas fa-envelope"></i>
                        <div class="main-contact-info text-left">
                            <h6 class="text-white mt-0">Email
                            </h6>
                            <small>procurement@jmtm.co.id
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-white d-flex d-md-none flex-md-column align-items-md-center">
                    <div class="main-contact text-white w-75 mb-5 d-flex flex-column">
                        <i class="fas fa-map-marked-alt mx-auto"></i>
                        <div class="main-contact-info text-center">
                            <h6 class="text-white mt-0">Kantor Pusat Jasamarga
                            </h6>
                            <small>Taman Mini Indonesia Indah</small>
                        </div>
                    </div>
                    <div class="main-contact text-white w-75 mb-5 d-flex flex-column">
                        <i class="fas fa-phone-volume mx-auto"></i>
                        <div class="main-contact-info text-center">
                            <h6 class="text-white mt-0">Kontak
                            </h6>
                            <small>0815-2680-4622</small>
                        </div>
                    </div>
                    <div class="main-contact text-white w-75 d-flex flex-column">
                        <i class="fas fa-envelope mx-auto"></i>
                        <div class="main-contact-info text-center">
                            <h6 class="text-white mt-0">Email
                            </h6>
                            <small>procurement@jmtm.co.id
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="text-left">
                        <a class="second-contact text-white" target="_blank" href="https://www.youtube.com/watch?v=2Dvpy_mZ4SE">
                            <i class="fab fa-youtube mr-2"></i>
                            OFFICIAL YOUTUBE
                        </a>
                    </div>
                    <div class="text-left my-3">
                        <a class="second-contact text-white" href="javascript:;" data-toggle="modal" data-target="#tentangkami">
                            <i class="fa fa-building mr-2"></i>
                            TENTANG KAMI
                        </a>
                    </div>
                    <div class="text-left my-3">
                        <a class="second-contact text-white" target="_blank" href="https://api.whatsapp.com/send?phone=+6281526804622&text=HALLO JASAMARGA TOLLROAD MAINTENANCE">
                            <i class="fa fa-phone mr-2"></i>
                            KONTAK KAMI
                        </a>
                    </div>
                    <div class="text-left my-3">
                        <a class="second-contact text-white" href="javascript:;" data-toggle="modal" data-target="#ketentuan">
                            <i class="fas fa fa-book mr-2"></i>
                            PERSYARATAN DAN KETENTUAN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar position-fixed w-100 z-index-9">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img width="200" src="<?= base_url('assets/teamplate_transpo/img/JMTMLOGOKU.png') ?>" alt="logo">
                <!-- <img width="450" src="<?= base_url('assets/img/JasaMarga_logobumn.png') ?>" alt="logo"> -->
            </a>
            <a href="#" id="hamburger" onclick="openNav()">
                <div id="nav-icon3" class="animated-icon3">
                    <span class="bg-white"></span>
                    <span class="bg-white"></span>
                    <span class="bg-white"></span>
                    <span class="bg-white"></span>
                </div>
            </a>
        </div>
    </nav>

    <!--=================================
    Header -->

    <!-- bottom bar -->
    <!-- <div id="bottomBar" class="bottom-bar fixed-bottom w-100 bg-dark"> -->
    <div id="bottomBar" class="bottom-bar fixed-bottom w-100 bg-warning">
        <div class="d-flex text-center justify-content-around">
            <a href="<?= base_url('') ?>" class="item-wrapper ">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-home"></i>
                    <div class="bottom-bar-caption">Beranda</div>
                </div>
            </a>
            <a href="#" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-box-open"></i>
                    <div class="bottom-bar-caption ">Paket</div>
                </div>
            </a>
            <a href="#" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-newspaper" aria-hidden="true"></i>
                    <div class="bottom-bar-caption ">Berita</div>
                </div>
            </a>
            <a href="<?= base_url('home/cari_paket') ?>" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-box-open"></i>
                    <div class="bottom-bar-caption ">Cari Paket</div>
                </div>
            </a>
            <a href="#" class="item-wrapper" data-toggle="modal" data-target="#regulasi">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-gavel"></i>
                    <div class="bottom-bar-caption ">Regulasi</div>
                </div>
            </a>
            <a target="_blank" href="https://www.instagram.com/jmtm.official/" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fab fa-instagram"></i>
                    <div class="bottom-bar-caption ">Konten Khusus</div>
                </div>
            </a>
            <a href="https://api.whatsapp.com/send?phone=+6281526804622&text=HALLO JASAMARGA TOLLROAD MAINTENANCE" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fab fa-whatsapp"></i>
                    <div class="bottom-bar-caption ">WhatsApp</div>
                </div>
            </a>
            <a target="_blank" href="https://vms.jmtm.co.id/home/daftarvendor" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-fw fa-file"></i>
                    <div class="bottom-bar-caption ">Daftar Penyedia</div>
                </div>
            </a>
            <a href="javascript:;" onclick="modal_login()" class="item-wrapper">
                <div class="text-dark item-wrapper-content">
                    <i class="fas fa-sign-in-alt"></i>
                    <div class="bottom-bar-caption ">Login</div>
                </div>
            </a>
        </div>
    </div>
    <!-- end bottom bar -->

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content mt-5">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">PILIH LOGIN</h5>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="<?= base_url('assets/img/loginku.jpg') ?>" alt="" style="width: 300px;">
                        <br>
                        <di class="row">
                            <div class="col-md-6 mb-3">
                                <a class="btn btn-sm btn-primary" href="https://vms.jmtm.co.id/auth">PENYEDIA</a>
                            </div><br>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-primary" href="<?= base_url('auth') ?>">NON - PENYEDIA</a>
                            </div>
                        </di>
                    </center>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="regulasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content mt-5">
                <div class="modal-header btn-grad6">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">REGULASI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container marketing">
                        <img alt="LPSE" src="<?= base_url() ?>assets/img/JasaMarga_logobumn.png" width="450px">

                        <!-- Area kotak -->
                        <div class="kotak">
                            <!-- area profil -->
                            <div class="profile">
                                <p>Pengadaan Barang Dan Jasa Pada PT.Jasamarga Tollroad Maintenance(JMTM) Dilaksanakan Sesuai Dengan Surat Keputusan Pengadaan Barang Dan Jasa, Yang Berlaku Di Lingkungan PT.Jasamarga Tollroad Maintenance(JMTM)</p>
                            </div>
                        </div>
                    </div><!-- /.container -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ketentuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">SYARAT DAN KETENTUAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container marketing">
                        <center>
                            <img src="<?= base_url('assets/img/jmtm2.png') ?>" alt="logo" style="width: 50%;">
                        </center>
                        <!-- Area kotak -->
                        <div class="kotak">
                            <!-- area profil -->
                            <div class="profile">
                                <br>
                                <p>
                                    Syarat dan ketentuan penggunaan E-Procurement<b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dimaksudkan untuk menginformasikan ketentuan yang berlaku dalam situs E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dan harus disepakati oleh pihak mitra kerja untuk dapar menjadi Penyedia di lingkungan <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> , sebagaimana diatur di bawah ini:
                                </p>

                                <h5>1. UMUM</h5>
                                <ul>
                                    <ul>a. <a class="text-primary" href="https://jmtm-eproc.kintekindo.net"> https://jmtm-eproc.kintekindo.net </a>adalah situs online yang bertujuan untuk memfasilitasi antara mitra kerja untuk menjadi Penyedia di lingkungan <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> </ul>
                                    <ul>b. Pengguna E-Procurement (Calon Penyedia / Penyedia) wajib tunduk pada Syarat dan Ketentuan E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> ini serta kebijakan lain yang ditetapkan dan berlaku di <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .</ul>
                                </ul>
                                <h5>2. KEANGGOTAAN</h5>
                                <ul>
                                    <ul>a.Untuk menjadi Penyedia, Calon Penyedia harus terlebih dahulu mengisi formulir registrasi secara online dengan data yang benar dan akurat sesuai keadaan yang sebenarnya.</ul>
                                    <ul>
                                        b. Calon Penyedia hanya akan dinyatakan resmi sebagai Penyedia apabila telah mendapatkan Surat DPT (Daftar Penyedia Terseleksi) dari <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .
                                    </ul>
                                    <ul>
                                        c. Penyedia yang sudah mendapatkan DPT wajib memperbaharui data-data Perusahaan apabila sudah tidak sesuai lagi dengan keadaan yang sebenarnya atau jika tidak sesuai dengan ketentuan ini dan/atau peraturan perundang-undangan yang berlaku.
                                    </ul>
                                    <ul>
                                        d. Setiap Perusahaan hanya diperkenankan memiliki 1 (satu) account Penyedia.
                                    </ul>
                                    <ul>
                                        DPT ini tidak berlaku jika:
                                        <ul>
                                            1. Penyedia terkena sanksi atau masalah hukum sesuai dengan ketentuan dan perundang-undangan yang berlaku.
                                            Dokumen administrasi habis masa berlakunya.
                                        </ul>
                                        <ul>
                                            2. Penyedia melanggar ketentuan sebagaimana yang diatur dalam Syarat dan ketentuan penggunaan E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .
                                            DPT dapat digunakan sebagai salah satu persyaratan pendaftaran proses pengadaan.
                                        </ul>
                                        <ul>
                                            3. Calon Penyedia dan Penyedia harus mematuhi semua persyaratan yang dibutuhkan dan memahami bahwa usaha dalam bentuk apapun untuk dapat menembus sistem komputer dengan tujuan memanipulasi data Perusahaan merupakan tindakan melanggar hukum dan akan dikenakan sanksi sesuai dengan ketentuan dan perundang-undangan yang berlaku.
                                        </ul>
                                    </ul>
                                </ul>
                                <h5>3. TANGGUNG JAWAB PENGGUNAAN ACCOUNT PENYEDIA</h5>
                                <ul>
                                    a. Calon Penyedia dan Penyedia akan diberikan account yang digunakan untuk dapat login pada E-Procurement.
                                </ul>
                                <ul>
                                    b. Calon Penyedia dan Penyedia bertanggungjawab atas kerahasiaan username dan password yang diberikan oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> ./li>
                                    Setiap atau seluruh kerugian yang timbul sebagai akibat dari penyalahgunaan username dan password yang diberikan oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> oleh Calon Penyedia dan Penyedia menjadi tanggungjawab dari Calon Penyedia dan Penyedia.
                                </ul>
                                <ul>c. Calon Penyedia dan Penyedia setuju untuk segera memberitahukan kepada Admin <b>VMS (Vendor Management System)</b> <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> apabila mengetahui adanya penyalahgunaan account miliknya oleh pihak lain yang tidak berhak atau jika ada gangguan keamanan atas account miliknya itu, segera setelah diketahui adanya penyalahgunaan atau gangguan tersebut.</ul>

                                <h5>4. EVALUASI PENYEDIA</h5>
                                <ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> akan melakukan evaluasi data Penyedia dan memeriksa keaslian serta keabsahan seluruh dokumen Penyedia yang diunggah kedalam system E-Procurement.</ul>
                                <ul>
                                    b. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat sewaktu-waktu melakukan kunjungan kelokasi sesuai dengan alamat yang dicantumkan tanpa atau dengan pemberitahuan terlebih dahulu kepada Calon Penyedia atau Penyedia.
                                </ul>

                                <h5>5. TANGGUNG JAWAB DAN RISIKO</h5>
                                <ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> tidak bertanggung jawab atas segala akibat yang timbul karena adanya gangguan jaringan koneksi dan penyalahgunaan oleh pihak lain yang menggunakan situs ini.</ul>
                                <ul>b. E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat dihubungkan/ditautkan dengan situs lain yang dimiliki dan dioperasikan oleh pihak ketiga. Untuk itu <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> tidak bertanggung jawab atas segala risiko yang terjadi akibat tautan yang dilakukan oleh pihak ketiga tersebut.</ul>
                                <ul>
                                    c. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> tidak menjamin dan tidak bertanggungjawab, bahwa layanan ini akan berlangsung terus tanpa gangguan, tepat waktu, aman atau sama sekali tanpa kesalahan.
                                </ul>
                                <ul>
                                    d. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat sewaktu-waktu memperbaharui sistem E-Procurement ini tanpa pemberitahuan sebelumnya kepada Penyedia. Dalam hal ini Penyedia diwajibkan mengunjungi situs secara berkala.
                                </ul>

                                <h5>6. GANTI KERUGIAN</h5>
                                <ul>a. Calon Penyedia & Penyedia setuju untuk menanggung segala risiko yang timbul akibat adanya kesalahan informasi maupun penyalahgunaan situs ini yang dilakukan oleh Calon Penyedia & Penyedia, adanya klaim dari pihak ketiga, termasuk membayar ganti rugi kepada <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> beserta afiliasinya, dan karyawannya dari semua kerugian yang mungkin akan ditanggung oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> (termasuk biaya kuasa hukum).</ul>

                                <h5>7. PERLINDUNGAN HAK CIPTA</h5>
                                <ul>a. Calon Penyedia & Penyedia setuju untuk tidak akan, untuk kepentingan komersial, mengupload, menstranmisikan, mereproduksi, menyebarluaskan atau berpartisipasi di dalam pemindahtanganan atau penjualan, atau dengan cara apapun memanfaatkan setiap content yang diperoleh dari E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .</ul>

                                <h5>8. PERUBAHAN KETENTUAN</h5>
                                <ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat memperbaiki, menambah, atau mengurangi ketentuan ini setiap saat, dengan atau tanpa pemberitahuan sebelumnya kepada Penyedia. Dalam hal terdapat perubahan yang dilakukan oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> maka Penyedia harus melakukan penyesuaian terhadap adanya perubahan tersebut.</ul>

                                <h5>9. PEMUTUSAN PERJANJIAN</h5>
                                <ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> berhak menonaktifkan status Penyedia dan menghapus data Penyedia jika diperlukan secara sepihak apabila Penyedia dianggap tidak dapat memenuhi dan mentaati ketentuan - ketentuan ini.</ul>
                                <br>
                                <div class="bs-callout btn-grad5">
                                    <ul>
                                        <b>DENGAN INI KAMI TELAH MEMBACA MEMAHAMI DAN SETUJU UNTUK MEMATUHI SEGALA ATURAN DAN PERSYARATAN DIATAS.</b>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.container -->
                </div>
            </div>
        </div>
    </div>
    <!-- modal tenantg kami -->
    <!-- Modal -->
    <div class="modal fade" id="tentangkami" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">TENTANG KAMI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container marketing">
                        <center>
                            <img src="<?= base_url('assets/img/jmtm2.png') ?>" alt="logo" style="width: 50%;">
                        </center>
                        <!-- Area kotak -->
                        <div class="kotak">
                            <!-- area profil -->
                            <div class="profile">
                                <h3>PROFIL PERUSAHAAN</h3>
                                <p>PT Jasamarga Tollroad Maintenance merupakan anak usaha dari PT Jasa Marga (Persero) Tbk, penyedia jalan bebas hambatan terbesar di Indonesia, di mana sebesar 99,82% kepemilikannya adalah milik Jasa Marga sebagai induk Perusahaan. Dikenal bergerak dalam bidang pemeliharaan jalan tol untuk mendukung lini bisnis utama Jasa Marga terutama dalam hal pemenuhan Standar Pelayanan Minimum (SPM) jalan tol, PT Jasamarga Tollroad Maintenance memiliki kantor pusat di Jakarta.</p>

                                <!--<p>-->
                                <!--	<img src="http://jmtm.co.id/assets/template/images/tentang-kami1.jpg" alt="gambar isi">-->
                                <!--</p>-->

                                <h3>Strategi Kami</h3>
                                <p>
                                    Jasamarga Tollroad Maintenance kian mantap dan memfokuskan pekerjaan pada pemeliharaan jalan tol, termasuk jembatan tol, serta seluruh fasilitasnya. Tentu saja semua dilakukan dengan kualitas tinggi yang menjadi standar kami. Oleh karena itu, memproduksi sarana dan prasarana untuk pemeliharaan dan pengoperasian jalan dan jembatan tol menjadi bagian dari strategi usaha yang akan terus kami kembangkan dengan inovasi dan teknologi yang selalu terbarukan.
                                </p>
                                <!--<p>-->
                                <!--	<img src="http://jmtm.co.id/assets/template/images/tentang-kami2.jpg" alt="gambar isi">-->
                                <!--</p>-->
                                <p>
                                    Dengan standar dan kontrol yang kami miliki inilah jaminan kualitas pemeliharaan konstruksi dan jalan tol yang kami kerjakan dapat melampaui Standar Pelayanan Minimum (SPM) dari Jasa Marga sebagai perusahaan induk. Jasamarga Tollroad Maintenance juga menjalin kerja sama dengan mitra bisnis strategis yang memiliki kemampuan dan keahlian di bidangnya. Pun segala kegiatan pemasaran dilaksanakan oleh manajemen yang profesional, handal dan terpercaya. Sehingga seiring berjalannya bisnis, Perusahaan dapat selalu mengedepankan prinsip-prinsip Good Corporate Governance dalam proyek atau pekerjaan, baik yang sedang maupun yang akan digarap di masa depan.
                                </p>
                            </div>
                        </div>
                    </div><!-- /.container -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->


    <!--=================================
    Banner -->
    <!-- https://www.youtube.com/embed/B1gdLHsK9_I -->
    <!-- https://www.youtube.com/embed/rdL6VIHEvmw -->

    <section style="display: block;" id="video1" class="slider-04 bg-overlay-dark-50 bg-holder" data-jarallax='{"speed": 0.6}' data-jarallax-video="https://youtu.be/UjtH9Z2tXn8?si=DbuJmZqAXgy824j-">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 mb-4 mb-lg-0">
                        <div class="banner-inner-title">
                            <h5 class="animated text-white text-left mb-0"><span class="text-primary">SELAMAT DATANG</span> <br> DI SISTEM E-PROCUREMENT</h5>
                        </div>
                    </div>


                    <div class="col-lg-6 offset-xl-1 col-xl-5">
                        <div class="float-right">
                            <a style="font-size: 20px;" href="javascript:;" onclick="hidupkan()"><i class="fa fa-volume-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="display: none;" id="video2" class="slider-04 bg-overlay-dark-50 bg-holder jarallax" data-speed='1' data-video-src="https://youtu.be/UjtH9Z2tXn8?si=DbuJmZqAXgy824j-">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 mb-4 mb-lg-0">
                        <div class="banner-inner-title">
                            <h2 class="animated text-white text-left mb-0"><span class="text-primary">SELAMAT DATANG</span> <br> DI SISTEM E-PROCUREMENT</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-xl-1 col-xl-5">
                        <div class="float-right">
                            <a style="font-size: 50px;" href="javascript:;" onclick="matikan()"><i class="fa fa-volume-off"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Banner -->

    <!--=================================
    form -->

    <style>
        .anggarun3:hover {
            transition: all 0.5s;
            transform: scale(1.1);
            transform-origin: top;
        }
    </style>
    <section class="space-ptb bg-holder bg-cover bg-overlay-dark-50" style="background-image: url('<?= base_url('assets/teamplate_transpo/img') ?>/04.jpg');">
        <div class="container">
            <!-- INI KHUSUS MODAL LOGIN -->
            <div class="row">
                <!-- <div class="col-xl-6 mb-4 mb-xl-0">
                    <div class="d-flex bg-holder bg-cover track-left" style="background-image: url();height:500px;border-radius:30px">
                        <div style="opacity:0.9" class="card">
                            <center>
                                <h4>TUTORIAL PENDAFTARAN PENYEDIA</h4>
                            </center>
                            <video autoplay="autoplay" controls="controls" style="width: 100%;">
                                <source src="<?= base_url('assets/video/') ?>iklanjmtm.mp4" type="video/mp4" codecs="avc1.4D401E, mp4a.40.2">
                            </video>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-12 pl-xl-5">
                    <h3 class="text-white mb-4">Fitur-Fitur Dalam Aplikasi E-Procurement JMTM</h3>
                    <p></p>
                    <div class="row">
                        <div class="col-sm-6 mb-4 mb-sm-5">
                            <div class="d-flex">
                                <img src="<?= base_url('assets/img/proc.png') ?>" width="180px" class=" mr-3" alt="">
                                <h5 class=" text-white">Integrated Vendor Management System</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4 mb-sm-5">
                            <div class="d-flex">
                                <img src="<?= base_url('assets/img/logo3.png') ?>" width="160px" class=" mr-3" alt="">
                                <h5 class=" text-white">Global supply Chain Solutions</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4 mb-sm-5">
                            <div class="d-flex">
                                <img src="<?= base_url('assets/img/support.png') ?>" width="180px" class=" mr-3" alt="">
                                <h5 class=" text-white">Technical Support</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4 mb-sm-5">
                            <div class="d-flex">
                                <img src="<?= base_url('assets/img/monitoring.png') ?>" width="180px" class=" mr-3" alt="">
                                <h5 class=" text-white">Solutions & Special Expertise</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="btn btn-primary" href="#">Discover More<i class="fas fa-long-arrow-alt-right ml-3"></i></a> -->
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    form -->
    <!--=================================

    <!--=================================
    features -->

    <!-- Set up your HTML -->
    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5">
                <div class="owl-slider">
                    <div id="carousel" class="owl-carousel shadow-lg rounded bg-white">
                        <div class="item item-image">
                            <img src="<?= base_url('assets/img/slider-jm.jpg') ?>" alt="1000X1000">
                        </div>
                        <div class="item item-image">
                            <img src="<?= base_url('assets/img/slider-jm2.jpg') ?>" alt="">
                        </div>
                        <div class="item item-image">
                            <img src="<?= base_url('assets/img/slider-jm3.jpg') ?>" alt="">
                        </div>
                        <div class="item item-image">
                            <img src="<?= base_url('assets/img/slider-jm4.jpg') ?>" alt="">
                        </div>
                        <div class="item item-image">
                            <img src="<?= base_url('assets/img/slider-jm5.jpg') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bekerja Sama Dengan</h5>
                        <div id="card-owl-carousel" class="owl-carousel owl-theme text-center image-slider card-bekerjasama">
                            <img src="https://www.bankmandiri.co.id/documents/20143/44881086/ag-branding-logo-2.png/30f0204c-d3c1-7237-0e97-6d9c137b2866?t=1623309819189" alt="" width="100px">
                            <img src="https://www.bankmandiri.co.id/documents/20143/44881086/ag-branding-logo-2.png/30f0204c-d3c1-7237-0e97-6d9c137b2866?t=1623309819189" alt="" width="100px">
                            <img src="https://www.bankmandiri.co.id/documents/20143/44881086/ag-branding-logo-2.png/30f0204c-d3c1-7237-0e97-6d9c137b2866?t=1623309819189" alt="" width="100px">
                            <img src="https://www.bankmandiri.co.id/documents/20143/44881086/ag-branding-logo-2.png/30f0204c-d3c1-7237-0e97-6d9c137b2866?t=1623309819189" alt="" width="100px">
                        </div>
                        <!-- <div class="beli mt-5 d-flex justify-content-between">
                            <p class="card-text">Beli</p>
                            <span id="carouselTextBeli"></span>
                        </div>
                        <hr class="border-dark">
                        <div class="jual d-flex justify-content-between">
                            <p class="card-text">Jual</p>
                            <span id="carouselTextJual"></span>
                        </div> -->
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>

            </div>
            <!-- <div class="col-md-4">
                <h3 class="mb-3">Fitur-Fitur Dalam Aplikasi E-Procurement JMTM</h3>
                <div class="row">
                    <div class="col-sm-6 mb-4 mb-sm-5">
                        <img src="<?= base_url('assets/img/proc.png') ?>" width="100px" class=" mr-3" alt="">
                        <p class=" text-dark">Integrated Vendor Management System</p>
                    </div>
                    <div class="col-sm-6 mb-4 mb-sm-5">
                        <img src="<?= base_url('assets/img/logo3.png') ?>" width="100px" class=" mr-3" alt="">
                        <p class=" text-dark">Global supply Chain Solutions</p>
                    </div>
                    <div class="col-sm-6 mb-4 mb-sm-5">
                        <img src="<?= base_url('assets/img/support.png') ?>" width="100px" class=" mr-3" alt="">
                        <p class=" text-dark">Technical Support</p>
                    </div>
                    <div class="col-sm-6 mb-4 mb-sm-5">
                        <img src="<?= base_url('assets/img/monitoring.png') ?>" width="100px" class=" mr-3" alt="">
                        <p class=" text-dark">Solutions & Special Expertise</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <!-- tes -->
    <!-- tes -->
    <!-- <?php
            $this->db->select('*');
            $this->db->from('tbl_berita');
            $data_berita = $this->db->get()->result_array();
            ?>
    <div class="row">
        <?php foreach ($data_berita as $key => $value) : ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://banner2.cleanpng.com/20180812/klg/kisspng-vector-graphics-clip-art-download-royalty-free-com--5b6fe048a74235.8130205015340585686851.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title"><?= $value['nama_berita'] ?></h6>
                                <small class="card-text"><?= date('d-F-Y H:i', strtotime($value['created_at']))  ?></small>
                                <a href="<?= base_url('file_berita/' . $value['file_berita']) ?>" value="<?= $value['file_berita'] ?>" class="btn btn-primary">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
        <?php endforeach; ?>
    </div> -->
    <!-- end tes -->
    <!-- end tes -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery mt-5">
        <div class="container" data-aos="fade-up">

            <div class="col-xl-12">
                <div class="section-title text-center">
                    <h2 class="mb-3">BERITA TENDER</h2>
                    <p>Berita Terkini</p>
                </div>
            </div>

        </div>
        <style>
            .card {
                flex: 1;

                /*Style for presentation purpose*/
                font-family: 'calibri';
                border: 1px solid #ccc;
                background: #fff;
                margin: 12px;
                padding: 12px
            }

            @media screen and (min-width:747px) {

                .card-container {
                    display: flex;
                    flex-wrap: wrap;
                    border-color: black;
                    border-width: 1;
                }

                .card {
                    flex: 1;
                }

            }
        </style>
        <div class="container">

            <div class="card" style="box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);
-webkit-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);
-moz-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);">
                <div class="card-header btn-grad11">
                    Berita Terkini
                    <div class="card-tools float-right">
                        <?php
                        $this->db->select('*');
                        $this->db->from('tbl_berita');
                        $hitung_berita =  $this->db->count_all_results();
                        ?>
                        <span class="badge pull-right badge-secondary">TOTAL BERITA TERKINI : <?= $hitung_berita ?></span>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $this->db->select('*');
                    $this->db->from('tbl_berita');
                    $data_berita = $this->db->get()->result_array();
                    ?>
                    <table class="table table-striped" id="table10" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th style="text-align:center">Nama Berita</th>
                                <th style="text-align:center">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_berita as $key => $value) { ?>
                                <tr>
                                    <td style="width: 10px;">
                                        <center class="text-blue"><?= $i++ ?></center>
                                    </td>
                                    <td><label class="text-success"><a href="<?= base_url('file_berita/') ?><?= $value['file_berita'] ?>"><?= $value['nama_berita'] ?></a></label></td>
                                    <td><label class="text-success"><?= date('d-F-Y H:i', strtotime($value['created_at']))  ?></label></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>

        </div>
    </section>

    <!-- wew -->
    <div class="container">
        <div class="m-fitur-wrapper">
            <p class="a-text a-text-subtitle my-32"></p>
            <div class="row-productNav_wrapper">
                <div class="m-tabs m-tabs-bottom m-tabs--with-link">
                    <div class="row">
                        <div class="col-md-9 col-xs-12 col-lg-9">
                            <ul class="m-tabs-menu total-tabbing">
                                <li class="m-tabs-item">
                                    <a class="active" id="tab_232EF1E9824B4A54AEEDDD6A64E524D1" data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="t_232EF1E9824B4A54AEEDDD6A64E524D1" data-target="#t_232EF1E9824B4A54AEEDDD6A64E524D1" aria-selected="true">
                                        <h2>News &amp; Features</h2>
                                    </a>
                                </li>
                                <li class="m-tabs-item">
                                    <a id="tab_CB622FF2A51647D6A789C80C46E94584" data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="t_CB622FF2A51647D6A789C80C46E94584" data-target="#t_CB622FF2A51647D6A789C80C46E94584" aria-selected="true" class="">
                                        <h2>Edukatips</h2>
                                    </a>
                                </li>
                                <li class="m-tabs-item">
                                    <a id="tab_14CD52ECCE7F431DAEA015638D55B3C9" data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="t_14CD52ECCE7F431DAEA015638D55B3C9" data-target="#t_14CD52ECCE7F431DAEA015638D55B3C9" aria-selected="true">
                                        <h2>#AwasModus</h2>
                                    </a>
                                </li>
                            </ul>
                            <div class="scrolling custom m2 bg-gray tabs-first"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="link-group">
                                <div class="fr link" data-target="#t_232EF1E9824B4A54AEEDDD6A64E524D1" style="">
                                    <a class="next-button undefined" href="/id/informasi/news-and-features">
                                        <span class="tb-cell va-middle">Semua News &amp; Features</span>
                                        <i class="tb-cell va-middle a-system-icon icon-chevron-next"></i>
                                    </a>
                                </div>
                                <div class="fr link" data-target="#t_CB622FF2A51647D6A789C80C46E94584" style="display: none;">
                                    <a class="next-button undefined" href="/id/informasi/Edukatips">
                                        <span class="tb-cell va-middle">Semua Edukatips</span>
                                        <i class="tb-cell va-middle a-system-icon icon-chevron-next"></i>
                                    </a>
                                </div>
                                <div class="fr link" data-target="#t_14CD52ECCE7F431DAEA015638D55B3C9" style="display: none;">
                                    <a class="next-button undefined" href="/id/informasi/awas-modus">
                                        <span class="tb-cell va-middle">Semua #AwasModus</span>
                                        <i class="tb-cell va-middle a-system-icon icon-chevron-next"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-tabs-wrapper my-24 active-state">
                    <div class="tab-content">
                        <div class="tab-pane mb-24 fade active-state is-active" id="t_232EF1E9824B4A54AEEDDD6A64E524D1" role="tabpanel" aria-labelledby="tab_232EF1E9824B4A54AEEDDD6A64E524D1">

                            <script>
                                var itemCount = 7;
                                document.addEventListener('DOMContentLoaded', function() {
                                    var lat = bca.modules.lokasi.userLocation.lat;
                                    var long = bca.modules.lokasi.userLocation.lng;
                                    $.ajax({
                                        type: 'POST',
                                        url: '/api/sitecore/News/GetBeritaEduAwasEventHomepage',
                                        data: {
                                            'dsID': '{5ED8491A-E56B-4770-8D0C-59C716F5C0F5}',
                                            'longitude': long,
                                            'latitude': lat
                                        },
                                        success: function(results) {
                                            if (7 == 3) {
                                                $.each(JSON.parse(results), function(index, value) {
                                                    //var title = value.Title.length > 22 ? value.Title.substring(0, 19) + "..." : value.Title.substring(0, 22);
                                                    var item = `<div class="col-md-4">
										<div class="a-card a-card--landscape shine--load shadow0">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | Berita</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-body a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;

                                                    $('#beritaeduawas_5ED8491AE56B47708D0C59C716F5C0F5').append(item);
                                                    setTimeout(function() {
                                                        $('#beritaeduawas_5ED8491AE56B47708D0C59C716F5C0F5').find('.shine--load').removeClass('shine--load');
                                                        $('.a-card--landscape .a-text-ellipsis').ellipsis({
                                                            type: 'lines',
                                                            count: 3,
                                                            responsive: true,
                                                            destroy: true
                                                        });

                                                    }, 500)

                                                });
                                            } else {
                                                $.each(JSON.parse(results), function(index, value) {
                                                    //var title = value.Title.length > 22 ? value.Title.substring(0, 19) + "..." : value.Title.substring(0, 22);
                                                    if (index == 0) {
                                                        var item = `<div class="col-md-4">
										<div class="a-card a-card--news-new">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | Berita</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-subtitle a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;
                                                    } else {
                                                        var item = `<div class="col-md-4">
										<div class="a-card a-card--landscape shine--load shadow0">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | Berita</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-body a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;
                                                    }

                                                    $('#beritaeduawas_5ED8491AE56B47708D0C59C716F5C0F5').append(item);
                                                    setTimeout(function() {
                                                        $('#beritaeduawas_5ED8491AE56B47708D0C59C716F5C0F5').find('.shine--load').removeClass('shine--load');
                                                        $('.a-card--landscape .a-text-ellipsis').ellipsis({
                                                            type: 'lines',
                                                            count: 3,
                                                            responsive: true,
                                                            destroy: true
                                                        });

                                                    }, 500)

                                                });
                                            }
                                        },
                                        error: function(err) {
                                            console.log(err);
                                        }
                                    });
                                }, false);
                            </script>
                            <div class="row mb-24" id="beritaeduawas_5ED8491AE56B47708D0C59C716F5C0F5">
                                <!--Items From AJAX-->
                                <div class="col-md-4">
                                    <div class="a-card a-card--news-new">
                                        <a href="/id/informasi/news-and-features/2023/11/21/06/36/aktivasi-finansial-nomor-hp-e-banking-bca-via-halo-bca">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20231121-aktivasi-finansial-nomor-hp-e-banking-bca-via-halo-bca-thu.jpg?h=152&amp;w=262&amp;hash=B4E08FF7D2AE872CA89873F5433CD215"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">21 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-subtitle a-text-ellipsis">Aktivasi Finansial Nomor HP e-Banking BCA via Halo BCA</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/news-and-features/2023/10/30/10/55/layanan-sertifikasi-halal-self-declare-bagi-umkm-melalui-bca">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20231113-sertifikasi-halal-thumb-rev.jpg?h=202&amp;w=200&amp;hash=13ED5FF086197DD6CFF830DFB03B1328"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">13 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Layanan Sertifikasi Halal Sel...</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/news-and-features/2023/11/09/03/30/Pembayaran-Kartu-Kredit-Citibank-Dialihkan-Ke-Menu-Bayar-Kartu-Kredit-UOB">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20231109-KARTU-KREDIT-UOB-thumb.jpg?h=152&amp;w=262&amp;hash=95AD8537EA57A300B282D651C6274CA3"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">09 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Pembayaran Kartu Kredit Citibank D...</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/news-and-features/2023/11/06/02/47/himbauan-untuk-tidak-mengenakan-biaya-tambahan-surcharge-atas-transaksi">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20230611-mdr-thu.png?h=152&amp;w=152&amp;hash=774E7FE60B7F7DE0DD9F74CEB09D8EE7"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">06 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Himbauan untuk Tidak M...</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/news-and-features/2023/11/01/07/57/st011-yang-ditunggu-tunggu-akhirnya-datang">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20231101-st011-thumb.jpg?h=200&amp;w=200&amp;hash=185E092BD0E6891B49A49BE53F2EA56F"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">03 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">ST011 yang Ditunggu – Tunggu ...</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/news-and-features/2023/11/01/09/34/Informasi-Perubahan-Masa-Berlaku-Kode-Transaksi-Tarik-Tunai-Cardless">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20231101-myBCA-FITUR-CARDLESS-thumb.jpg?h=152&amp;w=262&amp;hash=033CAD73705E8BD9969EE9F52B4BB2C4"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">01 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Informasi Perubahan Masa Be...</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/news-and-features/2023/11/01/08/42/informasi-perubahan-mdr-qris-usaha-mikro-umi">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/News-And-Features/Page/2023/11/20231101-qris-mdr-thumb.jpg?h=200&amp;w=200&amp;hash=E5CF4F312CF8D36325D1CAC61B4926F5"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">01 Nov 2023 | Berita</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Informasi Perubahan MDR QRI...</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-12 text-center">
                                    <div class="m-tabs next">
                                        <a class="next-button undefined" href="/id/informasi/news-and-features"><span class="tb-cell va-middle">Semua Berita</span><i class="tb-cell va-middle a-system-icon icon-chevron-next"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane mb-24 fade active-state" id="t_CB622FF2A51647D6A789C80C46E94584" role="tabpanel" aria-labelledby="tab_CB622FF2A51647D6A789C80C46E94584">

                            <script>
                                var itemCount = 7;
                                document.addEventListener('DOMContentLoaded', function() {
                                    var lat = bca.modules.lokasi.userLocation.lat;
                                    var long = bca.modules.lokasi.userLocation.lng;
                                    $.ajax({
                                        type: 'POST',
                                        url: '/api/sitecore/News/GetBeritaEduAwasEventHomepage',
                                        data: {
                                            'dsID': '{88FDC110-80CD-4387-8182-E1A6AC3BD90F}',
                                            'longitude': long,
                                            'latitude': lat
                                        },
                                        success: function(results) {
                                            if (7 == 3) {
                                                $.each(JSON.parse(results), function(index, value) {
                                                    //var title = value.Title.length > 22 ? value.Title.substring(0, 19) + "..." : value.Title.substring(0, 22);
                                                    var item = `<div class="col-md-4">
										<div class="a-card a-card--landscape shine--load shadow0">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | Edukatips</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-body a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;

                                                    $('#beritaeduawas_88FDC11080CD43878182E1A6AC3BD90F').append(item);
                                                    setTimeout(function() {
                                                        $('#beritaeduawas_88FDC11080CD43878182E1A6AC3BD90F').find('.shine--load').removeClass('shine--load');
                                                        $('.a-card--landscape .a-text-ellipsis').ellipsis({
                                                            type: 'lines',
                                                            count: 3,
                                                            responsive: true,
                                                            destroy: true
                                                        });

                                                    }, 500)

                                                });
                                            } else {
                                                $.each(JSON.parse(results), function(index, value) {
                                                    //var title = value.Title.length > 22 ? value.Title.substring(0, 19) + "..." : value.Title.substring(0, 22);
                                                    if (index == 0) {
                                                        var item = `<div class="col-md-4">
										<div class="a-card a-card--news-new">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | Edukatips</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-subtitle a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;
                                                    } else {
                                                        var item = `<div class="col-md-4">
										<div class="a-card a-card--landscape shine--load shadow0">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | Edukatips</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-body a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;
                                                    }

                                                    $('#beritaeduawas_88FDC11080CD43878182E1A6AC3BD90F').append(item);
                                                    setTimeout(function() {
                                                        $('#beritaeduawas_88FDC11080CD43878182E1A6AC3BD90F').find('.shine--load').removeClass('shine--load');
                                                        $('.a-card--landscape .a-text-ellipsis').ellipsis({
                                                            type: 'lines',
                                                            count: 3,
                                                            responsive: true,
                                                            destroy: true
                                                        });

                                                    }, 500)

                                                });
                                            }
                                        },
                                        error: function(err) {
                                            console.log(err);
                                        }
                                    });
                                }, false);
                            </script>
                            <div class="row mb-24" id="beritaeduawas_88FDC11080CD43878182E1A6AC3BD90F">
                                <!--Items From AJAX-->
                                <div class="col-md-4">
                                    <div class="a-card a-card--news-new">
                                        <a href="/id/informasi/Edukatips/2023/11/30/15/36/Pakai-QRIS-TUNTAS-fitur-Transfer-di-BCA-mobile-Kirim-Uang-Anti-Ribet">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/11/Thumbnail-Edukatips-QRIS-Transfer.jpg?h=200&amp;w=200&amp;hash=722D989FE8E644D8406C5D869662AD49"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">30 Nov 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-subtitle a-text-ellipsis">Pakai QRIS TUNTAS fitur Transfer di BCA mobile, Kirim Uang Anti Ribet</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/Edukatips/2023/11/20/07/15/Cara-Mengatur-Bahasa-di-Aplikasi-myBCA">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/11/20231120-cara-mengatur-bahasa-di-aplikasi-mybca-thumb.jpg?h=200&amp;w=200&amp;hash=D1AE574D97A17A21DF938E29AF37A2DB"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">20 Nov 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Cara Mengatur Bahasa di Aplikasi myBCA</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/Edukatips/2023/11/14/08/16/solusi-saat-kartu-atm-bca-tertelan-di-mesin-atm">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/11/20231114-mengenai-cara-mengatasi-kartu-atm-tertelan-thumb.jpg?h=200&amp;w=200&amp;hash=6D38418439AF53AB06F58D4F24B501D3"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">14 Nov 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Solusi Saat Kartu ATM BCA Tertelan di Mesin ATM</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/Edukatips/2023/11/01/07/31/Ga-Perlu-Ragu-Ambil-KPR-Asal-Tahu-Informasi-Ini">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/11/20231101-KPR-Tips-thumb.jpg?h=200&amp;w=200&amp;hash=6B361CD88A6D4ED53D4D6F6D92BFC831"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">01 Nov 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Ga Perlu Ragu Ambil KPR Asal Tahu Informasi Ini</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/Edukatips/2023/11/01/07/10/cara-mudah-mengecek-informasi-e-statement-di-mybca">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/11/20231101-estatment-thumb.jpg?h=200&amp;w=200&amp;hash=3199BFB892B907A038963967DD2A0B60"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">01 Nov 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Cara Mudah Mengecek Informasi e-Statement di myBCA</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/Edukatips/2023/11/01/04/48/perbedaan-jenis-surat-berharga-negara-sr-ori-dan-st">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/10/20231101-st011-thumb.jpg?h=200&amp;w=200&amp;hash=E6E5F00E1C07B63D7CE9F0FAA9D720F9"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">01 Nov 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Perbedaan Jenis Surat Berharga Negara SR, ORI, dan ST</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/Edukatips/2023/10/30/04/29/untuk-para-kepala-keluarga-kenali-4-love-language-ini">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Edukatips/2023/10/20231030-love-language-kepala-keluarga-thumb.png?h=200&amp;w=200&amp;hash=F54B1D067C7734F3F76ED53E5563475B"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">30 Okt 2023 | Edukatips</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Untuk Para Kepala Keluarga, Kenali 5 Love Language Ini!</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-12 text-center">
                                    <div class="m-tabs next">
                                        <a class="next-button undefined" href="/id/informasi/Edukatips"><span class="tb-cell va-middle">Semua Edukatips</span><i class="tb-cell va-middle a-system-icon icon-chevron-next"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane mb-24 fade" id="t_14CD52ECCE7F431DAEA015638D55B3C9" role="tabpanel" aria-labelledby="tab_14CD52ECCE7F431DAEA015638D55B3C9">

                            <script>
                                var itemCount = 7;
                                document.addEventListener('DOMContentLoaded', function() {
                                    var lat = bca.modules.lokasi.userLocation.lat;
                                    var long = bca.modules.lokasi.userLocation.lng;
                                    $.ajax({
                                        type: 'POST',
                                        url: '/api/sitecore/News/GetBeritaEduAwasEventHomepage',
                                        data: {
                                            'dsID': '{6CD5DEDA-B5B2-418F-AC38-1A80FBB02BB7}',
                                            'longitude': long,
                                            'latitude': lat
                                        },
                                        success: function(results) {
                                            if (7 == 3) {
                                                $.each(JSON.parse(results), function(index, value) {
                                                    //var title = value.Title.length > 22 ? value.Title.substring(0, 19) + "..." : value.Title.substring(0, 22);
                                                    var item = `<div class="col-md-4">
										<div class="a-card a-card--landscape shine--load shadow0">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | AwasModus</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-body a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;

                                                    $('#beritaeduawas_6CD5DEDAB5B2418FAC381A80FBB02BB7').append(item);
                                                    setTimeout(function() {
                                                        $('#beritaeduawas_6CD5DEDAB5B2418FAC381A80FBB02BB7').find('.shine--load').removeClass('shine--load');
                                                        $('.a-card--landscape .a-text-ellipsis').ellipsis({
                                                            type: 'lines',
                                                            count: 3,
                                                            responsive: true,
                                                            destroy: true
                                                        });

                                                    }, 500)

                                                });
                                            } else {
                                                $.each(JSON.parse(results), function(index, value) {
                                                    //var title = value.Title.length > 22 ? value.Title.substring(0, 19) + "..." : value.Title.substring(0, 22);
                                                    if (index == 0) {
                                                        var item = `<div class="col-md-4">
										<div class="a-card a-card--news-new">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | AwasModus</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-subtitle a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;
                                                    } else {
                                                        var item = `<div class="col-md-4">
										<div class="a-card a-card--landscape shine--load shadow0">
											<a href="` + value.Link + `">
												<div class="a-card--img shine"><img loading="lazy" src="` + value.Image + `"></div>
												<div class="a-card--content">
													<div class="a-card--date shine">
														<p class="a-text a-text-small">` + value.Date + ` | AwasModus</p>
													</div>
													<div class="a-card--title shine">
														<h3 class="a-text a-text-body a-text-ellipsis">` + value.Title + `</h3>
													</div>
												</div>
											</a>
										</div>
									</div>`;
                                                    }

                                                    $('#beritaeduawas_6CD5DEDAB5B2418FAC381A80FBB02BB7').append(item);
                                                    setTimeout(function() {
                                                        $('#beritaeduawas_6CD5DEDAB5B2418FAC381A80FBB02BB7').find('.shine--load').removeClass('shine--load');
                                                        $('.a-card--landscape .a-text-ellipsis').ellipsis({
                                                            type: 'lines',
                                                            count: 3,
                                                            responsive: true,
                                                            destroy: true
                                                        });

                                                    }, 500)

                                                });
                                            }
                                        },
                                        error: function(err) {
                                            console.log(err);
                                        }
                                    });
                                }, false);
                            </script>
                            <div class="row mb-24" id="beritaeduawas_6CD5DEDAB5B2418FAC381A80FBB02BB7">
                                <!--Items From AJAX-->
                                <div class="col-md-4">
                                    <div class="a-card a-card--news-new">
                                        <a href="/id/informasi/awas-modus/2022/12/15/10/15/tolak-dengan-anggun-yang-minta-data-pribadi-perbankan">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2022/12/FA-BCATolak-dengan-AnggunKV-GeneralHORI--Banner---Thumbnail--262-x-152.jpg?h=152&amp;w=262&amp;hash=A3D2428590DA0AF7A1B1EC209E4CCC13"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">15 Des 2022 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-subtitle a-text-ellipsis">Tolak Dengan Anggun Yang Minta Data Pribadi Perbankan</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/awas-modus/2023/11/27/07/57/Waspada-Soceng-dengan-Modus-Penipuan-Jasa-Pengiriman-Barang">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2023/11/20231127-Social-Engineering-Penipuan-Jasa-Pengiriman-Barang-thumb.jpg?h=200&amp;w=200&amp;hash=1253A1B3DCE3F246932014DFD3EC5C24"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">27 Nov 2023 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Awas Social Engineering Jebakan Link Phising Penipuan Jasa Pengiriman Barang</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/awas-modus/2023/11/08/02/30/waspada-penipuan-phishing-karena-maraknya-spyware">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2023/11/20231108-waspada-penipuan-phishing-karena-maraknya-spyware-thumb.jpg?h=200&amp;w=200&amp;hash=66633F321470DB0387A87ADDD0C2919E"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">08 Nov 2023 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Waspada Penipuan Phishing Karena Maraknya Spyware</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/awas-modus/2023/11/07/09/27/awas-modus-investasi-bodong-pilih-yang-terpercaya">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2023/11/20231107-investasi-bodong-thum.jpeg?h=200&amp;w=200&amp;hash=EC16D53C0A5CED32E6F7DB8258EA349A"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">07 Nov 2023 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Awas Modus Investasi Bodong, Pilih yang Terpercaya</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/awas-modus/2023/10/17/03/47/waspada-modus-penipuan-menggunakan-qr-code">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2023/10/20231017-Awas-Modus-Penipuan-QR-Thumb.jpg?h=200&amp;w=200&amp;hash=8E373AC67946C96AB9F9A8A415B79161"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">17 Okt 2023 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Waspada Modus Penipuan Menggunakan QR Code! </h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/awas-modus/2023/10/16/09/52/awasmodus-catfishing-mengincar-kamu-dan-orang-terdekatmu">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2023/10/20231016-awas-modus-catfishing-thu.jpg?h=200&amp;w=200&amp;hash=06987C38CFE489D91210602A96A5E341"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">16 Okt 2023 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">#AwasModus Catfishing Mengincar Kamu dan Orang Terdekatmu!</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="a-card a-card--landscape shadow0">
                                        <a href="/id/informasi/awas-modus/2023/10/12/03/52/kenali-modus-penipuan-brand-impersonation-dan-tips-keamanannya">
                                            <div class="a-card--img shine"><img loading="lazy" src="/-/media/Feature/News/Awas-Modus/2023/10/20231012-thumbnail-awas-modus-brand-impersonation.jpg?h=200&amp;w=200&amp;hash=CA70B60AFFFF976BB0D0745B05A9FD12"></div>
                                            <div class="a-card--content">
                                                <div class="a-card--date shine">
                                                    <p class="a-text a-text-small">12 Okt 2023 | AwasModus</p>
                                                </div>
                                                <div class="a-card--title shine">
                                                    <h3 class="a-text a-text-body a-text-ellipsis">Kenali Modus Penipuan Brand Impersonation dan Tips Keamanannya</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-12 text-center">
                                    <div class="m-tabs next">
                                        <a class="next-button undefined" href="/id/informasi/awas-modus"><span class="tb-cell va-middle">Semua #AwasModus</span><i class="tb-cell va-middle a-system-icon icon-chevron-next"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=================================
    Testimonial -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center">
                        <h2 class="mb-3">DATA TENDER PENGADAAN</h2>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-lg-10">
                    <div class="item first-item">
                        <div class="card" style="box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-webkit-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-moz-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);">
                            <div class="card-header btn-grad70">
                                Pengadaan Barang
                                <div class="card-tools float-right">
                                    <span class="badge pull-right badge-secondary"><?= $hitung_pengadaan_barang['total_paket'] ?></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1" style="font-size: 11px;">
                                    <thead>
                                        <th style="width: 10px;">No</th>
                                        <th style="text-align:center">Nama Paket</th>
                                        <th style="text-align:center" width="170">HPS</th>
                                        <th style="text-align:center" width="170">Akhir Pendaftaran</th>
                                        <th style="text-align:center" width="170">Persyaratan</th>

                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($ambil_paket as $key => $value) { ?>
                                            <tr class="Pengadaan_Barang" sytle="display:none">
                                                <td style="width: 10px;">
                                                    <center class="text-info"><?= $i++ ?></center>
                                                </td>
                                                <td><label class="text-info"><?= $value['nama_paket'] ?></label></td>
                                                <td class="table-hps">
                                                    <?php
                                                    $this->db->select_sum('total_rincian_hps_pdf');
                                                    $this->db->where('id_paket', $value['id_paket']);
                                                    $this->db->from('tbl_rincian_hps_pdf');
                                                    $query = $this->db->get()->row_array();
                                                    echo "Rp " . number_format($query['total_rincian_hps_pdf'], 2, ',', '.');
                                                    ?>
                                                </td>
                                                <?php if ($value['batas_pendaftaran'] == null) { ?>
                                                    <td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
                                                <?php    } else { ?>
                                                    <td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
                                                <?php } ?>
                                                <td style="text-align:center;"> <a href="javascript:;" onclick="lihat_persyartaan(<?= $value['id_paket'] ?>)"> <i style="font-size:18px" class="fas fa fa-eye"> Lihat</i></a></td>
                                                <!-- <td class="center">21 Februari 2021 23:59</td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="card" style="box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-webkit-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-moz-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);">
                            <div class="card-header btn-grad12">
                                PENGADAAN JASA PEMBORONGAN
                                <div class="card-tools float-right">
                                    <span class="badge pull-right badge-secondary">TOTAL : <?= $hitung_pengadaan_jasa_konsultasi['total_paket']  ?></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="overflow-x: auto; margin-top: -10px;">
                                    <table class="table table-striped" id="table3" style="font-size: 11px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px;">No</th>
                                                <th style="text-align:center">Nama Paket</th>
                                                <th style="text-align:center" width="170">HPS</th>
                                                <th style="text-align:center" width="170">Akhir Pendaftaran</th>
                                                <th style="text-align:center" width="170">Persyaratan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($ambil_paket2 as $key => $value) { ?>
                                                <tr class="Jasa_Konsultansi_Badan_Usaha" sytle="display:none">
                                                    <td style="width: 10px;">
                                                        <center class="text-blue"><?= $i++ ?></center>
                                                    </td>
                                                    <td><label class="text-danger"><?= $value['nama_paket'] ?></label></td>
                                                    <td class="table-hps">
                                                        <?php
                                                        $this->db->select_sum('total_rincian_hps_pdf');
                                                        $this->db->where('id_paket', $value['id_paket']);
                                                        $this->db->from('tbl_rincian_hps_pdf');
                                                        $query = $this->db->get()->row_array();
                                                        echo "Rp " . number_format($query['total_rincian_hps_pdf'], 2, ',', '.');
                                                        ?>
                                                    </td>
                                                    <?php if ($value['batas_pendaftaran'] == null) { ?>
                                                        <td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
                                                    <?php    } else { ?>
                                                        <td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
                                                    <?php } ?>
                                                    <td style="text-align:center;"> <a href="javascript:;" onclick="lihat_persyartaan(<?= $value['id_paket'] ?>)"> <i style="font-size:18px" class="fas fa fa-eye"> Lihat</i></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="card" style="box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-webkit-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-moz-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);">
                            <div class="card-header btn-grad11">
                                Jasa Konsultansi
                                <div class="card-tools float-right">
                                    <span class="badge pull-right badge-secondary">TOTAL : <?= $hitung_jasa_pemborongan['total_paket'] ?></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table2" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th style="text-align:center">Nama Paket</th>
                                            <th style="text-align:center" width="170">HPS</th>
                                            <th style="text-align:center" width="170">Akhir Pendaftaran</th>
                                            <th style="text-align:center" width="170">Persyaratan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($ambil_paket3 as $key => $value) { ?>
                                            <tr class="Jasa_Konsultansi_Badan_Usaha" sytle="display:none">
                                                <td style="width: 10px;">
                                                    <center class="text-blue"><?= $i++ ?></center>
                                                </td>
                                                <td><label class="text-success"><?= $value['nama_paket'] ?></label></td>
                                                <td class="table-hps">
                                                    <?php
                                                    $this->db->select_sum('total_rincian_hps_pdf');
                                                    $this->db->where('id_paket', $value['id_paket']);
                                                    $this->db->from('tbl_rincian_hps_pdf');
                                                    $query = $this->db->get()->row_array();
                                                    echo "Rp " . number_format($query['total_rincian_hps_pdf'], 2, ',', '.');
                                                    ?>
                                                    <?php if ($value['batas_pendaftaran'] == null) { ?>
                                                <td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
                                            <?php    } else { ?>
                                                <td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
                                            <?php } ?>
                                            <td style="text-align:center;"> <a href="javascript:;" onclick="lihat_persyartaan(<?= $value['id_paket'] ?>)"> <i style="font-size:18px" class="fas fa fa-eye"> Lihat</i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="card" style="box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-webkit-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);-moz-box-shadow: -3px 2px 27px -6px rgba(13,158,158,0.94);">
                            <div class="card-header btn-grad12">
                                PENGADAAN JASA LAINNYA
                                <div class="card-tools float-right">
                                    <span class="badge pull-right badge-secondary">TOTAL : <?= $hitung_jasa_lain['total_paket']  ?></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table4" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th style="text-align:center">Nama Paket</th>
                                            <th style="text-align:center" width="170">HPS</th>
                                            <th style="text-align:center" width="170">Akhir Pendaftaran</th>
                                            <th style="text-align:center" width="170">Persyaratan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($ambil_paket4 as $key => $value) { ?>
                                            <tr class="Jasa_Konsultansi_Badan_Usaha" sytle="display:none">
                                                <td style="width: 10px;">
                                                    <center class="text-blue"><?= $i++ ?></center>
                                                </td>
                                                <td><label class="text-warning"><?= $value['nama_paket'] ?></label></td>
                                                <td class="table-hps">
                                                    <?php
                                                    $this->db->select_sum('total_rincian_hps_pdf');
                                                    $this->db->where('id_paket', $value['id_paket']);
                                                    $this->db->from('tbl_rincian_hps_pdf');
                                                    $query = $this->db->get()->row_array();
                                                    echo "Rp " . number_format($query['total_rincian_hps_pdf'], 2, ',', '.');
                                                    ?>
                                                </td>
                                                <?php if ($value['batas_pendaftaran'] == null) { ?>
                                                    <td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
                                                <?php    } else { ?>
                                                    <td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
                                                <?php } ?>
                                                <td style="text-align:center;"> <a href="javascript:;" onclick="lihat_persyartaan(<?= $value['id_paket'] ?>)"> <i style="font-size:18px" class="fas fa fa-eye"> Lihat</i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!--=================================
    Testimonial -->

    <!--=================================
    Contact -->
    <div class="map-contact">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253779.60038638717!2d106.55675047920163!3d-6.354386266581652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f29c898a114b%3A0xbdc38eee360b6262!2sJasa%20Marga!5e0!3m2!1sen!2sid!4v1648036613417!5m2!1sen!2sid" style="border:0; height: 600px;"></iframe>
    </div>
    <!--=================================
    Contact -->

    <!--=================================
    footer-->
    <footer class="footer space-pt bg-dark mt-n2">
        <div class="container">
            <img class="img-fluid mb-5" style="width: 20%;" src="<?= base_url('assets/teamplate_transpo/img/JMTMLOGOKU.png') ?>" alt="logo">
            <div class="row">
                <div class="col-sm-6 col-lg-3 order-lg-1 mb-5 mb-lg-0">
                    <h6 class="text-white mb-3 mb-2 md-5">Where To Find Us </h6>
                    <ul class="footer-contact list-unstyled">
                        <li>
                            <div class="footer-contact-icon">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="footer-contact-info">
                                <a style="color: white;" href="https://www.instagram.com/jmtm.official/">Instagram JMTM</a>
                            </div>
                        </li>
                        <li>
                            <div class="footer-contact-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="footer-contact-info">
                                <a style="color: white;" target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=new">Email Jmtm</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9 col-lg-3 offset-xl-1 order-lg-3 mb-5 mb-sm-0">
                    <h6 class="text-white mb-3 mb-2 md-5">CONTACT US</h6>
                    <div class="call-center">
                        <p class="text-white">Kantor Pusat
                            Gedung C Graha Service Provider Lantai 1 Kawasan Kantor Pusat PT Jasa Marga (Persero) Tbk. Plaza Tol Taman Mini Indonesia Indah Jakarta 13550
                            Telp : 0815 - 2680 - 4622 email : procurement@jmtm.co.id PT Jasamarga Tollroad Maintenance is a Subsidiary of PT Jasa Marga (Persero) Tbk</p>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-2">
                    <div class="footer-newsletter">
                        <h3 class="text-white">PT Jasamarga Tollroad Maintenance </h3>
                        <p class="text-white">merupakan anak usaha dari PT Jasa Marga (Persero) Tbk, penyedia jalan bebas hambatan terbesar di Indonesia, di mana sebesar 99,82% kepemilikannya adalah milik Jasa Marga sebagai induk Perusahaan. Dikenal bergerak dalam bidang pemeliharaan jalan tol untuk mendukung lini bisnis utama Jasa Marga terutama dalam hal pemenuhan Standar Pelayanan Minimum (SPM) jalan tol, PT Jasamarga Tollroad Maintenance memiliki kantor pusat di Jakarta.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <a class="footer-brand" href="index.html">

                        </a>
                    </div>
                    <div class="col-md-4">
                        <!-- <label class="mr-2" style="color: white;font-weight:bold;" for=""> Support By : </label>
                        <img src="<?= base_url('assets/teamplate_transpo/img/30.png') ?>" width="100px" style="margin-top: -15px;" alt=""> -->
                    </div>
                    <div class="col-md-2 text-left text-md-right mt-4 mt-md-0">

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modal_syarat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Persyaratan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Persyaratan</th>
                                    <th>Keterangan</th>

                                </tr>
                            </thead>
                            <tbody id="result_tambahan">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--=================================
    footer-->


    <!--=================================
    Back To Top -->
    <!-- <div id="back-to-top" class="back-to-top">
        <a href="#"><i class="fas fa-chevron-up"></i></a>
    </div>
    <div id="back-to-top" class="back-to-top2">
        <a target="_blank" href="https://api.whatsapp.com/send?phone=+6281526804622&text=HALLO JASAMARGA TOLLROAD MAINTENANCE" style="color: white;"> <img src="<?= base_url('assets/img/wqa.png') ?>" class="mr-2" width="30px" alt=""> WhatsApp</a>
    </div> -->
    <!--=================================
    Back To Top -->

    <!--=================================
    Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>popper.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>bootstrap.min.js"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jquery.appear.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jquery.typer.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>shuffle.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jquery.countTo.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jarallax.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>jarallax-video.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>select2.full.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>custom.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>glightbox.min.js"></script>
    <script src="<?= base_url('assets/teamplate_transpo/js/') ?>swiper-bundle.min.js"></script>
    <script>
        $('.jarallax').jarallax({
            videoVolume: 1000,
            onInit: function() {
                var self = this;
                var video = self.video;
                video.unmute();
            }
        });

        function hidupkan() {
            $('.jarallax').jarallax({
                videoVolume: 1000,
                onInit: function() {
                    var self = this;
                    var video = self.video;
                    video.unmute();
                }
            });
            $('#video1').hide()
            $('#video2').show()
        }

        function matikan() {
            location.reload('<?= base_url() ?>')
        }
    </script>
    <script>
        function modal_login() {
            $('#exampleModal').modal('show');
        }
        $(document).ready(function() {
            $('#table1').DataTable();
        });
        $(document).ready(function() {
            $('#table2').DataTable();
        });
        $(document).ready(function() {
            $('#table3').DataTable();
        });
        $(document).ready(function() {
            $('#table4').DataTable();
        });
        $(document).ready(function() {
            $('#table10').DataTable();
        });
        /**
         * Gallery Slider
         */
        new Swiper('.gallery-slider', {
            speed: 400,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
                1200: {
                    slidesPerView: 7,
                    spaceBetween: 30
                }
            }
        });

        /**
         * Initiate gallery lightbox
         */
        const galleryLightbox = GLightbox({
            selector: '.gallery-lightbox'
        });

        /**
         * Testimonials slider
         */
        new Swiper('.testimonials-slider', {
            speed: 600,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 'auto',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 40
                },

                1200: {
                    slidesPerView: 2,
                    spaceBetween: 40
                }
            }
        });

        /**
         * Animation on scroll
         */
        window.addEventListener('load', () => {
            AOS.init({
                duration: 1000,
                easing: "ease-in-out",
                once: true,
                mirror: false
            });
        });
    </script>
    <script>
        function modal_login() {
            $('#exampleModal').modal('show');
        }
    </script>
    <script>
        var saratmodal = $('#modal_syarat');

        function lihat_persyartaan(id) {
            console.log(id)
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/ambil_persyaratan/') ?>" + id,
                dataType: "JSON",
                success: function(response) {
                    saratmodal.modal('show');
                    var html = '';
                    var i;
                    for (i = 0; i < response['get_persyaratan'].length; i++) {
                        if (!response['get_persyaratan'][i].kualifikasi_usaha_sbu_detail) {
                            var dataangga = 'Paket Belum Di Umumkan'
                        } else {
                            var dataangga = response['get_persyaratan'][i].kualifikasi_usaha_sbu_detail;
                        }
                        html += '<tr>' +
                            '<td>' + response['get_persyaratan'][i].kode_sbu + '</td>' +
                            '<td>' + response['get_persyaratan'][i].nama_sbu + '</td>' +
                            '</tr>'
                    }
                    $('#result_tambahan').html(html);
                }
            })
        }
    </script>


    <!-- script han -->
    <script>
        const navbar = document.querySelectorAll('.navbar')[1];
        // make the navbar transparent when the page is scrolled
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 0) {
                navbar.classList.add('opa');

            } else {
                navbar.classList.remove('opa');
            }
        })

        function openNav() {
            document.getElementById("myNav").style.height = "100%";
            document.getElementById("nav-icon3").classList.add('open');
            // const hamburger = document.querySelector(".hamburger");
            document.getElementById("ham").style.zIndex = '99';
        }

        function closeNav() {
            document.getElementById("myNav").style.height = "0%";
            document.getElementById("nav-icon3").classList.remove('open');
        }
    </script>

    <script>
        $("#carousel").owlCarousel({
            autoplay: true,
            loop: true,
            rewind: true,
            /* use rewind if you don't want loop */
            margin: 10,
            /*
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            */
            responsiveClass: true,
            autoHeight: true,
            // autoplayTimeout: 7000,
            // smartSpeed: 800,
            dotSpeed: 500,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        });


        let owl = $('#card-owl-carousel');
        owl.owlCarousel({
            autoplay: true,
            rewind: true,
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
            responsiveClass: true,
            autoplayTimeout: 3000,
            items: 1,
        })

        // // Menanggapi perubahan pada Owl Carousel
        // owl.on('changed.owl.carousel', function(event) {
        //     // Mendapatkan indeks item yang sedang aktif
        //     var currentIndex = event.item.index;

        //     // Mengupdate teks pada elemen span berdasarkan indeks
        //     updateSpanText(currentIndex);
        // });

        // // Fungsi untuk mengupdate teks pada elemen span
        // function updateSpanText(index) {
        //     let spanTextBeli = document.getElementById('carouselTextBeli');
        //     let spanTextJual = document.getElementById('carouselTextJual');
        //     // Menentukan teks berdasarkan indeks
        //     let textsBeli = ["10", "11", '12', '13', '14', '15', '16', '17'];
        //     let textsJual = ["10", "11", '2', '3', '4', '5', '6', '7'];

        //     // Mengatur teks pada elemen span berdasarkan indeks
        //     spanTextBeli.innerHTML = textsBeli[index];
        //     spanTextJual.innerHTML = textsJual[index];
        // }
    </script>
</body>

</html>