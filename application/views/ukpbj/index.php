  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Daftar UKPBJ</a></li>

  	</ol>
  	<div class="content">

  		<table id="table_ukpbj" class="display">
  			<thead>
  				<tr>
  					<th>ID</th>
  					<th>Nama</th>
  					<th>Alamat</th>
  					<th>Telepon</th>
  					<th>Fax</th>
  					<th>Tanggal Daftar</th>
  				</tr>
  			</thead>
  			<tbody>
  			</tbody>
  		</table>
  		<br>
  		<a href="<?= base_url('ukpbj/tambah_ukpbj') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
  	</div>
  </div>