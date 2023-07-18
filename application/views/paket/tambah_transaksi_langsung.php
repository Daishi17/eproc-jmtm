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
   <br>
   <ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
      <li><a style="text-decoration: none; color:white;" href="#">Transaksi Langsung</a></li>

   </ol>
   <div class="content">
      <div class="card tab-content p-3" id="nav-tabContent">
         <br>
         <div class="row">
            <div class="col-md-2"> <label for="" class="uppercasess">Unit </label></div>
            <div class="col-md-4">
               <div class="formline">
                  <select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2bs4">
                     <option value=""></option>
                     <option value=""></option>
                     <?php foreach ($getdivisi as $key => $value) { ?>
                        <option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
                     <?php } ?>
                  </select>
                  <button class="btn-grad101 ml-3" id="reload"><i class="fas fa-sync-alt"></i></button>
               </div>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-md-2"> <label for="" class="uppercasess">Jenis Pengadaan</label></div>
            <div class="col-md-4">
               <div class="formline">
                  <select name="id_jenis_pengadaan" id="id_jenis_pengadaan" class="form-control select2bs4">
                     <option value=""></option>
                     <option value=""></option>
                     <?php foreach ($get_jenis_pengadaan as $key => $value) { ?>
                        <option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
                     <?php } ?>
                  </select>
                  <button class="btn-grad101 ml-3" id="reload"><i class="fas fa-sync-alt"></i></button>
               </div>
            </div>
         </div>
         <br>
         <div>
            <button class="btn-grad101" style="width: 100px;" name="filter" id="filter2" type="button"> <img src="<?= base_url('assets/img/perahu.png') ?>" style="width: 30px;" alt=""> Filter</button>
         </div>
         <br>
         <div style="overflow-x: auto;">
            <table id="transaksi_langsung_tambah_paket" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
               <thead class="btn-grad100">
                  <tr>
                     <th>No</th>
                     <th>Kode RUP</th>
                     <th>Nama Paket</th>
                     <th>Unit</th>
                     <th>Program</th>
                     <th>Jenis Pengadaan</th>
                     <th>Metode Pemilihan</th>
                     <th>Jenis Anggaran</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>

               </tbody>
            </table>
         </div>
         <br>
         <div class="bs-callout bs-callout-warning">
            Pembuatan paket tender dimulai denga memilih dari RUP <b>Paket yang tidak terdaftar pada RUP tidak dapat ditender</b>
         </div>
         <br>
      </div>
   </div>
</div>


<!-- modal detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header btn-grad100">
            <h5 class="modal-title">Laksanakan Paket Transaksi Langsung</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <table class="table table-active table-bordered">
                     <tr>
                        <th>Kode RUP</th>
                        <th><label id="detail_kode_paket"></label></th>
                     </tr>
                     <tr>
                        <th>Nama Paket</th>
                        <th><label id="detail_nama_paket"></label></th>
                     </tr>
                     <tr>
                        <th>Unit</th>
                        <th><label id="detail_divisi"></label></th>
                     </tr>
                     <tr>
                        <th>Program</th>
                        <th><label id="detail_program"></label></th>
                     </tr>
                  </table>
               </div>
               <div class="col-md-6">
                  <table class="table table-active table-bordered">
                     <tr>
                        <th>Jenis Pangadaan</th>
                        <th><label id="detail_jenis_pengadaan"></label></th>
                     </tr>
                     <tr>
                        <th>Metode Pemilihan</th>
                        <th><label id="detail_metode_pemilihan"></label></th>
                     </tr>
                     <tr>
                        <th>Produk Dalam Negri</th>
                        <th><label id="detail_dalam_negri"></label></th>
                     </tr>
                     <tr>
                        <th>Jenis Anggaran</th>
                        <th><label id="detail_jenis_anggaran"></label></th>
                     </tr>
                  </table>
               </div>
            </div>
            <!-- get sumber dana -->
            <div class="row">
               <div class="col-md-2">
                  <label for="" style="font-weight: bold;">Sumber Dana</label>
               </div>
               <div class="col-md-10">
                  <table class="table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th>Asal Dana</th>
                           <th>HPS</th>
                        </tr>
                     </thead>
                     <tbody id="detail_sumber_dana">

                     </tbody>
                  </table>
               </div>
            </div>

            <!-- get lokasi pekerjaan -->
            <div class="row">
               <div class="col-md-2">
                  <label for="" style="font-weight: bold;">Lokasi Pekerjaan</label>
               </div>
               <div class="col-md-10">
                  <table class="table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th>Provinsi</th>
                           <th>Kabupaten</th>
                           <th>Detail Lokasi</th>
                        </tr>
                     </thead>
                     <tbody id="detail_lokasi_kerja">

                     </tbody>
                  </table>
               </div>
            </div>
            <form action="#" id="formDataBuatPaketnya">
               <input type="hidden" name="id_paket" id="buat_paket">
               <a href="#" id="btnSave" onclick="BuatPaketTransaksiLangsung()" class="btn btn-danger">Buat Paket Transaksi Langsung</a>
            </form>
         </div>
      </div>
   </div>
</div>