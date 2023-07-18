  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <?php if ($this->session->userdata('id_role') == 6) { ?>
  	<div class="container">
  		<br>
  		<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  			<li><a style="text-decoration: none; color:white;" href="#">Beranda</a></li>
  		</ol>
  		<div class="content">
  			<nav>
  				<div class="nav nav-tabs" id="nav-tab" role="tablist">
  					<a class="nav-item nav-link bg-info text-white" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tender</a>
  					<a class="nav-item nav-link  bg-danger text-white" id="nav-penunjukan-tab" data-toggle="tab" href="#nav-penunjukan" role="tab" aria-controls="nav-penunjukan" aria-selected="false">Penunjukan Langsung</a>
  					<a class="nav-item nav-link  bg-warning text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Transaksi Langsung</a>
  					<a class="nav-item nav-link  bg-secondary text-white" id="nav-penetapan-tab" data-toggle="tab" href="#nav-penetapan" role="tab" aria-controls="nav-penetapan" aria-selected="false">Penetapan Langsung</a>
  				</div>
  			</nav>
  			<div class="tab-content" id="nav-tabContent">
  				<!-- tender umum -->
  				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  				<!-- transaksi langsung -->
  				<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> <br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_transaksi_langsung" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  				<!-- Penunjukan langsung -->
  				<div class="tab-pane fade" id="nav-penunjukan" role="tabpanel" aria-labelledby="nav-penunjukan-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_beranda_paket_penunjukan" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>penujukan</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  				<!-- penetapan langsung -->
  				<div class="tab-pane fade" id="nav-penetapan" role="tabpanel" aria-labelledby="nav-penetapan-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_beranda_paket_penetapan" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>penetapan</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  			</div>

  		</div>
  	</div>
  <?php } else { ?>
  	<div class="container">
  		<br>
  		<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  			<li><a style="text-decoration: none; color:white;" href="#">Beranda</a></li>
  		</ol>
  		<div class="content">
  			<nav>
  				<div class="nav nav-tabs" id="nav-tab" role="tablist">
  					<a class="nav-item nav-link bg-info text-white" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tender</a>
  					<a class="nav-item nav-link  bg-danger text-white" id="nav-penunjukan-tab" data-toggle="tab" href="#nav-penunjukan" role="tab" aria-controls="nav-penunjukan" aria-selected="false">Penunjukan Langsung</a>
  					<a class="nav-item nav-link  bg-warning text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Transaksi Langsung</a>
  					<a class="nav-item nav-link  bg-secondary text-white" id="nav-penetapan-tab" data-toggle="tab" href="#nav-penetapan" role="tab" aria-controls="nav-penetapan" aria-selected="false">Penetapan Langsung</a>
  					<a class="nav-item nav-link  bg-success text-white" id="nav-penetapan-tab" data-toggle="tab" href="#nav-pemilihanlangsung" role="tab" aria-controls="nav-penetapan" aria-selected="false">Tender Terbatas (Pemilihan Langsung)</a>
  				</div>
  			</nav>
  			<div class="tab-content" id="nav-tabContent">
  				<!-- tender umum -->
  				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  				<!-- transaksi langsung -->
  				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> <br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_transaksi_langsung" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  				<!-- Penunjukan langsung -->
  				<div class="tab-pane fade" id="nav-penunjukan" role="tabpanel" aria-labelledby="nav-penunjukan-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_beranda_paket_penunjukan" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  				<!-- penetapan langsung -->
  				<div class="tab-pane fade" id="nav-penetapan" role="tabpanel" aria-labelledby="nav-penetapan-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_beranda_paket_penetapan" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>

  				<!-- Pemilihan langsung -->
  				<div class="tab-pane fade" id="nav-pemilihanlangsung" role="tabpanel" aria-labelledby="nav-penetapan-tab">
  					<br>
  					<div style="overflow-x: auto;">
  						<table id="serverside_beranda_paket_pemilihanlangsung" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
  								<tr>
  									<th>No</th>
  									<th>Kode Tender</th>
  									<th>Nama Paket</th>
  									<th>Metode Pengadaan</th>
  									<th>Status</th>
  									<th>Tanggal Buat Paket</th>
  									<th>Unit</th>
  								</tr>
  							</thead>
  							<tbody class="text-center">

  							</tbody>
  						</table>
  					</div>
  					<br>
  				</div>
  			</div>

  		</div>
  	</div>
  <?php } ?>

  <div class="modal fade" id="modal_alasan_batal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h6 class="modal-title">Alasan Pembatalan Paket <label for="" id="nm_paket"></label></h6>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<div class="container-fluid">
  					<h6 id="alasan_batal"></h6>
<h6 id="alasan_tender_batal_ku"></h6>


  				</div>
  			</div>
  		</div>
  	</div>
  </div>
