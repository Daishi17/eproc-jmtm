<?php $total = 0;
foreach ($total_rincian_hps as $key => $value) { ?>
	<?php
	$total +=  ($value['vol_rincian_hps'] * $value['harga_rincian_hps']) * $value['persen_rincian_hps'] / 100;
	?>
<?php } ?>
<?php if ($total > $total_hps['hps']) { ?>
	<?php redirect(base_url('paket/rincian_hps/' . $angga['id_paket'])) ?>
<?php } else { ?>
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

		.btn-grad7 {
			background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)
		}

		.btn-grad7 {
			text-transform: uppercase;
			transition: 0.5s;
			background-size: 200% auto;
			color: white;
			box-shadow: 0 0 20px #eee;
		}

		.btn-grad7:hover {
			background-position: right center;
			/* change the direction of the change here */
			color: #00d2ff;
			text-decoration: none;
			box-shadow: 0 0 40px #00d2ff;
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
		<input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paketkusaja">
		<br>
		<ol class="breadcrumb btn-grad7">
			<li><a style="text-decoration: none; color:white;" href="#">Detail Rencana Pelaksanaan Paket</a></li>
		</ol>
		<br>
		<form action="" id="form_data_tender">
			<input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paket_tender">
			<input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
			<div class="content">
				<div class="content tab-content">
					<div style="overflow-x:auto;">
						<table class="table table-bordered">
							<tr>
								<th class="bgwarning">Rencana Umum Pengadaan</th>
								<td>
									<table class="table table-bordered">
										<tr class="btn-grad7">
											<th>Kode Rup</th>
											<th>Nama Paket</th>
											<th>Jenis Pengadaan</th>
											<th>Jenis Anggaran</th>
										</tr>
										<tr>
											<td><?= $angga['kode_jenis_anggaran'] ?><?= $angga['kode_jenis_pengadaan'] ?><?= $angga['kode_metode_pemilihan'] ?><?= $angga['kode_unit_kerja'] ?><?= $angga['kode_produk_dl_negri'] ?></td>
											<td><?= $angga['nama_paket'] ?></td>

											<td><?= $angga['nama_jenis_pengadaan'] ?></td>
											<td width="150px"><?= $angga['nama_tahun_anggaran'] ?>-<?= $angga['nama_jenis_anggaran'] ?>-BUMN</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<th class="bgwarning">Nama Agency</th>
								<td><?= $this->session->userdata('nama_pegawai') ?></td>
							</tr>
							<tr>
								<th class="bgwarning">Unit</th>
								<td><?= $angga['nama_unit_kerja'] ?></td>
							</tr>
							<tr>
								<th class="bgwarning">Anggaran/Sumber Dana</th>
								<td class="">
									<input type="hidden" id="show_id_paket_sumber_dana" value="<?= $angga['id_paket'] ?>">
									<table id=sumberdana_tbl class="table table-bordered">
										<thead>
											<tr class="btn-grad7">
												<th width="50">No</th>
												<th width="100">Asal Dana</th>
												<th width="100">Nilai</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<th class="bgwarning">Nilai HPS <span class="warning">*</span></th>
								<td>
									<form action="#" id="formDataRincianHps">
										<?php if ($total_rincian_hps_pdf == null) { ?>
											<?php $total = 0;
											foreach ($total_rincian_hps as $key => $value) { ?>
												<?php
												$total +=  $value['vol_rincian_hps'] * $value['harga_rincian_hps'] + ($value['persen_rincian_hps'] / 100) * $value['vol_rincian_hps'] * $value['harga_rincian_hps'];
												?>
											<?php } ?>
											<?= "Rp " . number_format($total, 2, ',', '.') ?>
										<?php  } else { ?>
											<!-- update desember 2022 -->
											<?= "Rp " . number_format($total_hps_edit['total_rincian_hps_pdf'], 2, ',', '.')  ?>
										<?php } ?>
										<input type="hidden" value="<?= $angga['id_paket'] ?>" id="rincian_hps">
										<!--sangat Krusial Bansat  -->
										<a href="#" id="btnSave" onclick="BuatRincianHps()" class="btn btn-grad100 btn-sm">Rincian Hps</a>
									</form>
								</td>
							</tr>

							<tr>
								<th class="bgwarning">Nilai Pagu Paket</th>
								<td><?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?> </td>
							</tr>
							<tr>
								<th class="bgwarning">Lokasi Pekerjaan</th>
								<td>
									<input type="hidden" id="show_id_paket_lokasi_pekerjaan" value="<?= $angga['id_paket'] ?>">
									<table id=lokasi_kerja class="table table-bordered">
										<thead>
											<tr class="btn-grad7">
												<th width="50">No</th>
												<th width="100">Provinsi</th>
												<th width="100">Kabupaten</th>
												<th width="100">Detail Lokasi</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<th class="bgwarning">Nama Paket <span class="warning">*</span></th>
								<td class="">
									<input name="nama_tender" readonly class="form-control form-control-sm " value="<?= $angga['nama_paket'] ?>" />
									<div class="invalid-feedback"></div>
								</td>
							</tr>
							<tr>
								<th class="bgwarning">Pilih Panitia</th>
								<td class="col-md-8">
									<?php if ($angga['id_panitia'] != null) { ?>
										<form action="#" id="formDataPilihPanitia">
											<input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
											<a href="#" onclick="PilihPanitia()" class="btn btn-grad7 btn-sm"> <?= $angga['nama_panitia'] ?> <i class="fas fa fa-edit"></i> Ubah Panitia</a>
										</form>
									<?php } else { ?>
										<form action="#" id="formDataPilihPanitia">
											<input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
											<a href="#" onclick="PilihPanitia()" class="btn btn-grad7 btn-sm"><i class="fas fa fa-edit"></i>Pilih Panitia</a>
										</form>
									<?php } ?>
								</td>
							</tr>
						</table>
						<table class="table table-sm table-bordered">
							<tr>
								<th width="30%">No. Surat Rencana Pelaksanaan Pengadaan</th>
								<td><input type="text" required name="no_surat_rencana_pengadaan" class="form-control form-control-sm" value="<?= $angga['no_surat_rencana_pengadaan'] ?>" placeholder="Nomor Surat Rencana Pelaksanaan Pengadaan" /></td>
							</tr>

						</table>
					</div>
					<div class="bs-callout bs-callout-warning">
						<span class="warning">*</span> Wajib diisi.
					</div>
					<div class="form-group row">
						<div class="col-md-6">
						    
							<a href="<?= base_url('paket/daftar_paket') ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
						</div>
						<div class="col-md-6">
							<?php if (!$cek_panitia) { ?>

							<?php } else { ?>
								<?php if ($angga['status_paket_tender'] == 2 || $angga['status_tahap_tender'] == 2) { ?>

								<?php } else { ?>
									<a href="javascript:;" onclick="SimpanPaketTender()" class="btn btn-success btn-sm btn-block" id="cek_semua_isian_paket">Simpan Dan Umumkan Ke Panitia</a>
								<?php	} 	?>

							<?php } ?>

						</div>
					</div>
		</form>
	</div>
	</div>
	</div>

<?php } ?>

<!-- Modal -->
<div class="modal fade" id="modalDataTambahDokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Tambah Dokumen Pemilihan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="form_dokumen_rencana" enctype="multipart/form-data">
					<input type="hidden" id="id_paket_dokumenadd" name="id_paket" value="<?= $angga['id_paket'] ?>">
					<div class="form-group">
						<input type="text" name="nama_file_dokumen_rencana" value="" class="form-control" placeholder="Jenis File">
					</div>
					<div class="form-group">
						<input type="file" name="file_dokumen_persiapan" value="" id="file_dokumen_persiapan" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-success" id="upload" name="upload" type="submit">Upload</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>