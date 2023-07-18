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
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div class="container">
	<br>
	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
		<li><a style="text-decoration: none; color:white;" href="#">Paket Penetapan Langsung</a></li>

	</ol>
	<div class="content">
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">

				<a class="nav-item nav-link  bg-danger text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Penetapan Langsung</a>
			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<br>
				<!-- <div class="col-md-2">
						<a href="<?= base_url('paket/tambah_transaksi_langsung') ?>" style="width:200px" class="btn btn-danger btn-sm mt-1 mb-3">
							<img src="<?= base_url('assets/img/dokumen.png') ?>" style="width: 30px;" alt="">Buat Paket
						</a>
					</div> -->
				<div style="overflow-x: auto;">
				    <!--<label><?= $this->session->userdata('id_panitia')?></label>-->
					<table id="serverside_transaksi_langsung" class="table table-hover">
						<thead class="btn-grad100">
							<tr>
								<th>No</th>
								<th>Nama Paket</th>
								<th>Kode Tender</th>
								<th>Metode Pengadaan</th>
								<th>Jenis Pengadaan</th>
								<th>Unit</th>
								<th>Program Paket</th>
								<th>Jenis Anggaran</th>
								<th>Lihat Paket</th>
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