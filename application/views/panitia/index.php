  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Panitia Pemilihan</a></li>
  	</ol>
  	<div class="content">

  		</form>
  		<?= $this->session->flashdata('message') ?>
  		<table id="table_panitia" class="display">
  			<thead>
  				<tr>
  					<th width="10px">No</th>
  					<th>Nama Panitia</th>
  					<th>Unit</th>
  					<th>Anggota</th>
  					<th>Status</th>
  					<th>Jenis Panitia</th>
  					<th>Aksi</th>
  				</tr>
  			</thead>
  			<tbody>

  			</tbody>
  		</table>
  		<a href="<?= base_url() ?>panitia/tambahpanitia" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Panitia</a>
  	</div>
  </div>


  <!--MODAL HAPUS-->
  <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
  				<h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
  			</div>
  			<form class="form-horizontal">
  				<div class="modal-body">
  					<input type="hidden" name="kode" id="textkode" value="">
  					<div class="alert alert-warning">
  						<p>Apakah Anda yakin mau menghapus barang ini?</p>
  					</div>
  				</div>
  				<div class="modal-footer">
  					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
  					<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
  <!--END MODAL HAPUS-->