  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Tambah Panitia</a></li>
  	</ol>
  	<div class="content">
  		<section class="card" id="cardhide">
  			<div class="content tab-content">
  				<form action="<?= base_url('panitia/save') ?>" method="post" class="form-group">
  					<div class="pesan" style="display: none;"></div>
  					<table class="table table-bordered">
  						<tr>
  							<td class="bgwarning">Nama Panitia<span style="color: red;">*</span></td>
  							<td width="75%">
  								<input type="text" class="form-control form-control-sm" name="nama_panitia" id="nama_panitia">
  								<small class="form-text text-danger"><?= form_error('nama_panitia'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Nomor SK<span style="color: red;">*</span></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="nomor_sk" id="nomor_sk">
  								<small class="form-text text-danger"><?= form_error('nomor_sk'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Tahun</td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="tahun" id="tahun">
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Alamat Kantor</td>
  							<td>
  								<textarea name="alamat_kantor" id="alamat_kantor" class="form-control form-control-sm" rows="3"></textarea>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">Provinsi</td>
  							<td>
  								<div class="row">
  									<div class="col-md-4">
  										<select name="id_provinsi" id="provinsi" class="form-control select2">
  											<option value="">--Provinsi--</option>
  											<?php foreach ($provinsi as $key => $value) { ?>
  												<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
  											<?php  } ?>
  										</select>
  									</div>
  								</div>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">Kabupaten/Kota</td>
  							<td>
  								<div class="row">
  									<div class="col-md-4">
  										<select name="id_kabupaten" id="kabupaten" class="form-control select2">
  											<option value="">--Kabupaten--</option>
  										</select>
  									</div>
  								</div>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">Unit Area<span style="color: red;">*</span></td>
  							<td>
  								<div class="row">
  									<div class="col-md-3">
  										<select name="id_area" id="id_area" class="form-control select2">
  											<?php foreach ($area as $value) { ?>
  												<option value="<?= $value['id_area'] ?>"><?= $value['nama_area'] ?></option>
  											<?php } ?>
  										</select>
  									</div>
  								</div>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">Unit<span style="color: red;">*</span></td>
  							<td>
  								<div class="row">
  									<div class="col-md-5">
  										<?php if ($this->session->userdata('id_role') == 1) { ?>
  											<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
  												<?php foreach ($getdivisi as $key => $value) { ?>
  													<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
  												<?php } ?>
  											</select>
  										<?php } else if ($this->session->userdata('id_role') == 2) { ?>
  											<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
  												<option value="<?= $this->session->userdata('id_unit_kerja2') ?>"><?= $this->session->userdata('nama_unit_kerja') ?></option>
  											</select>
  										<?php } ?>
  									</div>
  								</div>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">
  								Panitia Penetapan Langsung
  								<small class="text-danger"><br>
  									Silahkan Dicentang Jika Membuat Panitia Penetapan Langsung</small>
  							</td>
  							<td class="text-danger">Centang Disini Untuk Membuat Panitia Penetapan Langsung <input type="checkbox" name="status_penetapan_langsung" value="1" id="status_penetapan_langsung"></td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">
  								Panitia Penunjukan Langsung
  								<small class="text-danger"><br>
  									Silahkan Dicentang Jika Membuat Panitia Penunjukan Langsung</small>
  							</td>
  							<td class="text-danger">Centang Disini Untuk Membuat Panitia Penunjukan Langsung <input type="checkbox" name="status_penunjukan_langsung_panitia" value="1" id="status_penunjukan_langsung_panitia"></td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">
  								Panitia Tender Terbatas
  								<small class="text-danger"><br>
  									Silahkan Dicentang Jika Membuat Panitia Tender Terbatas</small>
  							</td>
  							<td class="text-danger">Centang Disini Untuk Membuat Panitia Tender Terbatas <input type="checkbox" name="status_tender_terbatas" value="1" id="status_tender_terbatas_panitia"></td>
  						</tr>
  					</table>
  					<div class="card">
  						<div class="container">
  							<table class="table" id="tbl_tambah_panitia">
  								<thead>
  									<tr>
  										<th></th>
  										<th width="10px">No</th>
  										<th>Nama Pegawai</th>
  										<th>User</th>
  										<th>Nip</th>
  									</tr>
  								</thead>
  								<!-- foreach Pegawi By Id Nama Pokja stst -->
  								<tbody>
  									<?php $i = 1;
										foreach ($pegawai as $data) : ?>
  										<tr>
  											<td width="10px">
  												<input type="checkbox" value="<?= $data['id_pegawai']; ?>" name="id_pegawai2[]">
  											</td>
  											<td><?= $i++; ?></td>
  											<td><?= $data['nama_pegawai'] ?></td>
  											<td><?= $data['username'] ?></td>
  											<td><?= $data['nip'] ?></td>
  										</tr>
  									<?php endforeach ?>
  								</tbody>
  							</table>
  						</div>
  					</div>
  					<div class="bs-callout bs-callout-warning">
  						<p style="text-align: left"><span class="warning" style="color:red;">*</span>Data ini wajib diisi.
  					</div>
  					<div class="form-group row">
  						<div class="col-10">
  							<button type="submit" value="simpan" class="btn btn-success btn-sm">Simpan</button>&nbsp;
  							<a class="btn btn-light btn-sm" href="<?= base_url('panitia'); ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>&nbsp;
  						</div>
  					</div>
  				</form>
  			</div>
  		</section>
  	</div>
  </div>

  <!-- <script>
	$(document).ready(function() {
		$('.formsimpan').submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: "post",
				url: $(this).attr('action'),
				data: new FormData(this),
				contentType: false,
				processData: false,
				cache: false,
				dataType: "json",
				success: function(response) {
					Swal.fire({
						icon: 'success',
						title: 'Berhasil!',
						text: response.sukses,
					})
					window.location.href = "<?= site_url('pegawai') ?>";
					console.log(response);
				},
			});
			return false;
		});
	});
</script> -->
