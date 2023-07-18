<style>
   .btn-grad100 {
      background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
   }

   .btn-grad100 {
      text-transform: uppercase;
      transition: 0.5s;
      background-size: 200% auto;
      color: white;
      box-shadow: 0 0 20px #eee;
   }

   .btn-grad100:hover {
      background-position: right center;
      color: #fff;
      box-shadow: 0 0 30px #ee0979;
      text-decoration: none;
   }

   .btn-grad101 {
      background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
   }

   .btn-grad101 {
      width: 30px;
      height: 30px;
      text-transform: uppercase;
      transition: 0.5s;
      background-size: 200% auto;
      color: white;
      box-shadow: 0 0 20px #eee;
      border-radius: 5px;
      display: block;
      border: none;
   }

   .btn-grad101:hover {
      background-position: right center;
      color: #fff;
      box-shadow: 0 0 30px #ee0979;
      text-decoration: none;
   }
</style>
<div class="preloader">
   <div class="loading">
      <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
   </div>
</div>
<div class="container">
   <input type="hidden" name="id_paket" id="id_paketkusaja" value="<?= $angga['id_paket'] ?>">
   <br>
   <?php if ($this->session->userdata('id_role') == 6) { ?>
      <ol class="breadcrumb btn-grad100" href="#">Penyedia Terpilih</a></li>
      </ol>
   <?php  } else { ?>
      <ol class="breadcrumb btn-grad100" href="#">Pilih Penyedia</a></li>
      </ol>
   <?php } ?>
   <div class="content">
      <ul class="nav nav-tabs mb-3" style="border: none;" id="myTab" role="tablist">
         <li class="nav-item mr-2">
            <a class="nav-link  btn-grad100" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pilih Penyedia</a>
         </li>
         <li class="nav-item  mr-2">
            <a class="nav-link  btn-grad100" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penyedia Terpilih</a>
         </li>
         <li class="nav-item  mr-2">
            <a class="nav-link  btn-grad100" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Penyedia Baru</a>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
               <div class="card-header bg-primary text-white">
                  Pilih Penyedia
               </div>
               <div class="card-body">
                  <div style="overflow: auto;">
                     <table class="table table-hover" id="table_pilih_penyedia">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Pilih / Tunjuk</th>
                              <th>Nama Penyedia</th>
                              <th>Email Penyedia</th>
                              <th>Alamat Perusahaan</th>
                              <th>No Telpon Perusahaan</th>
                           </tr>
                        </thead>
                        <tbody>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
               <div class="card-header bg-primary text-white">
                  Penyedia Terpilih
               </div>
               <div class="card-body">
                  <div style="overflow: auto;">
                     <table class="table table-hover" id="table_penyedia_lama">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Pilih / Tunjuk</th>
                              <th>Nama Penyedia</th>
                              <th>Email Penyedia</th>
                              <th>Alamat Perusahaan</th>
                              <th>No Telpon Perusahaan</th>
                              <?php if ($this->session->userdata('id_role') == 6 | $angga['status_persetujuan_manager'] == 3 && 4) { ?>
                              <?php  } else { ?>
                                 <th>Action</th>
                              <?php } ?>

                           </tr>
                        </thead>
                        <tbody>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
               <div class="card-header bg-primary text-white">
                  Penyedia Baru Terdaftar
                  <div class="float-right" id="status_vendor">
                     <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_tambah_penyedia">+ Daftarkan Penyedia Baru</button>
                  </div>
               </div>
               <div class="card-body">
                  <div style="overflow: auto;">
                     <table class="table table-hover" id="table_penyedia_baru">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Status</th>
                              <th>Nama Penyedia</th>
                              <th>No KTP</th>
                              <th>Email Penyedia</th>
                              <th>Alamat Perusahaan</th>
                              <th>No Telpon Perusahaan</th>
                              <?php if ($this->session->userdata('id_role') == 6) { ?>
                              <?php  } else { ?>
                                 <th>Action</th>
                              <?php } ?>
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
      <center>
         <?php if ($this->session->userdata('id_role') == 6) { ?>

            <a style="width: 200px;" class="btn btn-grad100" href="<?= base_url('paket/detail_paket/' . $angga['id_paket']) ?>">Kembali</a>
         <?php } else { ?>
            <?php if ($angga['id_metode_pemilihan'] == 10) { ?>
               <a href="<?= base_url('paket/edit_transaksi_langsung/' . $angga['id_paket']) ?>" style="width: 200px;" class="btn btn-grad100">Kembali</a>
            <?php   } else if ($angga['id_metode_pemilihan'] == 9) { ?>
               <a href="<?= base_url('penetapanlangsung/detailpaket/' . $angga['id_paket']) ?>" style="width: 200px;" class="btn btn-grad100">Kembali</a>
            <?php   } else { ?>
               <a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" style="width: 200px;" class="btn btn-grad100">Kembali</a>
            <?php } ?>
         <?php } ?>
      </center>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_penyedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header btn btn-grad100">
            <div class="card-tols">
               Daftarkan Penyedia Baru
            </div>
         </div>
         <div class="modal-body">
            <form action="" id="form_tambah_penyedia">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username_vendor" class="form-control form-control-sm">
                        <p class="username_vendor-error text-danger"></p>
                     </div>
                     <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password_vendor" class="form-control form-control-sm">
                        <p class="password_vendor-error text-danger"></p>
                     </div>
                     <div class="form-group">
                        <label for="">Email Penyedia</label>
                        <input type="email" name="email_vendor" class="form-control form-control-sm">
                        <p class="email_vendor-error text-danger"></p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">No. KTP</label>
                        <input type="text" name="no_ktp_vendor" class="form-control form-control-sm">
                        <p class="no_ktp_vendor-error text-danger"></p>
                     </div>
                     <div class="form-group">
                        <label for="">No Telpon Perusahaan</label>
                        <input type="text" name="telpon_vendor" class="form-control form-control-sm">
                        <p class="telpon_vendor-error text-danger"></p>
                     </div>
                     <div class="form-group">
                        <label for="">Alamat Penyedia</label>
                        <textarea name="alamat_vendor" class="form-control form-control-sm"></textarea>
                        <p class="alamat_vendor-error text-danger"></p>
                     </div>
                     <input type="hidden" name="status_mengikuti_paket[]" value="1" class="form-control form-control-sm">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnSave" onclick="simpan_pilih_penyedia()">Tambah Penyedia Baru</button>
         </div>
      </div>
   </div>
