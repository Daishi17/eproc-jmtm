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
	<div class="float-right p-3">
		<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi" class="badge badge-danger navbar-badge"></span> Pesan Penjelasan </a>
		<a href="javascript:;" class="btn btn-sm btn-info" id="sudahdibaca_negosiasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_negosiasi" class="badge badge-danger navbar-badge"></span> Pesan Negosiasi </a>
		<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_prakualifikasi"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_prakualifikasi" class="badge badge-danger navbar-badge"></span> Sanggahan Prakualifikasi</a>
		<a href="javascipt:;" class="btn btn-sm btn-info" id="sudahdibaca_sanggahan_akhir"><img src="<?= base_url('assets/img/pesan.png') ?>" width="25px" alt=""> <span id="notifikasi_sangahan_akhir" class="badge badge-danger navbar-badge"></span> Sanggahan Akhir</a>
	</div>
	<nav aria-label="breadcrumb" class="mt-3">
		<ol class="breadcrumb bg-primary">
			<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Informasi Tender &raquo; Pengumuman Pemenang</a></li>
		</ol>
	</nav>
	<div id="demo"></div>
	<br>
	<br><br>
	<div class="tab-content">
		<div class="content">
			<div class="card border-primary mb-3" style="box-shadow: 2px 2px 10px 2px black;">
				<div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;"> Pesetujuan Peserta Tender
					<a href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>" class="badge badge-secondary"><i class="fas fa-arrow-left"></i> Kembali Informasi Tender</a>
				</div>
				<div class="card-body">
					<form action="<?= base_url('panitiajmtm/beranda/kirim_pengumuman_pememang/' . $paket['id_paket']) ?>" method="post">
						<div style="overflow-x:auto;">
							<table id="tender_pengumuman" class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Peserta</th>
										<th>Email</th>
										<th>Pemenang</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($id_vendor as $key => $value) { ?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= $value['username_vendor'] ?></td>

											<?php if ($value['status_vendor_baru'] == 1) { ?>
												<td><?= $value['email_vendor'] ?></td>
											<?php 	} else { ?>
												<td><?= $value['email_usaha'] ?></td>
											<?php 	} ?>
											<?php if ($value['pemenang_tender'] == 1) { ?>
												<td>
													<div class=""><i class="fa fa-star text-warning"></i></div>
												</td>
											<?php } else { ?>
												<td>
													<div class="text-danger"><i class="fa fa-times"></i></div>
												</td>
											<?php } ?>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="mt-3">
							<button type="submit" class="btn btn-success mr-3"><i class="fas fa-paper-plane"></i> Kirim Pengumuman</button>
							<a href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="id_paket" value="<?= $paket['id_paket'] ?>">
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