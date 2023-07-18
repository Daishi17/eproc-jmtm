<?php
$this->role_login->cek_login();
?>
<div class="preloader">
   <div class="loading">
      <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
   </div>
</div>
<div class="container">
   <br>
   <ol class="breadcrumb" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
      <li><a style="text-decoration: none; color:black;" href="#">Data Manager</a></li>

   </ol>

   <div class="content">
      <form action="#" method="POST" id="formData" class="float-right">
         <a href="<?= base_url('manager/tambah_manager') ?>" style="width:200px" class="btn btn-primary btn-sm mt-1 mb-3"> <i class="fas fa fa-user"></i> Tambah Manager
         </a>
      </form>
      <br><br>
      <br>

      <?= $this->session->flashdata('message'); ?>
      <!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
      <div style="overflow: auto;">
         <table id="serverside" class="table table-striped table-bordered">
            <thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
               <tr>
                  <th>No</th>
                  <th>Nama Manager</th>
                  <th>Nip</th>
                  <th>Unit Manager</th>
                  <th>Alamat Manager</th>
                  <th>Nomor Telepone</th>
                  <th>Tanggal Daftar</th>
                  <th>Nomor Sk Manager</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>

            </tbody>
         </table>
      </div>
      <br>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Unit Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="formData">
               <input type="hidden" name="idmanager" id="idmanager">
               <div class="form-group">
                  <label for="nama_Manager">Nama Manager</label>
                  <input type="text" class="form-control" name="nama_Manager" id="nama_Manager" placeholder="Nama Manager">
                  <p class="nama_Manager-error text-danger"></p>
                  <label for="id_area">Area</label>
                  <select name="id_area" id="id_area">
                     <option value="">area 1</option>
                     <option value="">area 2</option>
                  </select>
                  <p class="id_area-error text-danger"></p>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
         </div>
      </div>
   </div>
</div>


<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header" style="background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important; color:white">
            <h5 class="modal-title" id="modalTitle">Detail Manager</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <table class="table table-bordered">
                     <tr>
                        <th width="250px">Nama Pegawai</th>
                        <td><label id="nama_pegawai"></label></td>
                     </tr>
                     <tr>
                        <th>NIP</th>
                        <td><label id="nip"></label></td>
                     </tr>
                     <tr>
                        <th>Username</th>
                        <td><label id="username"></label></td>
                     </tr>
                     <tr>
                        <th>Alamat</th>
                        <td><label id="alamat"></label></td>
                     </tr>
                     <tr>
                        <th>Telepon</th>
                        <td><label id="telepon"></label></td>
                     </tr>
                     <tr>
                        <th>Email</th>
                        <td><label id="email"></label></td>
                     </tr>
                  </table>
               </div>
               <div class="col-md-6">
                  <table class="table table-bordered">
                     <tr>
                        <th>Unit</th>
                        <td><label id="jabatan"></label></td>
                     </tr>
                  </table>

               </div>
            </div>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
         </div>
      </div>
   </div>
</div>