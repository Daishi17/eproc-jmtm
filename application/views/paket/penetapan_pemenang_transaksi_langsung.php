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
	<input type="hidden" name="id_paket" id="id_paketkusaja_penetapan" value="<?= $paket['id_paket'] ?>">
	<br>
	<?php if ($this->session->userdata('id_role') == 6) { ?>
		<ol class="breadcrumb btn-grad100" href="#">Penetapan Pemenang & Upload BA</a></li>
		</ol>
	<?php  } else { ?>
		<ol class="breadcrumb btn-grad100" href="#">Penetapan Pemenang & Upload BA</a></li>
		</ol>
	<?php } ?>
	<div class="content">
		<input type="hidden" name="id_paket" id="id_paket" value="<?= $penetapan_pemenang['id_paket'] ?>">
		<div class="card">
			<div class="card-header btn-grad100">
				Pemenang
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<thead>
								<tr>
									<th>Nama Penyedia</th>
									<th><?= $penetapan_pemenang['username_vendor'] ?></th>
								</tr>
								<?php if ($penetapan_pemenang['status_vendor_baru'] == 1) { ?>
									<tr>
										<th>Alamat Penyedia</th>
										<th><?= $penetapan_pemenang['alamat_vendor'] ?></th>
									</tr>
								<?php } else { ?>
									<tr>
										<th>Alamat Penyedia</th>
										<th><?= $penetapan_pemenang['alamat_usaha'] ?></th>
									</tr>
								<?php  } ?>
								<?php if ($penetapan_pemenang['status_vendor_baru'] == 1) { ?>
									<tr>
										<th>Email Penyedia</th>
										<th><?= $penetapan_pemenang['email_vendor'] ?></th>
									</tr>
								<?php } else { ?>
									<tr>
										<th>Email Penyedia</th>
										<th><?= $penetapan_pemenang['email_usaha'] ?></th>
									</tr>
								<?php  } ?>
								<?php if ($penetapan_pemenang['status_vendor_baru'] == 1) { ?>
									<tr>
										<th>No.Tlp Penyedia</th>
										<th><?= $penetapan_pemenang['telpon_vendor'] ?></th>
									</tr>
								<?php } else { ?>
									<tr>
										<th>No.Tlp Penyedia</th>
										<th><?= $penetapan_pemenang['telpon_usaha'] ?></th>
									</tr>
								<?php  } ?>
								<?php if ($penetapan_pemenang['status_vendor_baru'] == 1) { ?>
									<tr>
										<th>No Ktp Penyedia</th>
										<th><?= $penetapan_pemenang['no_ktp_vendor'] ?></th>
									</tr>
								<?php } else { ?>
									<tr>
										<th>NPWP Penyedia</th>
										<th><?= $penetapan_pemenang['npwp_usaha'] ?></th>
									</tr>
								<?php  } ?>
							</thead>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
							<thead>
								<tr>
									<th>Nama Paket</th>
									<th><?= $penetapan_pemenang['nama_paket'] ?></th>
								</tr>
								<tr>
									<th>Nama Pelaksana</th>
									<th><?= $penetapan_pemenang['nama_pelaksana'] ?></th>
								</tr>
								<tr>
									<th>Manager Pelaksana</th>
									<th><?= $penetapan_pemenang['nama_manager_penyetuju'] ?></th>
								</tr>
								<tr>
									<th>Metode_pemilihan</th>
									<th><?= $penetapan_pemenang['nama_metode_pemilihan'] ?></th>
								</tr>
								<tr>
									<th>Divisi</th>
									<th><?= $penetapan_pemenang['nama_unit_kerja'] ?></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div><br>
		<div class="card">
			<div class="card-header btn-grad6">Kirim File Surat Penetapan Pemenang & Upload BA</div>
			<div class="card-body">
				<center>
					<form id="form_penetapan_pemenang" enctype="multipart/form-data">
						<?php if ($penetapan_pemenang['status_vendor_baru'] == 1) { ?>
							<input type="hidden" name="kirim_email" value="<?= $penetapan_pemenang['email_vendor'] ?>">
						<?php  } else { ?>
							<input type="hidden" name="kirim_email" value="<?= $penetapan_pemenang['email_usaha'] ?>">
						<?php } ?>
						<input type="hidden" name="id_vendor" value="<?= $penetapan_pemenang['id_vendor'] ?>">
						<div class="input-group col-md-6">
							<div class="input-group-append">
								<button class="input-group-text attach_btn btn-grad6" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_surat_penetapan_pemenang').click();"><i class="fas fa-paperclip"></i></button>
								<input type="file" style="display:none;" id="file_surat_penetapan_pemenang" class="file_surat_penetapan_pemenang" name="file_surat_penetapan_pemenang" />
							</div>
							<input type="text" name="nama_surat_penetapan_pemenang" id="nama_surat_penetapan_pemenang" class="form-control form-control-sm" placeholder="Nama File....">
							<div class="input-group-append">
								<button type="submit" id="upload_negosiasi" name="upload" class="input-group-text  btn-grad6"><i class="fas fa-upload"></i></button>
							</div>
						</div>
					</form>
					<br>
					<div style="display: none;" id="error_file_negosiasi" class="alert alert-danger" role="alert">
						ANDA BELUM MENGISI FILE !!!
					</div>
					<div style="display: none;" id="error_nama_negosiasi" class="alert alert-danger" role="alert">
						Nama File Wajib Di Isi
					</div>
				</center>
				<br>
				<center>
					<div class="form-group col-md-6" id="process_negosiasi" style="display:none;">
						<small for="" style="display:none;" id="sedang_dikirim_negosisasi">Sedang Mengirim....</small>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
							</div>
						</div>
					</div>
				</center>
				<table class="table table-hover" id="tbl_penetapan_pemenang">
					<thead>
						<tr class="btn-grad6">
							<th>No</th>
							<th>Nama Surat</th>
							<th>File Surat Penetapan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
		<br>
		<center>
			<?php if ($this->session->userdata('id_role') == 6) { ?>

				<a style="width: 200px;" class="btn btn-grad100" href="<?= base_url('paket/lihat_transaksi_langsung_berjalan/' . $paket['id_paket']) ?>">Kembali</a>
			<?php } else { ?>
				<?php if ($paket['id_metode_pemilihan'] == 10) { ?>
					<a href="<?= base_url('paket/lihat_transaksi_langsung_berjalan/' . $paket['id_paket']) ?>" style="width: 200px;" class="btn btn-grad100">Kembali</a>
				<?php   } else if ($paket['id_metode_pemilihan'] == 9) { ?>
					<a href="<?= base_url('penetapanlangsung/informasi_paket/' . $paket['id_paket']) ?>" style="width: 200px;" class="btn btn-grad100">Kembali</a>
				<?php   } else { ?>
					<a href="<?= base_url('paket/edit/' . $paket['id_paket']) ?>" style="width: 200px;" class="btn btn-grad100">Kembali</a>
				<?php } ?>
			<?php } ?>
		</center>
	</div>
</div>