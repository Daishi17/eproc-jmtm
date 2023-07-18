<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div class="container">
	<br>
	<ol class="breadcrumb" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
		<li><a style="text-decoration: none; color:black;" href="#">Tambah Manager</a></li>
	</ol>
	<div class="content">
		<div style="overflow-x: auto;">
			<form action="#" id="formData">
				<table class="table">
					<tr>
						<th align="right" width=20%>Nama Manager<span style="color:red">*</span></th>
						<td colspan="3"> <input type="text" name="nama_pegawai" class="form-control form-control-sm" placeholder="Nama Manager">
							<p class="nama_pegawai-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right" width=20%>NIP<span style="color:red">*</span></th>
						<td colspan="3"> <input type="text" name="nip" class="form-control form-control-sm" placeholder="NIP">
							<p class="nip-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right">Unit <span style="color:red">*</span></th>
						<td colspan="3"> <select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
								<?php foreach ($getdivisi as $key => $value) { ?>
									<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?> </option>
								<?php   } ?>
							</select>
							<p class="id_area-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right">Provinsi <span style="color:red">*</span></th>
						<td><select name="id_provinsi" id="provinsi" class="form-control select2">
								<option value="">--Provinsi--</option>
								<?php foreach ($provinsi as $key => $value) { ?>
									<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
								<?php  } ?>
							</select>
							<p class="id_provinsi-error text-danger"></p>
						</td>
						<th align="right">Kabupaten / Kota <span style="color:red">*</span></th>
						<td> <select name="id_kabupaten" id="kabupaten" class="form-control select2">
								<option value="">--Kabupaten--</option>
							</select>
							<br>
							(kabupaten / kota akan muncul sesuai provinsi yang dipilih)
							<p class="id_kabupaten-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right">Alamat <span style="color:red">*</span></th>
						<td colspan="3"> <textarea name="alamat" class="form-control"></textarea>
							<p class="alamat-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right">Telepon <span style="color:red">*</span></th>
						<td colspan="3"> <input type="text" name="telepon" id="teleponku" class="form-control form-control-sm col-md-4" placeholder="No.telepon">
							<p class="telepon-error text-danger"></p><small class="text-danger"> <i> <b> Jangan Memasukan Angka (Nol / 0) ex: 08978201075 Pada Awal Nomor, Berpengaruh Pada Notifikasi Whatsaap & Email !!</b></i></small>
							<br><small class="text-success"> <i> <b> Pengisiaan Yang Tepat : 8978201075 </b></i></small>
						</td>
					</tr>
					<tr>
						<th align="right" width=20%>Email<span style="color:red">*</span></th>
						<td colspan="3"> <input type="email" name="email" class="form-control form-control-sm col-md-6" placeholder="Email">
							<p class="email-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right">Username<span style="color:red">*</span></th>
						<td colspan="5"> <input type="text" name="username" class="form-control form-control-sm col-md-4" placeholder="Username">
							<p class="username-error text-danger"></p>
						</td>
					</tr>
					<tr>
						<th align="right">Password<span style="color:red">*</span></th>
						<td colspan="5"> <input type="password" name="password" class="form-control form-control-sm col-md-4" placeholder="Password">
							<p class="password-error text-danger"></p>
						</td>
					</tr>
					<!-- <tr>
						<th align="right">Penangung Jawab <span style="color:red">*</span></th>
						<td colspan="3"><select name="id_pegawai" id="id_pegawai" class="form-control form-control-sm col-md-3 select2">
								<?php foreach ($pegawai as $key => $value) { ?>
									<option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?></option>
								<?php   } ?>
							</select>
							<p class="id_pegawai-error text-danger"></p>
						</td>
					</tr> -->
					<tr>
						<th align="right">Nomor Surat Kerja <span style="color:red">*</span></th>
						<td colspan="5">
							<input type="text" name="no_sk" class="form-control form-control-sm col-md-4" placeholder="Nomor SK">
							<p class="no_sk-error text-danger"></p>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="bs-callout-info mb-3">Yang Diberikan <span style="color:red">*</span> <span style="color:red">(Bintang Merah) </span>Wajib Diisi !!</div>
		<div class="row">
			<div class="col-md-6">
				<a href="<?= base_url('manager') ?>" class="btn btn-danger m-2 w-100 text-white">Batal</a>
			</div>
			<div class="col-md-6">
				<button type="button" class="btn btn-primary m-2 w-100" onclick="save()">Simpan</button>
			</div>
		</div>
	</div>
</div>