  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<nav aria-label="breadcrumb" class="mt-3">
  		<ol class="breadcrumb bg-primary">
  			<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Daftar Berita </a></li>
  		</ol>
  	</nav>
  	<div class="content">

  		<div style="overflow-x: auto;">
  			<button type="button" class="float-left btn btn-outline-primary mt-3 mb-3" onclick="add()">
  				<i class="fa fa-plus"></i> Buat Berita
  			</button>
  			<table id="serverside" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Nama Berita</th>
  						<th>Tanggal Dibuat</th>
  						<th>Nama Pembuat</th>
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
  				<h5 class="modal-title" id="modalTitle">Add Jadwal Pascakualifikasi</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form id="formData" enctype="multipart/form-data">
  					<input type="hidden" name="id_berita" id="id_berita">
  					<div class="form-group">
  						<label for="nama_berita"><b>Nama Berita</b></label>
  						<textarea name="nama_berita" id="nama_berita" class="form-control"></textarea>
  						<p class="nama_berita-error text-danger"></p>
  						<br>
  						<label for="file_berita"><b> File Berita</b></label>
  						<input type="file" name="file_berita" id="file_berita" class="form-control form-control-sm">
  						<p class="text-danger" id="error_file" style="display: none;"> Wajib Di Isi Filenya</p>
  					</div>
  					<div class="float-right">
  						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
  						<button type="submit" class="btn btn-success">Simpan</button>
  					</div>
  				</form>
  			</div>
  			<div class="modal-footer">

  			</div>
  		</div>
  	</div>
  </div>