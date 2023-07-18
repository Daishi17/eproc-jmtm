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
<div class="container">
   <br>
   <ol class="breadcrumb btn-grad100">
      <li><a style="text-decoration: none; color:white;" href="#">Jadwal transaksi langsung</a></li>

   </ol>

   <div class="content">
      <button type="button" class="float-right btn btn-primary mt-3 mb-2 btn-sm" onclick="add()">
         Tambah jadwal
      </button>

      <?= $this->session->flashdata('message'); ?>
      <table id="tbl_jadwal_transaksi_langsung" class="table table-striped table-bordered">
         <thead>
            <tr class="btn-grad100">
               <th width="10px">No</th>
               <th>Nama Jadwal</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>

         </tbody>
      </table>
      <br>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="formData">
               <input type="hidden" name="id_jadwal_transaksi_langsung" id="id_jadwal_transaksi_langsung">
               <div class="form-group">
                  <label for="nama_jadwal_transaksi_langsung">Nama Jadwal transaksi langsung</label>
                  <input type="text" class="form-control" name="nama_jadwal_transaksi_langsung" id="nama_jadwal_transaksi_langsung" placeholder="Nama jadwal transaksi langsung">
                  <p class="nama-jadwal-error text-danger"></p>
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