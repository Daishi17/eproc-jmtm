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
	<?php if ($this->session->userdata('id_role') == 6) { ?>
		<div class="bs-callout btn-grad9">
			<b>Rincian Hps</b><br>
		</div>
	<?php	} else { ?>
		<?php if ($this->session->userdata('id_metode_pemilihan') == 10) { ?>
			<div class="bs-callout btn-grad9">
				<b>Petunjuk pengisian rincian HPS menggunakan template Excel:</b><br>
				1. Jangan mengubah nama kolom, menghapus kolom atau menambah kolom.<br>
				2. Jangan mengubah nama sheet.<br>
				3. Gunakan tanda 'koma' sebagai pemisah desimal.<br><br>
			</div>
		<?php	} else { ?>
			<div class="bs-callout btn-grad6">
				<b>Petunjuk pengisian rincian HPS menggunakan template Excel:</b><br>
				1. Jangan mengubah nama kolom, menghapus kolom atau menambah kolom.<br>
				2. Jangan mengubah nama sheet.<br>
				3. Gunakan tanda 'koma' sebagai pemisah desimal.<br><br>
			</div>
		<?php } ?>
	<?php } ?>

	<br>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" style="width: 400px;" id="sudah_di_buat_hps_pdf">
			<a class="nav-link btn-grad100 text-white" id="hpspdf-tab" data-toggle="tab" href="#hpspdf" role="tab" aria-controls="hpspdf" aria-selected="true">RINCIAN HPS VIA PDF</a>
		</li>
		<li class="nav-item  ml-3" style="width: 400px;" id="sudah_di_buat_hps_mamual">
			<a class="nav-link btn-grad text-white" id="hps_manual-tab" data-toggle="tab" href="#hps_manual" role="tab" aria-controls="hps_manual" aria-selected="false">RINCIAN HPS MANUAL</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane" id="hpspdf" role="tabpanel" aria-labelledby="hpspdf-tab">
			<div style="padding: 10px;">
				<input type="hidden" value="<?= $angga['id_paket'] ?>" id="rincian_hps">
				<br>
				<?php if ($this->session->userdata('id_role') == 6 || $angga['status_persetujuan_manager'] == 3 && 4) { ?>
					<div class="card">
						<div class="card-header btn-grad100">Rincian Hps PDF</div>
						<div class="card-body">
							<center>
								<table class="table table-hover" id="tbl_rincian_hps_via_pdf">
									<thead>
										<tr class="btn-grad100">
											<th>No</th>
											<th>Nama Dokumen</th>
											<th>File</th>
											<th>Total HPS</th>
											<?php if ($this->session->userdata('id_role') == 6 || $angga['status_persetujuan_manager'] == 3 && 4) { ?>

											<?php	} else { ?>
												<th>Action</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>

								<?php if ($this->session->userdata('id_role') == 2) { ?>
									<a href="<?= base_url('paket/edit_transaksi_langsung/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
								<?php	} else { ?>
									<a href="<?= base_url('paket/detail_paket/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
								<?php } ?>
						</div>
					</div>

				<?php } else { ?>
					<div class="card">
						<div class="card-header btn-grad100 text-center">Rincian Hps PDF</div>
						<div class="card-body">
							<form class="form-inline">
								<h6 for="">TOTAL PAGU : </h6>
								<input type="text" class="form-control form-control-sm col-md-2 mb-2 ml-2 mt-2" disabled value="<?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?>">
							</form>
							<br>
							<center>
								<div id="sudah_di_buat_hps_pdf_form">
									<form id="form_file_rincian_hps_pdf" enctype="multipart/form-data">
										<div class="input-group col-md-6">
											<div class="input-group-append">
												<button class="input-group-text attach_btn btn-grad100" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
												<input type="file" accept="application/pdf" style="display:none;" id="file" class="file_rincian_hps_pdf" name="file_rincian_hps_pdf" />
											</div>
											<input type="text" name="nama_rincian_hps_pdf" class="form-control form-control-sm" placeholder="Nama File....">
											<input type="text" name="total_rincian_hps_pdf" id="total_rincian_hps_pdf" class="form-control form-control-sm" placeholder="Total Hps....">
											<div class="input-group-append">
												<button type="submit" id="upload_manual" name="upload" class="input-group-text  btn-grad100"><i class="fas fa-upload"></i></button>
											</div>
										</div>
										<input type="text" disabled class=" form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_pdf">
									</form>
								</div>
								<br>
								<div style="display: none;" id="error_file" class="alert alert-danger" role="alert">
									ANDA BELUM MENGISI FILE !!!
								</div>
								<div style="display: none;" id="error_total_hps_pdf" class="alert alert-danger" role="alert">
									Total HPS Wajib Di Isi
								</div>
							</center>
							<br>
							<center>
								<div class="form-group col-md-6" id="process_manual" style="display:none;">
									<small for="" style="display:none;" id="sedang_dikirim_manual">Sedang Mengupload....</small>
									<div class="progress">
										<div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
										</div>
									</div>
								</div>
							</center>
							<table class="table table-hover" id="tbl_rincian_hps_via_pdf">
								<thead>
									<tr class="btn-grad100">
										<th>No</th>
										<th>Nama Dokumen</th>
										<th>File</th>
										<th>Total HPS</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
							<?php if ($angga['id_metode_pemilihan'] == 9) { ?>
								<a href="<?= base_url('penetapanlangsung/detailpaket/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
							<?php	} else { ?>
								<?php if ($angga['id_metode_pemilihan'] == 10) { ?>
									<a href="<?= base_url('paket/edit_transaksi_langsung/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
								<?php	} else { ?>
									<?php if ($this->session->userdata('id_role') == 1) { ?>
										<a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
									<?php } else if ($this->session->userdata('id_role') == 2) { ?>
										<a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
									<?php } else { ?>
										<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
									<?php } ?>
								<?php } ?>
							<?php	} ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="tab-pane" id="hps_manual" role="tabpanel" aria-labelledby="hps_manual-tab">
			<br>
			<div style="padding: 10px;">
				<div class="card">
					<div class="card-header btn-grad">Rincian hps manual</div>
					<div class="card-body">
						<form class="form-inline">
							<h6 for="">TOTAL PAGU : </h6>
							<input type="text" class="form-control form-control-sm col-md-2 mb-2 ml-2 mt-2" disabled value="<?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?>">
						</form>
						<br>
						<!-- uplaod excel -->
						<?php if ($this->session->userdata('id_role') == 6 || $angga['status_persetujuan_manager'] == 3 && 4) { ?>

						<?php	} else { ?>
							<!--<div class="col-md-7 mt-3">-->
							<!--	<?= form_open_multipart('paket/uploaddata') ?>-->
							<!--	<div class="input-group">-->
							<!--		<input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>">-->
							<!--		<input type="file" accept="application/pdf" class="form-control form-control-sm" id="importexcelhps" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcelhps" aria-label="Upload">-->
							<!--		<button class="btn btn-sm btn-grad8" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/excel.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>-->
							<!--		<a href="<?= base_url('assets/TEMPLATE_RINCIAN_HPS.xlsx') ?>" class="btn btn-grad8 btn-sm ml-3"><img src="<?= base_url('assets/img/excel.png') ?>" style="width: 20px;" alt=""> DOWNLOAD TEMPLATE</a>-->
							<!--	</div>-->
							<!--</div>-->
							<!--<?= form_close(); ?>-->
							<button type="button" class="float-right btn btn-grad col-md-4 mt-3 mb-2" onclick="add_rincian_hps()">
								<i class="fas fa-file-invoice-dollar"></i> Isi Hps
							</button>
							<br>
							<br><br>
							<br>
							<?= $this->session->flashdata('pesan'); ?>
							<br>
						<?php } ?>
						<div style="overflow: auto;">
							<table id="rincian_hps_tbl" class="table table-hover table-bordered">
								<thead>
									<tr class="btn-grad">
										<th>NO</th>
										<th>Jenis Barang/Jasa</th>
										<th>Jumlah Satuan</th>
										<th>Vol</th>
										<th>Harga Satuan</th>
										<th>Total Satuan*Harga</th>
										<th>Pajak (%)</th>
										<th>Total Setelah (%)</th>
										<th>Keterangan</th>
										<?php if ($this->session->userdata('id_role') == 6 || $angga['status_persetujuan_manager'] == 3 && 4) { ?>

										<?php	} else { ?>
											<th>Action</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody class="text-center">
								</tbody>
							</table>
						</div>
						<br><br>
						<?php $total = 0;
						foreach ($total_rincian_hps as $key => $value) { ?>
							<?php
							$total +=  $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
							?>
						<?php } ?>
						<!-- jika nilai lebih besar dari nilai Pagu Gak bisa -->
						<?php if ($total > $total_hps['hps']) { ?>
							<div class="alert alert-warning float-right" role="alert">
								<label for=""> Nilai Rincian Hps Tidak Boleh Lebih Dari Nilai Pagu Paket Dan Harus HPS Harus Sama Dengan Nilai Pagu!!</label>
								<br>
								<label class="text-danger" for="">Klik Tombol Refresh Untuk Update HPS</label>
								<br>
								<form class="form-inline float-right was-validated">
									<label for=""> TOTAL RINCIAN HPS</label>
									<input type="text" class="form-control is-invalid form-control-sm mb-2 ml-2 mt-2" id="validationServer03" disabled value="<?= "Rp " . number_format($total, 2, ',', '.') ?>">
									<a href="" class="btn btn-primary btn-sm ml-2"><i class="fas fa-sync-alt"></i></a>
								</form>
							</div>
						<?php  } else { ?>
							<div class="alert alert-success float-right" role="alert">
								<label for="">Klik Tombol Refresh Untuk Update HPS</label>
								<br>
								<form class="form-inline float-right">
									<h6 for="">TOTAL RINCIAN HPS : </h6>
									<input type="text" class="form-control form-control-sm col-md-5 mb-2 ml-2 mt-2" disabled value="<?= "Rp " . number_format($total, 2, ',', '.') ?>">
									<a href="" class="btn btn-primary btn-sm ml-2"><i class="fas fa-sync-alt"></i></a>
								</form>
							</div>
						<?php   } ?>
						<br>
						<br>
						<br>
						<?php if ($this->session->userdata('id_role') == 6) { ?>
							<div class="row">
								<a href="<?= base_url('paket/detail_paket/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
							</div>
						<?php	} else { ?>
							<?php if ($angga['id_metode_pemilihan'] == 10) { ?>
								<?php if ($total > $total_hps['hps']) { ?>
									<div class="row">
										<button disabled class="btn btn-danger col-md-5">Kembali</button>
									</div>
								<?php } else { ?>
									<div class="row">
										<a href="<?= base_url('paket/edit_transaksi_langsung/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
									</div>
								<?php } ?>
							<?php } else { ?>
								<?php if ($total > $total_hps['hps']) { ?>
									<div class="row">
										<button disabled class="btn btn-danger col-md-5">Kembali</button>
									</div>
								<?php } else { ?>
									<div class="row">
										<a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
									</div>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDataRincianHps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="formDataHps">
					<input type="hidden" name="id_rincian_hps" id="id_rincian_hps">
					<input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket">
					<!-- inpu disini untuk agency by id-nya nanti -->
					<div class="row">
						<div class="form-group col-md-6">
							<label for="jenis_barang_jasa_rincian_hps">Jenis Barang/Jasa</label>
							<input type="text" class="form-control" name="jenis_barang_jasa_rincian_hps" id="jenis_barang_jasa_rincian_hps" placeholder="Jenis Barang/Jasa">
							<p class="jenis_barang_jasa_rincian_hps-error text-danger"></p>
							<label for="satuan_rincian_hps">Satuan</label>
							<input type="text" class="form-control" name="satuan_rincian_hps" id="satuan_rincian_hps" placeholder="Satuan">
							<p class="satuan_rincian_hps-error text-danger"></p>
							<label for="vol_rincian_hps">Vol</label>
							<input type="text" class="form-control" name="vol_rincian_hps" id="vol_rincian_hps" placeholder="Vol">
							<p class="vol_rincian_hps-error text-danger"></p>
						</div>
						<div class="form-group  col-md-6">
							<label for="persen_rincian_hps">Pajak(%)</label>
							<input type="text" class="form-control" name="persen_rincian_hps" id="persen_rincian_hps" placeholder="Pajak">
							<p class="persen_rincian_hps-error text-danger"></p>
							<label for="harga_rincian_hps">Harga</label>
							<input type="text" class="form-control" name="harga_rincian_hps" id="harga_rincian_hps2" placeholder="Harga">
							<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah">
							<p class="harga_rincian_hps-error text-danger"></p>
							<label for="keterangan_rincian_hps">Keterangan</label>
							<textarea name="keterangan_rincian_hps" id="keterangan_rincian_hps" class="form-control"></textarea>
							<p class="keterangan_rincian_hps-error text-danger"></p>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave" onclick="save_rincian_hps()">Save</button>
			</div>
		</div>
	</div>
</div>