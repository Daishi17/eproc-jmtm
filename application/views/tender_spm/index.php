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

	<div style="padding: 10px;">
		<input type="hidden" value="" id="rincian_hps">
		<div class="card">
			<div class="card-header btn-grad8 text-center">KONFIRMASI TENDER SPM</div>
			<div class="card-body">
				<!-- tbl_rincian_hps_via_pdf -->
				<div style="overflow-x: auto;">
					<table id="tbl_beranda_tender_terbatas" class="table" style="font-size: 11px;">
						<thead class="btn-grad8">
							<tr>
								<th>NO</th>
								<th>Kode Tender</th>
								<th>Nama Tender</th>
								<th>Nama Jenis Pengadaan</th>
								<th>Metode Pemilihan</th>
								<th>Nama Panitia</th>
								<th>Status Konfirmasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>