  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Edit Panitia</a></li>
  	</ol>
  	<div class="content">
  		<section class="card" id="cardhide">
  			<div class="content tab-content">
  				<form action="<?= base_url('panitia/edit') ?>" method="post" class="formsimpan" id="fromedit">
  					<input type="hidden" value="<?= $panitia['id_panitia'] ?>" name="id_panitia" id="id_panitia">
  					<div class="pesan" style="display: none;"></div>
  					<table class="table table-bordered">
  						<tr>
  							<td class="bgwarning">Nama Panitia<span style="color: red;">*</span></td>
  							<td width="75%">
  								<input type="text" class="form-control form-control-sm" name="nama_panitia" id="nama_panitia" value="<?= $panitia['nama_panitia'] ?>">
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Nomor SK<span style="color: red;">*</span></td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="nomor_sk" id="nomor_sk" value="<?= $panitia['nomor_sk'] ?>">
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Tahun</td>
  							<td>
  								<input type="text" class="form-control form-control-sm" name="tahun" id="tahun" value="<?= $panitia['tahun'] ?>">
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Alamat Kantor</td>
  							<td>
  								<textarea name="alamat_kantor" id="alamat_kantor" class="form-control form-control-sm" rows="3"><?= $panitia['alamat_kantor'] ?></textarea>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning" width="150px">Provinsi</td>
  							<td>
  								<div class="row">
  									<div class="col-md-4">
  										<select name="id_provinsi" id="provinsi2" class="form-control select2">
  											<option value="<?= $panitia['id_provinsi'] ?>"><?= $panitia['nama_provinsi'] ?></option>
  											<?php foreach ($wilayah as $key => $value) { ?>
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
  										<select name="id_kabupaten" id="kabupaten2" class="form-control select2">
  											<option value="<?= $panitia['id_kabupaten'] ?>"><?= $panitia['nama_kabupaten'] ?></option>
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
  											<option value="<?= $panitia['id_area'] ?>"><?= $panitia['nama_area'] ?></option>
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
  										<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
  											<option value="<?= $panitia['id_unit_kerja'] ?>"><?= $panitia['nama_unit_kerja'] ?></option>
  											<?php foreach ($getdivisi as $key => $value) { ?>
  												<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
  											<?php  } ?>
  										</select>
  									</div>
  								</div>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Status</td>
  							<td>
  								<?php if ($panitia['status_panitia'] == NULL || $panitia['status_panitia'] == 0) { ?>
  									<label for="">Aktif</label>
  									<input type="radio" name="status_panitia" id="status_panitia" value="1">
  									<label for="" style="margin-left:30px">Tidak Aktif</label>
  									<input type="radio" name="status_panitia" id="status_panitia" value="0" checked>
  								<?php } else { ?>
  									<label for="">Aktif</label>
  									<input type="radio" name="status_panitia" id="status_panitia" value="1" checked>
  									<label for="" style="margin-left:30px">Tidak Aktif</label>
  									<input type="radio" name="status_panitia" id="status_panitia" value="0">
  								<?php } ?>
  							</td>
  						</tr>
  						<tr>
  							<td class="bgwarning">Jenis Panitia</td>
  							<td>
  								<?php if ($cek_panitia_status['status_penetapan_langsung'] == 1) { ?>
  									<label for="" class="badge badge-warning"> Panitia Penetapan Langsung</label>
  								<?php	} else if ($cek_panitia_status['status_penunjukan_langsung_panitia'] == 1) { ?>
  									<label for="" class="badge badge-success"> Panitia Penunjukan Langsung</label>
  								<?php 	} else if ($cek_panitia_status['status_tender_terbatas'] == 1) { ?>
  									<label for="" class="badge badge-danger">Panitia Tender Terbatas</label>
  								<?php } else { ?>
  									<label for="" class="badge badge-primary">Panitia Tender</label>
  								<?php  } ?>
  							</td>
  						</tr>
  					</table>

  					<button class="btn btn-sm btn-success" id="submited" hidden>Simpan</button>
  				</form>
  				<div class="content" style="margin-top: 20px;">


  					<?php if ($getRole == null) { ?>
  						<form action="#" method="post" id="formTambahAnggota">
  							<input type="hidden" value="<?= $panitia['id_panitia'] ?>" name="id_panitia">
  							<div class="container">
  								<table class="table" id="tbl_tambah_anggota">
  									<thead>
  										<tr>
  											<th width="10px">#</th>
  											<th width="10px">No</th>
  											<th width="250px">Nama Pegawai</th>
  											<th>User</th>
  											<th>Nip</th>
  										</tr>
  									</thead>
  									<!-- foreach Pegawi By Id Nama Pokja stst -->
  									<tbody>
  									</tbody>
  								</table>
  							</div>
  							<div class="bs-callout bs-callout-warning">
  								<p style="text-align: left"><span class="warning" style="color:red;">*</span>Data ini wajib diisi.
  							</div>
  							<button type="button" class="btn btn-sm btn-success" onclick="tambahanggota()">
  								Simpan
  							</button>
  						</form>
  					<?php } else { ?>
  						<div id="anggota">
  							<div style="overflow-x:auto">
  								<div class="container-fluid">
  									<table class="table" id="table_anggota" style="margin-top: 20px;">
  										<thead>
  											<tr>
  												<th width="10px">No</th>
  												<th>Nama Pegawai</th>
  												<th>Username</th>
  												<th>Nip</th>
  												<th>Jabatan Panitia</th>
  												<th>Aksi</th>
  											</tr>
  										</thead>
  										<input type="hidden" name="id_anggota_panitia" id="id_anggota_panitia" value="<?= $panitia['id_panitia'] ?>">

  										<tbody id="list_anggota_panitia">

  										</tbody>
  									</table>
  									<form action="" id="formAnggotaPanitia">
  										<input type="hidden" name="id_role_panitia" id="bijipeler" value="">
  										<input type="hidden" name="id_detail_panitia" id="id_detailnya" value="<?= $getRole['id_detail_panitia'] ?>">
  									</form>
  								</div>
  							</div>
  							<button type="button" class="btn btn-sm btn-primary tambah_pemilik">
  								<i class="fa fa-plus"></i>
  								Tambah Anggota
  							</button>
  							<div class="bs-callout bs-callout-warning">
  								<p style="text-align: left"><span class="warning" style="color:red;">*</span>Data ini wajib diisi.
  							</div>
  							<div class="form-group row">
  								<div class="col-10">
  									<a class="btn btn-sm btn-success" href="javascript:;" onclick="$('#submited').click()">Simpan</a>
  									<a class="btn btn-light btn-sm" href="<?= base_url('panitia'); ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>&nbsp;
  								</div>
  							</div>
  						</div>
  					<?php	} ?>
  				</div>
  				<div class="content" id="formpemilik">
  					<form action="#" method="post" id="formTambahAnggota">
  						<input type="hidden" value="<?= $panitia['id_panitia'] ?>" name="id_panitia">
  						<div class="container">
  							<table class="table" id="tbl_tambah_anggota">
  								<thead>
  									<tr>
  										<th width="10px">#</th>
  										<th width="10px">No</th>
  										<th width="250px">Nama Pegawai</th>
  										<th>User</th>
  										<th>Nip</th>
  									</tr>
  								</thead>
  								<!-- foreach Pegawi By Id Nama Pokja stst -->
  								<tbody>
  								</tbody>
  							</table>
  						</div>
  						<button type="button" class="btn btn-sm btn-success" onclick="tambahanggota()">
  							Simpan
  						</button>
  						<button type="button" class="btn btn-sm btn-secondary" onclick="kembali5()">Kembali</button>
  					</form>
  				</div>
  			</div>
  		</section>
  	</div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header bg-primary">
  				<h5 class="modal-title text-white" id="exampleModalLabel">Edit Role Panitia</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<form action="#" id="formEditRole">
  				<div class="modal-body">
  					<div class="form-group">
  						<input type="hidden" name="id_detail_panitia">
  						<input type="hidden" value="<?= $panitia['id_panitia'] ?>" name="id_panitia">
  						<label for="">Username</label>
  						<input type="text" class="form-control" id="username" name="username" readonly>
  						<br>
  						<label for="">Nama Pegawai</label>
  						<input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" readonly>
  						<br>
  						<label for="">Role Panitia</label>
  						<select name="id_role_panitia" id="id_role_panitia" class="form-control">
  							<?php foreach ($role as $data) { ?>
  								<option value="<?= $data['id_role_panitia'] ?>"><?= $data['nama_role_panitia'] ?></option>
  							<?php } ?>
  						</select>
  						<p class="id_role_validasi-error text-danger"></p>
  					</div>

  				</div>
  				<div class="modal-footer">
  					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
  					<button type="button" class="btn btn-success" id="reload_langsung" onclick="editRole()">Simpan</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
