<!------ Include the above in your HEAD tag ---------->
<style>
   .user_img_msg {
      height: 100% !important;
      width: 100% !important;
      /* border: 1.5px solid #f5f6fa; */
   }

   #textnya {
      font-size: large;
      font: message-box;
      font-weight: bolder;
   }

   .profileku {
      width: 100% !important;
      height: 65%;
      border-radius: 10px;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
   }

   .user_img_ku {
      height: 40px;
      width: 40px;
      border: 1.5px solid #f5f6fa;
   }


   .chat {
      margin-top: auto;
      margin-bottom: auto;
   }

   .card {
      height: 500px;
      border-radius: 15px !important;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(7, 6, 18, 1) 0%, rgba(42, 41, 136, 1) 100%);
   }

   .contacts_body {
      padding: 0.75rem 0 !important;
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
      background: rgb(209, 226, 227);
      background: linear-gradient(90deg, rgba(209, 226, 227, 1) 5%, rgba(255, 209, 0, 0.30015756302521013) 86%);
      border: 0 !important;
      color: black !important;
   }

   .search:focus {
      box-shadow: none !important;
      outline: 0px !important;
   }

   .type_msg {
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
      border: 0 !important;
      color: white !important;
      height: 60px !important;
      overflow-y: auto;
   }

   .type_msg:focus {
      box-shadow: none !important;
      outline: 0px !important;
   }

   .attach_btn {
      border-radius: 15px 0 0 15px !important;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
      border: 0 !important;
      color: white !important;
      cursor: pointer;
   }

   .send_btn {
      border-radius: 0 15px 15px 0 !important;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
      border: 0 !important;
      color: white !important;
      cursor: pointer;
   }

   .search_btn {
      border-radius: 0 15px 15px 0 !important;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
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

   .active-angga {
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
   }

   .user_img {
      height: 70px;
      width: 70px;
      border: 1.5px solid #f5f6fa;

   }

   .user_img_msg {
      height: 40px;
      width: 40px;
      border: 1.5px solid #f5f6fa;

   }

   .img_cont {
      position: relative;
      height: 70px;
      width: 70px;
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
      font-size: 20px;
      color: white;
   }


   .user_info span {
      font-size: 20px;
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
      bottom: -17px;
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
      background: white;
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
      background: white;
   }

   @media(max-width: 576px) {
      .contacts_card {
         margin-bottom: 15px !important;
      }
   }
</style>
<div class="preloader">
   <div class="loading">
      <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
   </div>
</div>
<div id="main" class="container">
   <input type="hidden" name="id_paket" id="id_paket" value="<?= $ambil_panitia['id_paket'] ?>">
   <div class="breadcrumb bg-primary" style="margin-top: 60px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
   <div class="float-right">
      <a href="javascipt:;" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_liha_chat"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
      <a href="javascipt:;" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_liha_chat_sangahan"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan" class="badge badge-danger navbar-badge">3</span> Pesan Sangahan</a>
   </div>
   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
         <a class="nav-link  bg-info text-white" href="<?= base_url('panitiajmtm/beranda/informasitender/' . $ambil_panitia['id_paket']) ?>">Informasi Tender</a>
      </li>
      <li class=" nav-item">
         <a class="nav-link bg-primary text-white active" href="<?= base_url('panitiajmtm/beranda/menu_chat/' . $ambil_panitia['id_paket']) ?>">Pertanyaan <span id="notifikasi" class="badge badge-danger navbar-badge"></span></a>
      </li>

      <li class="nav-item">
         <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/penawaranpesertatender/' . $ambil_panitia['id_paket']) ?>">Penawaran Peserta</a>
      </li>
      <li class="nav-item">
         <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $ambil_panitia['id_paket']) ?>">Evaluasi</a>
      </li>
      <!-- <li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/reverseauctiontender/' . $ambil_panitia['id_paket']) ?>">Reverse Auction</a>
		</li> -->
      <li class="nav-item">
         <a class="nav-link bg-info text-white" href="<?= base_url('panitiajmtm/beranda/sanggahantender/' . $ambil_panitia['id_paket']) ?>">Sangahan</a>
      </li>
   </ul>
   <div class="tab-content">
      <div class="card-body  bg-white">
         <div class="container-fluid">
            <div class="row">
               <table class="table table-striped">
                  <tbody>
                     <tr>
                        <th style="width: 200px;">Kode Tender</th>
                        <td><?= $ambil_panitia['kode_tender'] ?></td>
                     </tr>
                     <tr>
                        <th>Nama Paket</th>
                        <td><?= $ambil_panitia['nama_paket'] ?></td>
                     </tr>
                     <tr>
                        <th>Nama Jenis Pengadaan</th>
                        <td><?= $ambil_panitia['nama_jenis_pengadaan'] ?></td>
                     </tr>
                     <tr>
                        <th>Nama Metode Pemilihan</th>
                        <td><?= $ambil_panitia['nama_metode_pemilihan'] ?></td>
                     </tr>
                     <tr>
                        <th>Divisi</th>
                        <td><?= $ambil_panitia['nama_unit_kerja'] ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4 col-xl-4 chat">
               <div class="card mb-sm-3 mb-md-0">
                  <div class="card-header" style="background: rgb(209,226,227);
background: linear-gradient(90deg, rgba(209,226,227,1) 5%, rgba(201,219,227,1) 7%, rgba(37,64,232,0.6558998599439776) 50%, rgba(255,209,0,0.8491771708683473) 94%);">
                     <div class="input-group" style="">
                        <input type="text" placeholder="Search..." name="" class="form-control search text-white">
                        <div class="input-group-prepend">
                           <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <ui class="contacts">
                        <li class="profileku">
                           <div class="d-flex bd-highlight">
                              <div class="img_cont">
                                 <img src="<?= base_url('assets/img/test1.png') ?>" width="70px" class="rounded-circle">
                              </div>
                              <div class="user_info_ku">
                                 <span><?= $this->session->userdata('nama_pegawai'); ?></span>
                              </div>
                              <div class="user_info_ku iconya">
                                 <i class="fas fa-cog" style="
											color: aliceblue;
											margin-top: 10px;
										"></i>
                              </div>
                              <div class="user_info_ku iconya">
                                 <span class="keluar">
                                    <i class="fas fa-sign-out-alt" style="
											color: aliceblue;
											margin-top: 10px;
										"></i>
                                 </span>

                              </div>
                           </div>
                        </li>
                     </ui>
                  </div>
                  <div class="card-body contacts_body">
                     <ui class="contacts" id="yangAktif">
                     </ui>
                  </div>
                  <div class="card-footer" style="background: rgb(209,226,227);
background: linear-gradient(90deg, rgba(209,226,227,1) 5%, rgba(201,219,227,1) 7%, rgba(37,64,232,0.6558998599439776) 50%, rgba(255,209,0,0.8491771708683473) 94%);"></div>
               </div>
            </div>
            <!-- ini Untuk Yang Buat Vendor -->
            <div class="col-md-8 col-xl-8 chat">
               <div class="card">
                  <div class="card-body msg_card_body" id="letakpesan">
                     <img src="<?= base_url('assets/img/mulaixhat.gif') ?>" width="690px" height="400px" alt="">
                  </div>
               </div>
            </div>
         </div>
         <span class="badge badge-warning" style="margin-top: 10px;">R</span>&ensp;Penyedia barang/jasa/peserta&ensp;&ensp;
         <span class="badge badge-primary">P</span>&ensp;Panitia/pokja
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
            <div class="card contacts_body" style="height: 500px;">
               <ui class="contacts" id="yangAktif2">
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