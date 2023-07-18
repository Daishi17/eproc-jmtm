<div class="preloader">
   <div class="loading">
      <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
   </div>
</div>
<div class="content">
   <div class="container">
      <div class="bs-callout-info">
         <b>Petunjuk Penginputan Spesifikasi Teknis ata KAK :</b><br>
         1. Perhastikan file yang akan di upload, pastikan bahwa file tersebut adalah Kerangka Acuan Kerja atau Spesifikasi Teknis dan gambar untuk Tender ini <br>
         2. Harap jangan Unggah Dokumen Pemilihan disini<br>
         3. Klik tombol upload yang ada dibawah ini<br><br>
      </div>
      <button type="button" class=" btn btn-primary mt-3 mb-2 btn-sm" data-toggle="modal" data-target="#modalDataKak">
         Upload KAK
      </button>
      <br><br>
      <div style="padding: 10px;">
         <div style="overflow: auto;">
            <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="tbl_kak_get">
            <table id="kak_kerja_tbl" class="table table-bordered table-active">
               <thead>
                  <tr class="bg-primary text-white text-center">
                     <th>NO</th>
                     <th>Keterangan</th>
                     <th>File KAK</th>
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
<div class="modal fade" id="modalDataKak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <!-- <?= base_url('paket/add_kak') ?> -->
            <form action="#" id="form-data-kak" enctype="multipart/form-data">
               <input type="hidden" id="kerangka_kerja" name="id_paket" value="<?= $angga['id_paket'] ?>">
               <div class="form-group">
                  <input type="text" name="nama_file_kak" value="" class="form-control" placeholder="Judul">
               </div>
               <div class="form-group">
                  <input type="file" name="file_kak" value="" id="file_kak" class="form-control">
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
<div class="modal fade" id="modalDataKakEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="form-data-kak-edit" enctype="multipart/form-data">
               <input type="hidden" id="kerangka_kerja" name="id_paket" value="<?= $angga['id_paket'] ?>">
               <input type="hidden" id="id_kerangka_acuan_kerja" name="id_kerangka_acuan_kerja">
               <div class="form-group">
                  <input type="text" name="nama_file_kak" id="nama_file_kak22" class="form-control" placeholder="Judul">
               </div>
               <div class="form-group">
                  <input type="file" name="file_kak" id="image" class="form-control">
                  <span id="file_kak2"></span>
               </div>
               <div class="form-group">
                  <button class="btn btn-success" id="upload" name="upload" type="submit">Edit</button>
               </div>
            </form>

         </div>
      </div>
   </div>
</div>