</div>

<!-- edit Penyedia -->
<div class="modal fade" id="modal_edit_penyedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header btn btn-grad100">
            <div class="card-tols">
               Edit Penyedia
            </div>
         </div>
         <div class="modal-body">
            <form action="" id="form_edit_penyedia">
               <div class="row">
                  <div class="col-md-6">
                     <input type="text" id="id_mengikuti_vendor" name="id_mengikuti_vendor" class="form-control form-control-sm">
                     <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username_vendor" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password_vendor" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                        <label for="">Email Penyedia</label>
                        <input type="text" name="email_vendor" class="form-control form-control-sm">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="">No. KTP</label>
                        <input type="text" name="no_ktp_vendor" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                        <label for="">No Telpon Perusahaan</label>
                        <input type="text" name="telpon_vendor" class="form-control form-control-sm">
                     </div>
                     <div class="form-group">
                        <label for="">Alamat Penyedia</label>
                        <textarea name="alamat_vendor" class="form-control form-control-sm"></textarea>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnSave" onclick="edit_pilih_penyedia()">Tambah Penyedia Baru</button>
         </div>
      </div>
   </div>
</div>
<div style="display: block;">
   <form action="" id="form_tambah_penyedia_lama">
      <div class="form-group">
         <input type="hidden" name="id_mengikuti_vendor" class="form-control form-control-sm">
      </div>
   </form>
   <!-- <button type="button" class="btn btn-primary" id="btnSave" onclick="simpan_pilih_penyedia_lama()">Tambah Penyedia Baru</button> -->
</div>