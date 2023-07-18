  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Tambah Pegawai</a></li>
  	</ol>
  	<div class="content">
  		<section class="card" id="cardhide">
  			<div class="content tab-content">
  				<form action="<?= base_url('pegawai/tambahpegawai') ?>" method="post" class="formsimpan">
  					<div class="pesan" style="display: none;"></div>
  					<table class="table table-bordered">
  						<tr>
  							<td class="bgwarning">Nama<span style="color: red;">*</span></td>
  							<td width="75%">
  								<input type="text" class="form-control form-control-sm" name="nama_pegawai" id="nama_pegawai" value="<?= set_value('nama_pegawai') ?>">
  								<small class="form-text text-danger"><?= form_error('nama_pegawai'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">NIP<span style="color: red;">*</span></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="nip" id="nip" value="<?= set_value('nip') ?>">
  								<small class=" form-text text-danger"><?= form_error('nip'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Username<span style="color: red;">*</span><br><small class="text-danger text-sm">Username Tidak Boleh Menggunakan Spasi!</small></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="username" id="username" value="<?= set_value('username') ?>">
  								<small class=" form-text text-danger"><?= form_error('username'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Password<span style="color: red;">*</span></td>
  							<td>
  								<input type="password" class="form-control form-control-sm" name="password" id="password">
  								<small class="form-text text-danger"><?= form_error('password'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Ulangi Password<span style="color: red;">*</span></td>
  							<td>
  								<input type="password" class="form-control form-control-sm" name="password2" id="password2">
  								<small class="form-text text-danger"><?= form_error('password'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Alamat</td>
  							<td>
  								<textarea name="alamat" id="alamat" class="form-control form-control-sm" rows="3"><?= set_value('alamat') ?></textarea>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">No Telepon<span style="color: red;">*</span></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="telepon" id="noTelp" value="<?= set_value('telepon') ?>">
  								<small class="form-text text-danger"><?= form_error('telepon'); ?></small>
  								<small class="text-danger"> <i> <b> Jangan Memasukan Angka (0) ex: 08978201075 Pada Awal Nomor, Berpengaruh Pada Notifikasi Whatsaap & Email !!</b></i></small>
  								<br><small class="text-success"> <i> <b> Pengisiaan Yang Tepat : 8978201075 </b></i></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Email<span style="color: red;">*</span></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="email" id="email" value="<?= set_value('email') ?>">
  								<small class="form-text text-danger"><?= form_error('email'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Unit</td>
  							<td>
  									<select name="jabatan" class="form-control form-control-sm select2" id="jabatan">
  									<option value="<?= set_value('id_unit_kerja2') ?>"><?= set_value('nama_unit_kerja') ?></option>
  									<?php foreach ($unit as $key => $value) { ?>
  										<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
  									<?php } ?>
  								</select>
  								<!-- <input type="text" class="form-control form-control-sm" name="jabatan" value="<?= set_value('jabatan') ?>"> -->
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Status</td>
  							<td>
  								<label for="">Aktif</label>
  								<input type="radio" name="status" id="status" value="1">
  								<label for="" style="margin-left:30px">Tidak Aktif</label>
  								<input type="radio" name="status" id="status" value="0" checked>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Role<span style="color: red;">*</span></td>
  							<td>
  								<select name="id_role" id="id_role" class="form-control select2">
  									<option value="">--Pilih Role--</option>
  									<?php foreach ($role as $key => $value) { ?>
  										<option value="<?= $value['id_role'] ?>"><?= $value['nama_role'] ?></option>
  									<?php  } ?>
  								</select>
  								<small class="form-text text-danger"><?= form_error('id_role'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">No SK<span style="color: red;">*</span></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="no_sk" id="no_sk" value="<?= set_value('no_sk') ?>">
  								<small class="form-text text-danger"><?= form_error('no_sk'); ?></small>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Masa Berlaku SK</td>
  							<td>
  								<input type="text" class="tanggal_mulai_pascakualifikasi form-control form-control-sm" name="masa_berlaku_sk" id="masa_berlaku_sk" value="<?= set_value('masa_berlaku_sk') ?>">
  							</td>
  						</tr>
  					</table>
  					<div class="bs-callout bs-callout-warning">
  						<p style="text-align: left"><span class="warning" style="color:red;">*</span>Data ini wajib diisi.
  					</div>
  					<div class="form-group row">
  						<div class="col-10">
  							<button type="submit" class="btn btn-success btn-sm">Simpan</button>&nbsp;
  							<a class="btn btn-light btn-sm" href="<?= site_url('pegawai'); ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>&nbsp;
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