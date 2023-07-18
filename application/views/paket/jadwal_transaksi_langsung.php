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
	<input type="hidden" name="id_paket" id="id_paketkusaja" value="<?= $angga['id_paket'] ?>">
	<br>
	<ol class="breadcrumb btn-grad100" href="#">Jadwal Tranksaksi Langsung</a></li>
	</ol>
	<div class="content">
		<center>
			<?= $this->session->flashdata('ubah'); ?>
		</center>
		<div class="card">
			<?php if ($this->session->userdata('id_role') == 6) { ?>
				<div class="card-header btn-grad100">
					Jadwal Transaksi Langsung
				</div>
			<?php } else { ?>
				<div class="card-header btn-grad100">
					Atur Jadwal Transaksi Langsung
				</div>
			<?php } ?>
			<?php if ($result_data_jadwal_detail == null) { ?>
				<?= $this->session->flashdata('message'); ?>
				<div class="card-body">
					<form action="" id="form_jadwal_transaksi_langsung">
						<table class="table table-hover">
							<thead>
								<tr class="btn-grad100">
									<th>No</th>
									<th>Nama Jadwal</th>
									<th>Tanggal & Jam Mulai</th>
									<th>Tangga & Jam Selesai</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								$mulai = 1;
								$selesai = 1;
								$erorr = 1;
								$bener = 1;
								$erorrtext = 1;
								$benertext = 1;
								$erorr_row = 1;
								$name_jadwal = 1;
								foreach ($result_data_jadwal as $key => $value) { ?>
									<tr id="erorr_jadwal_row<?= $erorr_row++ ?>">
										<td><?= $no++ ?></td>
										<td><?= $value['nama_jadwal_transaksi_langsung'] ?></td>
										<!-- <div class="alert alert-danger" style="display: none;" id="error-jadwal<?= $erorr++ ?>" role="alert">
											Jadwal <?= $value['nama_jadwal_transaksi_langsung'] ?><?= $erorrtext++ ?> Belum Benar Mengisinya
										</div> -->
										<div class="alert alert-success" style="display: none;" id="bener-jadwal<?= $bener++ ?>" role="alert">
											Jadwal <?= $value['nama_jadwal_transaksi_langsung'] ?><?= $benertext++ ?> Sudah Benar
										</div>

										<input type="hidden" name="nama_jadwal_transaksi_langsung_detail[]" value="<?= $value['nama_jadwal_transaksi_langsung'] ?>">
										<td><input class="form-control form-control-sm" name="tanggal_mulai[]" type="text" id="mulai<?= $mulai++ ?>"></td>
										<td><input class="form-control form-control-sm" name="tanggal_selesai[]" type="text" id="selesai<?= $selesai++ ?>"></td>
									</tr>
								<?php  } ?>
							</tbody>
						</table>
						<center>
							<button style="width: 300px;" id="btnSaveSimpan" type="submit" class="btn btn-primary">Simpan Jawal</button>
						</center>
					</form>
				</div>
			<?php } else { ?>
				<?php if ($this->session->userdata('id_role') == 6 || $angga['status_persetujuan_manager'] == 3 && 4) { ?>
					<div class="card-body">
						<form action="javascript:;" id="form_update_jadwal_transaksi_langsung">
							<table class=" table table-hover">
								<thead>
									<tr class="btn-grad100">
										<th>No</th>
										<th>Nama Jadwal</th>
										<th>Tanggal & Jam Mulai</th>
										<th>Tangga & Jam Selesai</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($result_data_jadwal_detail as  $value2) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value2['nama_jadwal_transaksi_langsung_detail'] ?></td>
											<div class="alert alert-danger" style="display: none;" role="alert">
												Jadwal <?= $value2['nama_jadwal_transaksi_langsung_detail'] ?> Belum Benar Mengisinya
											</div>
											<div class="alert alert-success" style="display: none;" role="alert">
												Jadwal <?= $value2['nama_jadwal_transaksi_langsung_detail'] ?> Sudah Benar
											</div>
											<td><input readonly class="form-control form-control-sm" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_mulai'])) ?>" type="text"></td>
											<td><input readonly class="form-control form-control-sm" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_selesai']))  ?>" type="text"></td>
										</tr>
									<?php  } ?>
								</tbody>
							</table>
							<center>
								<?php if ($this->session->userdata('id_role') == 1) { ?>
									<button type="submit" id="btnSave" class="btn btn-grad100">Update Jadwal</button>
								<?php } else if ($this->session->userdata('id_role') == 2) { ?>
									<button type="submit" id="btnSave" class="btn btn-grad100">Update Jadwal</button>
								<?php } ?>
								<?php if ($this->session->userdata('id_role') == 6) { ?>
									<a class="btn btn-grad100" href="<?= base_url('paket/detail_paket/' . $angga['id_paket']) ?>">Kembali</a>
								<?php } else { ?>
									<a class="btn btn-grad100" href="<?= base_url('paket/edit_transaksi_langsung/' . $angga['id_paket']) ?>">Kembali</a>
								<?php } ?>

							</center>
						</form>
					</div>
				<?php } else { ?>
					<div class="card-body">
						<form action="javascript:;" id="form_update_jadwal_transaksi_langsung">
							<table class=" table table-hover">
								<thead>
									<tr class="btn-grad100">
										<th>No</th>
										<th>Nama Jadwal</th>
										<th>Tanggal & Jam Mulai</th>
										<th>Tangga & Jam Selesai</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									$mulai_detail = 1;
									$selesai_detail = 1;
									$erorr_detail = 1;
									$bener_detail = 1;
									$erorrtext_detail = 1;
									$benertext_detail = 1;
									$erorr_row_detail = 1;
									$name_jadwal_detail = 1;
									$i = 1;
									foreach ($result_data_jadwal_detail as  $value2) { ?>
										<input type="hidden" name="id_jadwal_transaksi_langsung_detail[<?= $i ?>]" value="<?= $value2['id_jadwal_transaksi_langsung_detail'] ?>">
										<tr id="erorr_jadwal_row<?= $erorr_row_detail++ ?>">
											<td><?= $no++ ?></td>
											<td><?= $value2['nama_jadwal_transaksi_langsung_detail'] ?></td>
											<div class="alert alert-danger" style="display: none;" role="alert">
												Jadwal <?= $value2['nama_jadwal_transaksi_langsung_detail'] ?> Belum Benar Mengisinya
											</div>
											<div class="alert alert-success" style="display: none;" role="alert">
												Jadwal <?= $value2['nama_jadwal_transaksi_langsung_detail'] ?> Sudah Benar
											</div>
											<?php if ($value2['status_perubahan'] == null || $value2['status_perubahan'] == 2) { ?>
												<td><input class="form-control form-control-sm" name="tanggal_mulai[<?= $i ?>]" readonly value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_mulai'])) ?>" type="text"></td>
												<td><input class="form-control form-control-sm" readonly name="tanggal_selesai[<?= $i ?>]" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_selesai']))  ?>" type="text"></td>
											<?php } else { ?>
												<td><input class="form-control form-control-sm" name="tanggal_mulai[<?= $i ?>]" id="mulai<?= $mulai_detail++ ?>" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_mulai'])) ?>" type="text"></td>
												<td><input class="form-control form-control-sm" name="tanggal_selesai[<?= $i ?>]" id="selesai<?= $selesai_detail++ ?>" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_selesai']))  ?>" type="text"></td>
											<?php }  ?>
											<td>
												<?php if ($value2['status_perubahan'] == 2) { ?>
													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value2['id_jadwal_transaksi_langsung_detail'] ?>">Yakinkan Perubahan</a>
												<?php } else if (($value2['status_perubahan'] == 1)) { ?>
													<span class="badge badge-primary">Diubah Oleh <?= $value2['user_created'] ?> </span>
												<?php } else if (($value2['status_perubahan'] == null)) { ?>
													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value2['id_jadwal_transaksi_langsung_detail'] ?>">Alasan Ubah Jadwal</a>
												<?php } ?>
											</td>
										</tr>
										<?php $i++ ?>
									<?php  } ?>
								</tbody>
							</table>
							<center>
								<?php if ($this->session->userdata('id_role') == 1) { ?>
									<button type="submit" id="btnSave" class="btn btn-grad100">Update Jadwal</button>
								<?php } else if ($this->session->userdata('id_role') == 2) { ?>
									<button type="submit" id="btnSave" class="btn btn-grad100">Update Jadwal</button>
								<?php } ?>
								<?php if ($this->session->userdata('id_role') == 6) { ?>
									<a class="btn btn-grad100" href="<?= base_url('paket/detail_paket/' . $angga['id_paket']) ?>">Kembali</a>
								<?php } else { ?>
									<a class="btn btn-grad100" href="<?= base_url('paket/edit_transaksi_langsung/' . $angga['id_paket']) ?>">Kembali</a>
								<?php } ?>

							</center>
						</form>
					</div>
				<?php	} ?>
			<?php   } ?>

		</div>
	</div>
