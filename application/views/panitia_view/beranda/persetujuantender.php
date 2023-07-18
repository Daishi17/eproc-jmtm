<style>
	.contacts {
		list-style: none;
		padding: 0;
	}

	.user_info {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}

	.online_icon {
		position: absolute;
		height: 15px;
		width: 15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border: 1.5px solid white;
	}

	.contacts li {
		width: 100% !important;
		padding: 5px 10px;
		margin-bottom: 15px !important;
	}

	.img_cont {
		position: relative;
		height: 70px;
		width: 70px;
	}

	.active-angga {
		background: rgb(7, 6, 18);
		background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
	}

	.user_img {
		height: 70px;
		width: 70px;
		border: 1.5px solid #f5f6fa;

	}

	.contacts_body {
		padding: 0.75rem 0 !important;
		overflow-y: auto;
		white-space: nowrap;
	}
</style>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div id="main" class="container">
	<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
	<nav aria-label="breadcrumb" class="mt-3">
		<ol class="breadcrumb bg-primary">
			<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender</a></li>
		</ol>
		<div class="float-right">
			<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
			<a href="javascipt:;" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_liha_chat_sangahan"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan" class="badge badge-danger navbar-badge">3</span> Pesan Sangahan</a>
		</div>
	</nav>
	<div id="demo"></div>
	<br>
	<div class="tab-content">
		<div class="content">
			<div class="card border-primary mb-3">
				<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;"> Pesetujuan Peserta Tender
					<a href="<?= base_url('panitiajmtm/beranda/evaluasitender/' . $paket['id_paket']) ?>" class="badge badge-secondary"><i class="fas fa-arrow-left"></i> Kembali Ke Hasil Tender</a>
				</div>
				<div class="card-body">
					<form action="">
						<div style="overflow-x:auto;">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Peserta</th>
										<th>Harga Terkoreksi (Rp)</th>
										<th>Urutan</th>
										<th>Pemenang</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($vendor as $key => $value) { ?>
										<tr>
											<td><?= $i++ ?></td>
											<td><a href="#"><?= $value['username_vendor'] ?></a></td>
											<td><label for="">Rp 2.310.000.000,00</label></td>
											<td>1</td>
											<td><i class="fas fa-star text-warning"></i></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div>
							<label for=""><b> Alasan Tidak Setuju </b></label>
							<textarea class="form-control"></textarea>
						</div>
						<div class="mt-3">
							<a href="" class="btn btn-success mr-3">Setuju</a>
							<a href="" class="btn btn-danger">Tidak Setuju</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Chat Lihat -->
<div class="modal fade" id="modal_liha_chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h5 class="modal-title" id="modalTitle">Pesan Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="pesan_kosong"></p>
				<div class="card-header bg-primary text-white p-2">
					<label for=""> PESAN DARI PENYEDIA</label>
				</div>
				<div class="card contacts_body" style=" height: 500px;
      border-radius: 15px !important;
      background: rgb(7, 6, 18);
      background: linear-gradient(90deg, rgba(7, 6, 18, 1) 0%, rgba(42, 41, 136, 1) 100%);">
					<ui class="contacts" id="yangAktif">
					</ui>
				</div>
			</div>
			<div class="modal-footer">
				<div class="bs-callout-info col-md-12">
					Balas Pesan Dengan Mengklik Pesan Baru<br>
				</div>
			</div>
		</div>
	</div>
</div>