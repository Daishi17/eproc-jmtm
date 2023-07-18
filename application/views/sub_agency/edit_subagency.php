  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Edit Agency</a></li>

  	</ol>
  	<div class="content">
  		<?= $this->session->flashdata('message') ?>
  		<div style="overflow-x: auto;">
  			<form action="#" id="formData">
  				<input type="hidden" name="id_pegawai" value="<?= $agency['id_pegawai'] ?>" class="form-control form-control-sm">
  				<table class="table">
  					<tr>
  						<th align="right" width=20%>Nama Agency<span style="color:red">*</span></th>
  						<td colspan="3"> <input type="text" name="nama_pegawai" value="<?= $agency['nama_pegawai'] ?>" class="form-control form-control-sm">
  							<p class="nama_pegawai-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right" width=20%>NIP<span style="color:red">*</span></th>
  						<td colspan="3"> <input type="text" name="nip" value="<?= $agency['nip'] ?>" class="form-control form-control-sm">
  							<p class="nip-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Unit <span style="color:red">*</span></th>
  						<td colspan="3"> <select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
  								<option value="<?= $agency['id_unit_kerja'] ?>"><?= $agency['nama_unit_kerja'] ?></option>
  								<?php foreach ($getdivisi as $key => $value) { ?>
  									<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?> </option>
  								<?php	} ?>
  							</select>
  							<p class="id_area-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Provinsi <span style="color:red">*</span></th>
  						<td><select name="id_provinsi" id="provinsi2" class="form-control select2">
  								<option value="<?= $agency['id_provinsi'] ?>"><?= $agency['nama_provinsi'] ?></option>
  								<?php foreach ($provinsi as $key => $value) { ?>
  									<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
  								<?php  } ?>
  							</select>
  							<p class="id_provinsi-error text-danger"></p>
  						</td>
  						<th align="right">Kabupaten / Kota <span style="color:red">*</span></th>
  						<td> <select name="id_kabupaten" id="kabupaten2" class="form-control select2">
  								<option value="<?= $agency['id_kabupaten'] ?>"><?= $agency['nama_kabupaten'] ?></option>
  							</select>
  							<br>
  							(kabupaten / kota akan muncul sesuai provinsi yang dipilih)
  							<p class="id_kabupaten-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Alamat <span style="color:red">*</span></th>
  						<td colspan="3"> <textarea name="alamat" class="form-control"><?= $agency['alamat'] ?></textarea>
  							<p class="alamat-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Telepon <span style="color:red">*</span></th>
  						<td colspan="3"> <input type="text" id="telppon_edit" name="telepon" value="<?= $agency['telepon'] ?>" class="form-control form-control-sm col-md-3">
  							<p class="telepon-error text-danger"></p>
  							<small class="text-danger"> <i> <b> Jangan Memasukan Angka (Nol / 0) ex: 08978201075 Pada Awal Nomor, Berpengaruh Pada Notifikasi Whatsaap & Email !!</b></i></small>
  							<br><small class="text-success"> <i> <b> Pengisiaan Yang Tepat : 8978201075 </b></i></small>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Email <span style="color:red">*</span></th>
  						<td colspan="3"> <input type="email" name="email" value="<?= $agency['email'] ?>" class="form-control form-control-sm col-md-6">
  							<p class="email-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Username<span style="color:red">*</span></th>
  						<td colspan="5"> <input type="username" name="username" value="<?= $agency['username'] ?>" class="form-control form-control-sm col-md-4">
  							<p class="username-error text-danger"></p>
  						</td>
  					</tr>
  					<tr>
  						<th align="right">Password<span style="color:red">*</span></th>
  						<td colspan="5"> <a href="<?= base_url('subagency/gantipassword/' . $agency['id_pegawai']) ?>" class="btn btn-sm btn-danger">Ganti Password</a>
  						</td>
  					</tr>
  					<!-- <tr>
						<th align="right">Penangung Jawab <span style="color:red">*</span></th>
						<td colspan="3"><select name="id_pegawai" id="id_pegawai" class="form-control form-control-sm col-md-3 select2">
								<option value="<?= $agency['id_pegawai'] ?>"><?= $agency['nama_pegawai'] ?></option>
								<?php foreach ($pegawai as $key => $value) { ?>
									<option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?></option>
								<?php	} ?>
							</select>
							<p class="id_pegawai-error text-danger"></p>
						</td>
					</tr> -->
  					<tr>
  						<th align="right">Nomor Surat Kerja <span style="color:red">*</span></th>
  						<td colspan="5">
  							<input type="text" name="no_sk" value="<?= $agency['no_sk'] ?>" class="form-control form-control-sm col-md-5">
  							<p class="no_sk-error text-danger"></p>
  						</td>
  					</tr>
  				</table>
  			</form>
  		</div>
  		<div class="bs-callout-info mb-3">Yang Diberikan <span style="color:red">*</span> <span style="color:red">(Bintang Merah) </span>Wajib Diisi !!</div>
  		<div class="row">
  			<div class="col-md-6">
  				<a href="<?= base_url('subagency') ?>" class="btn btn-danger m-2 w-100 text-white">Batal</a>
  			</div>
  			<div class="col-md-6">
  				<button type="button" class="btn btn-primary m-2 w-100" onclick="edit()">Simpan</button>
  			</div>
  		</div>
  	</div>
  </div>