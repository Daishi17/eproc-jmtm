<!-- <?php if ($this->session->flashdata('berhasil')) {
			echo '  <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Baiklah!!</h5>';
			echo  $this->session->flashdata('berhasil');
			echo ' </div>';
		} ?> -->

<style>
	.btn-grad11 {
		background-image: linear-gradient(to right, #ED4264 0%, #FFEDBC 51%, #ED4264 100%)
	}

	.btn-grad11 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad11:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
		box-shadow: 0 0 40px #ED4264;
	}


	.btn-grad12 {
		background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
	}

	.btn-grad12 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad12:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
		box-shadow: 0 0 40px #ED4264;
	}

	.btn-grad13 {
		background-image: linear-gradient(to right, #191970 0%, #000428 51%, #191970 100%)
	}

	.btn-grad13 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad13:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
		box-shadow: 0 0 40px #000428;
	}

	.btn-grad14 {
		background-image: linear-gradient(to right, #800000 0%, #000000 59%, #800000 100%)
	}

	.btn-grad14 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad14:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
		box-shadow: 0 0 40px #EB5757;
	}


	.btn-grad15 {
		background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
	}

	.btn-grad15 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;

	}

	.btn-grad15:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
		box-shadow: 0 0 40px #fc00ff;
	}

	.btn-grad70 {
		width: 100%;
		background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 40px #eee;
		border-radius: 10px;
	}

	.btn-grad70:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		box-shadow: 0 0 40px #1CB5E0;
		text-decoration: none;
	}
