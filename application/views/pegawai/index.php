  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Daftar Pegawai</a></li>

  	</ol>
  	<div class="content">
		
		<a href="<?= base_url('pegawai/tambahpegawai') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Pegawai</a>
		<br>
		<br>
  		<?= $this->session->flashdata('message'); ?>
  		<table id="table_pegawai" class="display ">
  			<thead>
  				<tr>
  					<th style="width: 10px;">No</th>
  					<th>Nama</th>
  					<th>NIP</th>
  					<th>User ID</th>
  					<th>Group</th>
  					<th>Status Login</th>
  					<th>Waktu Terakhir Login</th>
  					<th>Aksi</th>
  				</tr>
  			</thead>
  			<tbody>


  			</tbody>
  		</table>
  		<br>
  		
  	</div>
  </div>

  <!-- Modal -->


  <div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content">
  			<div class="modal-header" style="background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important; color:white">
  				<h5 class="modal-title" id="modalTitle">Detail Pegawai</h5>
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
  							<tr>
  								<th>Status</th>
  								<td><label id="status"></label></td>
  							</tr>
  							<tr>
  								<th>Role</th>
  								<td><label id="role"></label></td>
  							</tr>
  							<tr>
  								<th>No. SK</th>
  								<td><label id="no_sk"></label></td>
  							</tr>
  							<tr>
  								<th>Masa Berlaku SK</th>
  								<td><label id="masa_berlaku_sk"></label></td>
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