</div>

<!-- Modal -->
<?php foreach ($result_data_jadwal_detail as $key => $value) { ?>

	<div class="modal fade" id="alasan_anggota<?= $value['id_jadwal_transaksi_langsung_detail'] ?>" tabindex="-1" role="dialog" aria-labelledby="alasan_anggotaLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="alasan_anggotaLabel">Alasan Merubah Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('paket/perubahan_jadwal/' . $value['id_jadwal_transaksi_langsung_detail']) ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id_paket" value="<?= $value['id_paket'] ?>">
						<label class="sr-only">Nama Pengubah</label>
						<input type="hidden" class="form-control form-control-sm" name="nama_pegawai" placeholder="Nama Pengubah" value="<?= $this->session->userdata('nama_pegawai') ?>">
						<label class="sr-only">Alasan Perubahan</label>
						<textarea name="alasan_pengubahan" class="form-control" placeholder="Alasan Pengubahan" name="alasan_pengubahan"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal Klik Penawaran Yang Mau di buat -->
<?php } ?>


<?php foreach ($result_data_jadwal_detail as $key => $value) { ?>

	<div class="modal fade" id="alasan_ketua<?= $value['id_jadwal_transaksi_langsung_detail'] ?>" tabindex="-1" role="dialog" aria-labelledby="alasan_anggotaLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="alasan_anggotaLabel">Alasan Merubah Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('paket/perubahan_jadwal/' . $value['id_jadwal_transaksi_langsung_detail']) ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id_paket" value="<?= $value['id_paket'] ?>">
						<label class="sr-only">Nama Pengubah</label>
						<input type="hidden" class="form-control form-control-sm" name="nama_pegawai" placeholder="Nama Pengubah" value="<?= $this->session->userdata('nama_pegawai') ?>">
						<label class="sr-only">Alasan Perubahan</label>
						<textarea name="alasan_pengubahan" class="form-control" placeholder="Alasan Pengubahan" name="alasan_pengubahan"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal Klik Penawaran Yang Mau di buat -->
<?php } ?>

