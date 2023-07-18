<div id="main" class="container">
	<nav aria-label="breadcrumb" class="mt-3">
		<ol class="breadcrumb bg-primary">
			<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender</a></li>
		</ol>
	</nav>
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="<?= base_url('panitiajmtm/beranda/informasitender') ?>"">Informasi Tender</a>
			</li>
			<li class=" nav-item">
				<a class="nav-link active" href="<?= base_url('panitiajmtm/beranda/menu_chat') ?>">Pertanyaan</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="<?= base_url('panitiajmtm/beranda/penawaranpesertatender') ?>">Penawaran Peserta</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/evaluasitender') ?>">Evaluasi</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Reverse Auction</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active " href="<?= base_url('panitiajmtm/beranda/sanggahantender') ?>">Sangahan</a>
		</li>
	</ul>
	<div class="tab-content p-2 card">
		<!-- tender -->
		<div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
			<div class="content">
				<div class="container-fluid">
					<div style="overflow-x:auto">
						<table class="table table-striped table-bordered">
							<tbody>
								<tr>
									<th>Kode Tender</th>
									<td>16340 <span class="badge badge-info">Sesi 14</span></td>
								</tr>
								<tr>
									<th>Nama Tender</th>
									<div>
										<td>
											<b>
												Belanja Bahan - Bahan Kimia
											</b>
										</td>
									</div>
								</tr>
								<tr>
									<div>
										<th>Metode Pemilihan </th>
									</div>
									<td>
										<label for="">Tender</label>
									</td>
								</tr>
								<tr>
									<th>Nilai Minimum</th>
									<td>Rp. 130.000.000</td>
								</tr>
								<tr>
									<th>Waktu</th>
									<td>19 Maret 2021 00:00 s/d 19 April 2021 23:50 <a href="" style="color: white;" data-toggle="modal" data-target="#ubahwaktu" class="badge badge-secondary">Ubah</a></td>
								</tr>
								<tr id="pembukaan">
									<th>Pembukaan</th>
									<td> <a href="" id="lihat_pembukaan" class="btn btn-success"><i class="fas fa-save"></i> Pembukaan Hasil Reverse Action</a></td>
								</tr>
								<tr id="hasil_akhir" style="display: none;">
									<th>Hasil Akhir</th>
									<td>
										<table class="table">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Peserta</th>
													<th>Penawaran</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>REKANAN 25</td>
													<td>Rp.140.000.000</td>
													<td></td>
												</tr>
												<tr>
													<td>2</td>
													<td>REKANAN 26</td>
													<td>Rp.130.000.000</td>
													<td>Penawaran Terendah</td>
												</tr>
											</tbody>
										</table>
										<a href="<?= base_url('panitiajmtm/beranda/reverseauctiontender') ?>" style="color: white;" class="btn btn-info">Kembali</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ubahwaktu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="color: white;">
				<h5 class="modal-title" id="exampleModalLabel">Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="col-auto">
						<label for=""><b> Waktu </b></label>
						<div class="input-group mb-2">
							<input type="text" class="form-control" id="inlineFormInputGroup">
							<div class="input-group-prepend">
								<div class="input-group-text">S/D</div>
							</div>
							<input type="text" class="form-control" id="inlineFormInputGroup">
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa fa-save"></i> Ubah Waktu</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa fa-undo"></i> Batal</button>
			</div>
			</form>
		</div>
	</div>
</div>
