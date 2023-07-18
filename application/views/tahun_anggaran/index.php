  <div class="preloader">
     <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
     </div>
  </div>
  <div class="container">
     <br>
     <ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
        <li><a style="text-decoration: none; color:white;" href="#">Tahun Anggaran</a></li>

     </ol>

     <div class="content">
        <button type="button" class="float-right btn btn-primary mt-3 mb-2 btn-sm" onclick="add()">
           Tambah Data
        </button>

        <?= $this->session->flashdata('message'); ?>
        <!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
        <table id="serverside" class="table table-striped table-bordered">
           <thead>
              <tr>
                 <th>No</th>
                 <th>Tahun Anggaran</th>
                 <th>Status</th>
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
              <h5 class="modal-title" id="modalTitle">Tahun Anggaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
              </button>
           </div>
           <div class="modal-body">
              <form action="#" id="formData">
                 <input type="hidden" name="id_tahun_anggaran" id="id_tahun_anggaran">
                 <div class="form-group">
                    <label for="nama_tahun_anggaran">Tahun Anggaran</label>
                    <input type="text" class="form-control" name="nama_tahun_anggaran" id="nama_tahun_anggaran" placeholder="Tahun Anggaran">
                    <p class="nama_tahun_anggaran-error"></p>
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