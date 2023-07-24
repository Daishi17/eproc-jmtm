  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<nav aria-label="breadcrumb" class="mt-3">
  		<ol class="breadcrumb bg-primary">
  			<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Informasi Tender &raquo; Jenis Pengadaan</a></li>
  		</ol>
  	</nav>
  	<?= $this->session->flashdata('message'); ?>
  	<div class="content" id="hps-content">
  		<div class="content">
  			<div class="card">
  				<h5 class="card-header">Ubah Sistem Pengadaan</h5>
  				<div class="card-body">
  					<div style="padding: 20px;">
  						<form action="<?= base_url('panitiajmtm/daftarpaket/updatejenispengadaan') ?>" method="POST">
  							<input type="hidden" name="id_paket" value="<?= $paket2['id_paket'] ?>">
  							<div class="row mb-2 mt-2">
  								<div class="col-xs-10 col-sm-6 col-md-2"> <label for=""> Jenis Pengadaan </label></div>
  								<div class="col-xs-12 col-md-6">
  									<?php if ($paket2['status_paket_tender'] == 1) { ?>
  										<!--<input type="text" readonly name="id_jenis_pengadaan" class="form-control form-control-sm" value="<?= $paket2['nama_jenis_pengadaan'] ?>">-->
  										<select readonly id="id_jenis_pengadaan" style="width: 100%;" name="id_jenis_pengadaan" class="form-control select2" required>
  											<option value="<?= $paket2['id_jenis_pengadaan'] ?>"><?= $paket2['nama_jenis_pengadaan'] ?></option>
  											<?php foreach ($get_pengadaan as $key => $value) { ?>
  												<option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } else if ($paket2['status_paket_tender'] == 2) { ?>
  										<select disabled id="id_jenis_pengadaan" style="width: 100%;" name="id_jenis_pengadaan" class="form-control select2" required>
  											<option value="<?= $paket2['id_jenis_pengadaan'] ?>"><?= $paket2['nama_jenis_pengadaan'] ?></option>
  											<?php foreach ($get_pengadaan as $key => $value) { ?>
  												<option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } ?>
  								</div>
  							</div>
  							<div class="row  mb-2">
  								<div class="col-xs-10 col-sm-6 col-md-2"> <label for=""> Metode Pemilihan </label></div>
  								<div class="col-xs-12 col-md-6">

  									<?php if ($paket2['status_paket_tender'] == 1) { ?>
  										<select id="id_metode_pemilihan" style="width: 100%;" name="id_metode_pemilihan" class="form-control select2" required>
  											<option value="<?= $paket2['id_metode_pemilihan'] ?>"><?= $paket2['nama_metode_pemilihan'] ?></option>
  											<?php foreach ($pemilihan as $key => $value) { ?>
  												<option value="<?= $value['id_metode_pemilihan'] ?>"><?= $value['nama_metode_pemilihan'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } else if ($paket2['status_paket_tender'] == 2) { ?>
  										<select id="id_metode_pemilihan" disabled style="width: 100%;" name="id_metode_pemilihan" class="form-control select2" required>
  											<option value="<?= $paket2['id_metode_pemilihan'] ?>"><?= $paket2['nama_metode_pemilihan'] ?></option>
  											<?php foreach ($pemilihan as $key => $value) { ?>
  												<option value="<?= $value['id_metode_pemilihan'] ?>"><?= $value['nama_metode_pemilihan'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } ?>
  								</div>
  							</div>
  							<div class="row  mb-2">
  								<div class="col-xs-10 col-sm-6 col-md-2"> <label for=""> Metode Kualifikasi </label></div>
  								<div class="col-xs-12 col-md-6">
  									<?php if ($paket2['status_paket_tender'] == 1) { ?>
  										<?php if ($paket2['id_jenis_pengadaan'] == 4 && $paket2['id_metode_pemilihan'] == 6) { ?>
  											<select id="id_kualifikasi" style="width: 100%;" name="id_kualifikasi" class="form-control select2">
  												<option value="<?= $paket2['id_kualifikasi'] ?>"><?= $paket2['nama_kualifikasi'] ?></option>
  											</select>
  										<?php	} else if ($paket2['id_jenis_pengadaan'] == 4 && $paket2['id_metode_pemilihan'] == 4) { ?>
  											<select id="id_kualifikasi" style="width: 100%;" name="id_kualifikasi" class="form-control select2">
  												<option value="<?= $paket2['id_kualifikasi'] ?>"><?= $paket2['nama_kualifikasi'] ?></option>
  											</select>
  										<?php  } else { ?>
  											<select id="id_kualifikasi" style="width: 100%;" name="id_kualifikasi" class="form-control select2">
  												<option value="<?= $paket2['id_kualifikasi'] ?>"><?= $paket2['nama_kualifikasi'] ?></option>
  											</select>
  										<?php	} ?>

  									<?php } else if ($paket2['status_paket_tender'] == 2) { ?>
  										<select disabled id="id_kualifikasi" style="width: 100%;" name="id_kualifikasi" class="form-control select2" required>
  											<option value="<?= $paket2['id_kualifikasi'] ?>"><?= $paket2['nama_kualifikasi'] ?></option>
  											<?php foreach ($kualifikasi as $key => $value) { ?>
  												<option value="<?= $value['id_kualifikasi'] ?>"><?= $value['nama_kualifikasi'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } ?>
  								</div>
  							</div>
  							<div class="row mb-2">
  								<div class="col-xs-10 col-sm-6 col-md-2"> <label for=""> Metode Evaluasi </label></div>
  								<div class="col-xs-12 col-md-6">
  									<?php if ($paket2['status_paket_tender'] == 1) { ?>
  										<select id="mySelecttender4" style="width: 100%;" name="id_metode_dokumen" class="form-control select2">
  											<option value="<?= $paket2['id_metode_dokumen'] ?>"><?= $paket2['nama_metode_dokumen'] ?></option>
  											<?php foreach ($metode_dokumen as $key => $value) { ?>
  												<option id="cek_kualifikasi" value="<?= $value['id_metode_dokumen'] ?>"><?= $value['nama_metode_dokumen'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } else if ($paket2['status_paket_tender'] == 2) { ?>
  										<select disabled id="mySelecttender4" style="width: 100%;" name="id_metode_dokumen" class="form-control select2">
  											<option value="<?= $paket2['id_metode_dokumen'] ?>"><?= $paket2['nama_metode_dokumen'] ?></option>
  											<?php foreach ($metode_dokumen as $key => $value) { ?>
  												<option value="<?= $value['id_metode_dokumen'] ?>"><?= $value['nama_metode_dokumen'] ?></option>
  											<?php	} ?>
  										</select>
  									<?php } ?>
  								</div>
  							</div>
  							<div class="row mt-4 mb-2">
  								<div class="col-xs-10 col-sm-6 col-md-2"> <label for=""> </label></div>
  								<div class="col-xs-12 col-md-6">
  									<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket2['id_paket']) ?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left mr-2"></i> Kembali</a>&nbsp;
  									<?php if ($paket2['status_paket_tender'] == 1) { ?>
  										<button type="submit" class="btn btn-success"> <i class="fas fa-save mr-2"></i> Simpan</button>&nbsp;
  									<?php } else if ($paket2['status_paket_tender'] == 2) { ?>
  										<button disabled type="submit" class="btn btn-success"> <i class="fas fa-save mr-2"></i> Simpan</button>&nbsp;
  									<?php } ?>
  								</div>
  							</div>
  						</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  <!-- modal Masa Berllaku Penawaran -->

  <!-- end modal Klik Penawaran Yang Mau di buat -->