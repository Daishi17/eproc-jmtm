  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Vendor Aktif</a></li>

  	</ol>
  	<div class="content">
  		<br>
  		<div style="overflow-x: auto;">
  			<table id="serverside2" class="table table-hover text-center" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  				<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  					<tr>
  						<th>No</th>
  						<th>Username Vendor</th>
  						<th>Email Vendor</th>
  						<th>NIB</th>
  						<th>Aksi</th>
  					</tr>
  				</thead>
  				<tbody class="text-center">

  				</tbody>
  			</table>
  		</div>
  		<br>
  	</div>
  </div>

  <!-- modal detail -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="modalTitle"></h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div style="overflow-x: auto;">
  					<div class="row">
  						<div class="col-md-6">
  							<table class="table table-active table-bordered">
  								<tr>
  									<th>Username</th>
  									<th><label id="username_vendor"></label></th>
  								</tr>
  								<tr>
  									<th>NPWP</th>
  									<th><label id="npwp_usaha"></label></th>
  								</tr>
  								<tr>
  									<th>Bentuk Usaha</th>
  									<th><label id="bentuk_usaha"></label></th>
  								</tr>
  								<tr>
  									<th>Tanggal Mendaftar</th>
  									<th><label id="tanggal_mendaftar"></label></th>
  								</tr>
  								<tr>
  									<th>Tanggal Diterima</th>
  									<th><label id="tanggal_diterima"></label></th>
  								</tr>
  							</table>
  						</div>
  						<div class="col-md-6">
  							<table class="table table-active table-bordered">
  								<tr>
  									<th>Email</th>
  									<th><label id="email_vendor"></label></th>
  								</tr>
  								<tr>
  									<th>Alamat</th>
  									<th><label id="alamat_usaha"></label></th>
  								</tr>
  								<tr>
  									<th>Kode Pos</th>
  									<th><label id="kode_pos_usaha"></label></th>
  								</tr>
  								<tr>
  									<th>Provinsi</th>
  									<th><label id="provinsi"></label></th>
  								</tr>
  								<tr>
  									<th>Kabupaten/Kota</th>
  									<th><label id="kabupaten"></label></th>
  								</tr>
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>


  <!-- modal detail -->
  <div class="modal fade" id="modalBan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="modalTitle2"></h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="row">
  					<div class="col-md-12">
  						<div style="overflow-x: auto;">
  							<table class="table table-active table-bordered">
  								<tr>
  									<th>Username</th>
  									<th><label id="username_vendor2"></label></th>
  								</tr>
  								<tr>
  									<th>Nama Usaha</th>
  									<th><label id="nama_usaha2"></label></th>
  								</tr>
  								<tr>
  									<th>Bentuk Usaha</th>
  									<th><label id="bentuk_usaha2"></label></th>
  								</tr>
  								<tr>
  									<th>NIB</th>
  									<th><label id="nib"></label></th>
  								</tr>
  							</table>
  						</div>
  					</div>
  				</div>
  				<div class="row" style="margin-top: -10px;">
  					<div class="col-md-12">
  						<form action="#" action="POST" id="formData">
  							<input type="hidden" value="" id="id_vendor" name="id_vendor">
  							<div class="form-group">
  								<label for="alasan_daftar_hitam">
  									<h6>Alasan Daftar Hitam</h6>
  								</label>
  								<textarea name="alasan_daftar_hitam" id="alasan_daftar_hitam" class="form-control"></textarea>
  								<p class="alasan-daftar-hitam-error text-danger"></p>
  								<br>
  								<div class="row">
  									<div class="col-md-4">
  										<label for="masa_berlaku_daftar_hitam">
  											<h6>Masa Berlaku Sampai</h6>
  										</label>
  										<input type="date" class="form-control" name="masa_berlaku_daftar_hitam" id="masa_berlaku_daftar_hitam">
  										<p class="masa-berlaku-daftar-hitam-error text-danger"></p>
  									</div>
  								</div>
  							</div>
  							<button type="button" onclick="save()" class="btn btn-sm btn-danger float-right">Blacklist Vendor</button>
  						</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>