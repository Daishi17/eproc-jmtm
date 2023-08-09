  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<nav aria-label="breadcrumb" class="mt-3">
  		<ol class="breadcrumb bg-primary">
  			<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender &raquo; Jadwal Tender</a></li>
  		</ol>
  	</nav>
  	<div class="content" id="hps-content">
  		<div id="demo"></div>
  		<!-- start table -->
  		<table class="table table-bordered">
  			<tr>
  				<th class="bg-light" width="20%">Kode Tender</th>
  				<td><?= $paket2['kode_tender'] ?></td>
  			</tr>
  			<tr>
  				<th class="bg-light" width="20%">Nama Paket</th>
  				<td> <?= $paket2['nama_paket'] ?></td>
  			</tr>
  		</table>
  		<!-- end table -->
  		<div class="bs-callout bs-callout-info">
  			Jenis Pengadaaan Mempengaruhi Jadwal Oleh karena itu priksa kembali jenis pengadaan yang telah anda definisikan pastikan jenis pengadaan sudah diisi dengan sesuai <br>
  			<h6 class="text-danger">Pastikan juga tidak ada tanda merah pada per-tahapnya</h6>
  		</div>
  		<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  		<div class="card">
  			<br>
  			<div style="overflow-x: auto;">
  				<?php if ($paket2['id_kualifikasi'] == 2) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('message'); ?>
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  									</td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">

  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>

  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 3) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('message'); ?>
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>

  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>

  									</td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>

  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 5) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('message'); ?>
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" readonly class="form-control form-control-sm datepicker" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>

  									</td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" readonly class="form-control form-control-sm datepicker" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>

  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 6) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal3/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<?= $this->session->flashdata('jadwal_salah20'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="6" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 7) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal4/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<?= $this->session->flashdata('jadwal_salah20'); ?>
  						<?= $this->session->flashdata('jadwal_salah21'); ?>
  						<?= $this->session->flashdata('jadwal_salah22'); ?>
  						<?= $this->session->flashdata('jadwal_salah23'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="7" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 4 || $paket2['id_kualifikasi'] == 23) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal3/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<?= $this->session->flashdata('jadwal_salah20'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="4" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 11) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal4/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<?= $this->session->flashdata('jadwal_salah20'); ?>
  						<?= $this->session->flashdata('jadwal_salah21'); ?>
  						<?= $this->session->flashdata('jadwal_salah22'); ?>
  						<?= $this->session->flashdata('jadwal_salah23'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="11" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" readonly value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 10 || $paket2['id_kualifikasi'] == 24) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal3/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<?= $this->session->flashdata('jadwal_salah20'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="10" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>

  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" id="tanggal_mulai_pascakualifikasi" readonly name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>

  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" id="tanggal_selesai_pascakualifikasi" readonly name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 12) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="12" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>

  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 13) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal2/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<th></th>
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="13" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>

  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 14) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="14" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>



  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 15) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal2/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="15" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 17) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal4/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<?= $this->session->flashdata('jadwal_salah16'); ?>
  						<?= $this->session->flashdata('jadwal_salah17'); ?>
  						<?= $this->session->flashdata('jadwal_salah18'); ?>
  						<?= $this->session->flashdata('jadwal_salah19'); ?>
  						<?= $this->session->flashdata('jadwal_salah20'); ?>
  						<?= $this->session->flashdata('jadwal_salah21'); ?>
  						<?= $this->session->flashdata('jadwal_salah22'); ?>
  						<?= $this->session->flashdata('jadwal_salah23'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="11" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>

  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>

  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>


  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker" readonly id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>

  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm datepicker tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">

  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 18) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="14" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm " name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form> <?php } else if ($paket2['id_kualifikasi'] == 20) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="14" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm " name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 21) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<?= $this->session->flashdata('jadwal_salah7'); ?>
  						<?= $this->session->flashdata('jadwal_salah8'); ?>
  						<?= $this->session->flashdata('jadwal_salah9'); ?>
  						<?= $this->session->flashdata('jadwal_salah10'); ?>
  						<?= $this->session->flashdata('jadwal_salah11'); ?>
  						<?= $this->session->flashdata('jadwal_salah12'); ?>
  						<?= $this->session->flashdata('jadwal_salah13'); ?>
  						<?= $this->session->flashdata('jadwal_salah14'); ?>
  						<?= $this->session->flashdata('jadwal_salah15'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="14" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm " name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form>
  				<?php } else if ($paket2['id_kualifikasi'] == 22) { ?>
  					<form action="<?= base_url('panitiajmtm/daftarpaket/simpanjadwal5/' . $paket2['id_paket']) ?>" method="POST">
  						<?= $this->session->flashdata('jadwal_salah1'); ?>
  						<?= $this->session->flashdata('jadwal_salah2'); ?>
  						<?= $this->session->flashdata('jadwal_salah3'); ?>
  						<?= $this->session->flashdata('jadwal_salah4'); ?>
  						<?= $this->session->flashdata('jadwal_salah5'); ?>
  						<?= $this->session->flashdata('jadwal_salah6'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<?= $this->session->flashdata('message'); ?>
  						<!-- <?= $this->session->flashdata('jadwal_salah'); ?> -->
  						<table class="table">
  							<tr>
  								<th width="5%">No</th>
  								<th width="30%">Tahap</th>
  								<th width="25%">Tanggal Mulai</th>
  								<th width="25%">Tanggal selesai</th>
  								<!-- if anggota -->
  								<th></th>
  								<!-- if anggota -->
  							</tr>
  							<?php $i = 1;
								$j = 1;
								$k = 1;
								$l = 1;
								$z = 1;
								$o = 1;
								foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  								<input type="hidden" value="22" name="id_kualifikasi">
  								<input type="hidden" name="id_jadwal_tender[<?= $j ?>]" value="<?= $value['id_jadwal_tender'] ?>">
  								<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  								<tr>
  									<td><?= $i++ ?></td>
  									<td id="salahjadwal<?= $o ?>"><?= $value['nama_jadwal_tender'] ?></td>
  									<td>
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm " name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_mulai_pascakualifikasi" id="tanggal_mulai_pascakualifikasi" name="tanggal_mulai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_mulai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_mulai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_mulai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td id="validasi3">
  										<?php if ($id_role_panitia['id_role_panitia'] == 1) { ?>
  											<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  												<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control form-control-sm" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  														</div>
  													</div>
  												<?php } else { ?>
  													<div class="input-group input-group-sm mb-2">
  														<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  														<div class="input-group-prepend">
  															<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  														</div>
  													</div>
  												<?php }  ?>
  											<?php 	} else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php 	} ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia'] == 2) { ?>
  											<?php if ($value['status_perubahan'] == null || $value['status_perubahan'] == 2) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control datepicker form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>">
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>"></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?php if ($id_role_panitia['id_role_panitia']  == 3) { ?>
  											<?php if ($value['status_perubahan'] == null) { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php } else { ?>
  												<div class="input-group input-group-sm mb-2">
  													<input type="text" class="form-control form-control-sm tanggal_selesai_pascakualifikasi" id="tanggal_selesai_pascakualifikasi" name="tanggal_selesai_jadwal[<?= $j ?>]" value="<?= $value['tanggal_selesai_jadwal'] ?>" readonly>
  													<div class="input-group-prepend">
  														<!-- <div class="input-group-text"><input type="time" name="time_selesai[<?= $k ?>]" class="form-control form-control-sm" value="<?= $value['jam_selesai'] ?>" readonly></div> -->
  													</div>
  												</div>
  											<?php }  ?>
  										<?php } ?>
  										<?= $this->session->flashdata('jadwal_salah'); ?>
  									</td>
  									<td>
  										<?php if ($paket2['status_tahap_tender'] == 2 && $paket2['status_paket_tender'] == 2) { ?>
  											<?php if ($id_role_panitia['id_role_panitia']  == 1) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>">Yakinkan Perubahan</a>
  												<?php } else if (($value['status_perubahan'] == 1)) { ?>
  													<span class="badge badge-primary">Diubah Oleh <?= $value['user_created'] ?> </span>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_ketua<?= $value['id_jadwal_tender'] ?>">Alasan Ubah Jadwal</a>
  												<?php } ?>
  											<?php	} ?>

  											<?php if ($id_role_panitia['id_role_panitia']  == 2) { ?>
  												<?php if ($value['status_perubahan'] == 2) { ?>
  													<a href="javascript:;" class="badge badge-info" data-toggle="modal" data-target="#status_kirim<?= $value['id_jadwal_tender'] ?>">Menunggu Proses Pengubahan</a>
  												<?php } else if (($value['status_perubahan'] == null)) { ?>
  													<a href="javascript:;" class="badge badge-warning" data-toggle="modal" data-target="#alasan_anggota<?= $value['id_jadwal_tender'] ?>">Ubah Jadwal</a>
  												<?php } ?>
  												<?php if ($value['status_perubahan'] == 1) { ?>
  													<a href="javascript:;" class="badge badge-success">Mengalami Perubahan</a>
  												<?php } ?>
  											<?php	} ?>
  										<?php 	} else { ?>

  										<?php 	} ?>
  									</td>
  								</tr>
  								<?php $j++ ?>
  								<?php $k++ ?>
  								<?php $l++ ?>
  								<?php $o++ ?>
  							<?php } ?>
  						</table>
  						<div class="p-3">
  							<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  							<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  						</div>
  					</form> <?php } ?>
  			</div>
  		</div>
  	</div>

  </div>

  <!-- Modal -->
  <?php foreach ($jadwal_prakualifikasi as $key => $value) { ?>

  	<div class="modal fade" id="alasan_anggota<?= $value['id_jadwal_tender'] ?>" tabindex="-1" role="dialog" aria-labelledby="alasan_anggotaLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title" id="alasan_anggotaLabel">Alasan Merubah Jadwal</h5>
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  				</div>
  				<form action="<?= base_url('panitiajmtm/daftarpaket/perubahan_jadwal/' . $value['id_jadwal_tender']) ?>" method="POST">
  					<div class="modal-body">
  						<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
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




  <?php foreach ($jadwal_prakualifikasi as $key => $value) { ?>

  	<div class="modal fade" id="alasan_ketua<?= $value['id_jadwal_tender'] ?>" tabindex="-1" role="dialog" aria-labelledby="alasan_anggotaLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title" id="alasan_anggotaLabel">Alasan Merubah Jadwal</h5>
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  				</div>
  				<form action="<?= base_url('panitiajmtm/daftarpaket/perubahan_jadwal/' . $value['id_jadwal_tender']) ?>" method="POST">
  					<div class="modal-body">
  						<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
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
  <?php foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  	<div class="modal fade" id="permintaan_approve<?= $value['id_jadwal_tender'] ?>" tabindex="-1" role="dialog" aria-labelledby="permintaan_approveLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title" id="permintaan_approveLabel">Permintaan Approve</h5>
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  				</div>
  				<form action="<?= base_url('panitiajmtm/daftarpaket/status_approve_panitia/' . $value['id_jadwal_tender']) ?>" method="POST">
  					<div class="modal-body">
  						<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
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
  <?php foreach ($jadwal_prakualifikasi as $key => $value) { ?>
  	<div class="modal fade" id="permintaan_approve_ketua<?= $value['id_jadwal_tender'] ?>" tabindex="-1" role="dialog" aria-labelledby="permintaan_approveLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title" id="permintaan_approveLabel">Keterangan Pengubahan Jadwal</h5>
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  				</div>
  				<form action="<?= base_url('panitiajmtm/daftarpaket/status_approve_panitia/' . $value['id_jadwal_tender']) ?>" method="POST">
  					<div class="modal-body">
  						<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
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