</style>
<div class="content p-5">
	<div class="container" style="margin-top:-30px">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-8">
				<div class="card border-primary">
					<div class="card-header btn-grad6 mb-3" style="color:white;"><a id="tender">Data Tender Pengadaan</a></div>
					<div style="overflow-x: auto; margin-top: -10px;">

						<div class="card">
							<div class="card-header btn-grad6">
								Pengadaan Barang
								<div class="card-tools float-right">
									<span class="badge pull-right badge-secondary"><?= $hitung_pengadaan_barang['total_paket'] ?></span>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped" id="table1" style="font-size: 11px;">
									<thead>
										<tr>
											<th style="width: 10px;">No</th>
											<th>Nama Paket</th>
											<th class="center">HPS</th>
											<th class="center" width="170">Akhir Pendaftaran</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($ambil_paket as $key => $value) { ?>
											<tr class="Pengadaan_Barang" sytle="display:none">
												<td style="width: 10px;">
													<center class="text-info"><?= $i++ ?></center>
												</td>
												<td><label class="text-info"><?= $value['nama_paket'] ?></label></td>
												<td class="table-hps"><?= "Rp " . number_format($value['hps'], 2, ',', '.')  ?></td>
												<?php if ($value['batas_pendaftaran'] == null) { ?>
													<td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
												<?php	} else { ?>
													<td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
												<?php } ?>

												<!-- <td class="center">21 Februari 2021 23:59</td> -->
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

						<div class="card">
							<div class="card-header btn-grad8">
								Jasa Konsultansi
								<div class="card-tools float-right">
									<span class="badge pull-right badge-secondary"><?= $hitung_pengadaan_jasa_konsultasi['total_paket'] ?></span>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped" id="table2" style="font-size: 11px;">
									<thead>
										<tr>
											<th style="width: 10px;">No</th>
											<th>Nama Paket</th>
											<th class="center">HPS</th>
											<th class="center" width="170">Akhir Pendaftaran</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($ambil_paket2 as $key => $value) { ?>
											<tr class="Jasa_Konsultansi_Badan_Usaha" sytle="display:none">
												<td style="width: 10px;">
													<center class="text-blue"><?= $i++ ?></center>
												</td>
												<td><label class="text-success"><?= $value['nama_paket'] ?></label></td>
												<td class="table-hps"><?= "Rp " . number_format($value['hps'], 2, ',', '.')  ?></td>
												<?php if ($value['batas_pendaftaran'] == null) { ?>
													<td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
												<?php	} else { ?>
													<td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
												<?php } ?>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

						<div class="card">
							<div class="card-header btn-grad9">
								PENGADAAN JASA PEMBORONGAN
								<div class="card-tools float-right">
									<span class="badge pull-right badge-secondary"><?= $hitung_jasa_pemborongan['total_paket']  ?></span>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped" id="table3" style="font-size: 11px;">
									<thead>
										<tr>
											<th style="width: 10px;">No</th>
											<th>Nama Paket</th>
											<th class="center">HPS</th>
											<th class="center" width="170">Akhir Pendaftaran</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($ambil_paket3 as $key => $value) { ?>
											<tr class="Jasa_Konsultansi_Badan_Usaha" sytle="display:none">
												<td style="width: 10px;">
													<center class="text-blue"><?= $i++ ?></center>
												</td>
													<td><label class="text-danger"><?= $value['nama_paket'] ?></label></td>
												<td class="table-hps"><?= "Rp " . number_format($value['hps'], 2, ',', '.')  ?></td>
												<?php if ($value['batas_pendaftaran'] == null) { ?>
													<td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
												<?php	} else { ?>
													<td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
												<?php } ?>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- Button trigger modal -->

						<!-- Modal -->

						<div class="card">
							<div class="card-header btn-grad10">
								PENGADAAN JASA LAINNYA
								<div class="card-tools float-right">
									<span class="badge pull-right badge-secondary"><?= $hitung_jasa_lain['total_paket']  ?></span>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped" id="table4" style="font-size: 11px;">
									<thead>
										<tr>
											<th style="width: 10px;">No</th>
											<th>Nama Paket</th>
											<th class="center">HPS</th>
											<th class="center" width="170">Akhir Pendaftaran</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($ambil_paket4 as $key => $value) { ?>
											<tr class="Jasa_Konsultansi_Badan_Usaha" sytle="display:none">
												<td style="width: 10px;">
													<center class="text-blue"><?= $i++ ?></center>
												</td>
												<td><label class="text-warning"><?= $value['nama_paket'] ?></label></td>
												<td class="table-hps"><?= "Rp " . number_format($value['hps'], 2, ',', '.')  ?></td>
												<?php if ($value['batas_pendaftaran'] == null) { ?>
													<td><label for="" class="badge badge-info">Jadwal Belum Di Prosess</label></td>
												<?php	} else { ?>
													<td><?= date('d-F-Y H:i', strtotime($value['batas_pendaftaran']))  ?></td>
												<?php } ?>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="card border-primary mb-5">
					<div class="list-group" style="width:100%; word-wrap:break-word; display:inline-block;">
						<a href="#" class="list-group-item btn-grad15">Pengumuman dan Berita</a>
						<?php foreach ($berita as $key => $value) { ?>
							<a target="_blank" href="<?= base_url('file_berita/') ?><?= $value['file_berita'] ?>" class="list-group-item"><?= date('d-F-Y H:i', strtotime($value['created_at']))  ?>
								<br /><?= $value['nama_berita'] ?></a>
						<?php } ?>
					</div>
				</div>
				<!-- <div class="list-group mt-5 card border-primary">
					<a class="list-group-item" style="background-image: linear-gradient(to top,rgba(100, 174, 223, 0.747),rgba(7, 70, 112, 0.747)); color:white;">Link Penting</a>
					<a href="/eproc4/lelang_umum" class="list-group-item">Tender Non-Eproc</a>
				</div> -->
			</div>

		</div>
	</div>
</div>

<form id="formLogout" action="/eproc4/logout" method="post"></form>
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 2000)
</script>



<!-- <?php foreach ($ambil_semua_paket as $key => $id_paket) { ?>
	<div class="modal fade" id="modal_lihat_tahap<?= $id_paket['id_paket'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Tahap Tender Saat Ini</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" id="formData">
						<div style="overflow-x: auto;">
							<table class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
								<tr>
									<th>No</th>
									<th>Nama Tahap</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Diubah Oleh</th>
									<th>Alasan Perubahan</th>
								</tr>
								<?php foreach ($ambil_jadwal as $key => $value) { ?>
									<tr>
										<td><?= $i++ ?></td>
										<td>
											<?php if ($value['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
												<b class="text-secondary"> <?= $value['nama_jadwal_tender'] ?></b>
											<?php	} else if ($value['batas_pendaftaran'] >= date('d-m-Y H:i') || $value['tanggal_mulai_jadwal'] == date('d-m-Y H:i')) { ?>
												<b class="text-danger"> <?= $value['nama_jadwal_tender'] ?> <small class="badge badge-danger">Tahap Sedang Berlangsung</small></b>
											<?php	} else { ?>

												<b class="text-success"> <?= $value['nama_jadwal_tender'] ?> <small class="badge badge-success">Tahap Sudah Selesai <i class="fa fa-check"></i> </small></b>
											<?php	} ?>
										</td>
										<td><?php if ($value['tanggal_mulai_jadwal'] >= date('d-m-Y H:i')) { ?>
												<b><?= date('d F Y H:i', strtotime($value['tanggal_mulai_jadwal']))  ?> </b>
											<?php	} else if ($value['batas_pendaftaran']  >= date('d-m-Y H:i')) { ?>
												<b><?= date('d F Y H:i', strtotime($value['tanggal_mulai_jadwal']))  ?> </b>
											<?php	} else { ?>

												<b><?= date('d F Y H:i', strtotime($value['tanggal_mulai_jadwal']))  ?> </b>
											<?php	} ?>
										</td>
										<td>
											<?php if ($value['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
												<b><?= date('d F Y H:i', strtotime($value['batas_pendaftaran'])) ?></b>
											<?php	} else if ($value['batas_pendaftaran'] >= date('d-m-Y H:i')) { ?>
												<b><?= date('d F Y H:i', strtotime($value['batas_pendaftaran'])) ?></b>
											<?php	} else { ?>
												<b><?= date('d F Y H:i', strtotime($value['batas_pendaftaran'])) ?></b>
											<?php	} ?>
										</td>
										<td>
											<?php if ($value['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
												<b><?= $value['user_created'] ?></b>
											<?php	} else if ($value['batas_pendaftaran'] >= date('d-m-Y H:i')) { ?>
												<b><?= $value['user_created'] ?></b>
											<?php	} else { ?>
												<b><?= $value['user_created'] ?></b>
											<?php	} ?>
										</td>
										<td>
											<?php if ($value['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
												<b><?= $value['alasan_perubahan'] ?></b>
											<?php	} else if ($value['batas_pendaftaran'] >= date('d-m-Y H:i')) { ?>
												<b><?= $value['alasan_perubahan'] ?></b>
											<?php	} else { ?>
												<b><?= $value['alasan_perubahan'] ?></b>
											<?php	} ?>
										</td>
									</tr>
								<?php } ?>
							</table>
						</div>
						<div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php } ?> -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modal_saya" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header btn-grad6">
				<h5 class="modal-title  text-white" id="exampleModalLongTitle">JASA MARGA TOLLROAD MAINTENANCE E-PROCUREMENT</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video autoplay="autoplay" controls="controls" style="width: 100%;">
					<source src="<?= base_url('assets/video/') ?>iklanjmtm.mp4" type="video/mp4" codecs="avc1.4D401E, mp4a.40.2">
				</video>
			</div>
		</div>
	</div>
</div>