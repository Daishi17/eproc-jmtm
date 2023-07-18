<div class="preloader">
   <div class="loading">
      <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
   </div>
</div>
<div class="content">
   <div class="container">
      <div class="bs-callout-info">
         <b>Petunjuk Penginputan Spesifikasi Informasi Lainya:</b><br>
         1. Harap jangan Unggah Dokumen Pemilihan disini<br>
         1. Harap Unggah Dokumen PDF<br>
         2. Klik tombol upload yang ada dibawah ini<br><br>
      </div>
      <button type="button" class=" btn btn-primary mt-3 mb-2 btn-sm" data-toggle="modal" data-target="#modalData_informasi_lainya">
         Upload Informasi Lainya
      </button>
      <br><br>
      <div style="padding: 10px;">
         <div style="overflow: auto;">
            <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="tbl_informasi_lainya_get">
            <table id="informasi_lainya_tbl" class="table table-bordered table-active">
               <thead>
                  <tr class="bg-primary text-white text-center">
                     <th>NO</th>
                     <th>Keterangan</th>
                     <th>File Informasi Lainya</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody class="text-center">
               </tbody>
            </table>
         </div>
      </div> <br><br><br>
      <div class="row">
         <a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData_informasi_lainya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="form_data_informasi_lainya_add" enctype="multipart/form-data">
               <input type="hidden" id="informasi_lainya_id_paket12" name="id_paket" value="<?= $angga['id_paket'] ?>">
               <div class="form-group">
                  <input type="text" name="nama_file_informasi_lainya" value="" class="form-control" placeholder="Judul">
               </div>
               <div class="form-group">
                  <input type="file" name="file_informasi_lainya" value="" id="file_informasi_lainya_id" class="form-control">
               </div>
               <div class="form-group">
                  <button class="btn btn-success" id="upload" name="upload" type="submit">Upload</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData_informasi_lainya_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="form_data_informasi_lainya_edit" enctype="multipart/form-data">
               <input type="hidden" id="informasi_lainya_id_paket2" name="id_paket" value="<?= $angga['id_paket'] ?>">
               <input type="hidden" id="informasi_lainya2" name="id_informasi_lainya">
               <div class="form-group">
                  <input type="text" name="nama_file_informasi_lainya" id="nama_file_informasi_lainya2" class="form-control" placeholder="Judul">
               </div>
               <div class="form-group">
                  <input type="file" name="file_informasi_lainya" id="image" class="form-control">
                  <span id="file_informasi_lainya2"></span>
               </div>
               <div class="form-group">
                  <button class="btn btn-success" id="upload" name="upload" type="submit">Edit</button>
               </div>
            </form>

         </div>
      </div>
   </div>
</div>