<!-- Modal -->
<?php foreach ($result_data_jadwal_detail as $key => $value) { ?>
	<div class="modal fade" id="permintaan_approve<?= $value['id_jadwal_transaksi_langsung_detail'] ?>" tabindex="-1" role="dialog" aria-labelledby="permintaan_approveLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="permintaan_approveLabel">Permintaan Approve</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('paket/status_approve_panitia/' . $value['id_jadwal_transaksi_langsung_detail']) ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id_paket" value="<?= $value['id_paket'] ?>">
						<div class="form-group">
							<label for="">Nama Peminta</label>
							<input type="text" readonly class="form-control form-control-sm" name="nama_pegawai" placeholder="Nama Pengubah" value="<?= $value['user_created'] ?>">
						</div>
						<div class="form-group">
							<label for="">Alasan Perubahan</label>
							<textarea name="alasan_pengubahan" class="form-control" readonly placeholder="Alasan Pengubahan" name="alasan_pengubahan"><?= $value['alasan_perubahan'] ?></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Approve</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal Klik Penawaran Yang Mau di buat -->
<?php } ?>


<!-- Modal -->
<?php foreach ($result_data_jadwal_detail as $key => $value) { ?>
	<div class="modal fade" id="permintaan_approve_ketua<?= $value['id_jadwal_transaksi_langsung_detail'] ?>" tabindex="-1" role="dialog" aria-labelledby="permintaan_approveLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="permintaan_approveLabel">Keterangan Pengubahan Jadwal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('paket/status_approve_panitia/' . $value['id_jadwal_transaksi_langsung_detail']) ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id_paket" value="<?= $value['id_paket'] ?>">
						<div class="form-group">
							<label for="">Nama Pengubah</label>
							<input type="text" readonly class="form-control form-control-sm" name="nama_pegawai" placeholder="Nama Pengubah" value="<?= $value['user_created'] ?>">
						</div>
						<div class="form-group">
							<label for="">Alasan Perubahan</label>
							<textarea name="alasan_pengubahan" class="form-control" readonly placeholder="Alasan Pengubahan" name="alasan_pengubahan"><?= $value['alasan_perubahan'] ?></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Approve</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal Klik Penawaran Yang Mau di buat -->
<?php } ?>
