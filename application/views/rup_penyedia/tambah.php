	<div class="preloader">
		<div class="loading">
			<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
		</div>
	</div>
	<div class="container">
		<br>
		<div style="text-align: center;">
			<h2>TAMBAH PAKET</h2>
		</div>
		<form action="#" method="POST" id="formData">
			<div class="card">
				<div class="card-body">
					<!-- tahun anggaran -->
					<div class="form-group row">
						<label for="tahun_anggaran" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Tahun Anggaran</label>
						<div class="col-sm-4 mb-5">
							<!--<input type="text" class="form-control form-control-sm" id="tahun_anggaran" placeholder="Tahun Anggaran" readonly value="<?= date('Y') ?>">-->
								<select name="id_tahun_anggaran" id="id_tahun_anggaran" class="form-control form-control-sm select2">
									<?php foreach ($tahun_anggaran as $key => $value) { ?>
										<option value="<?= $value['id_tahun_anggaran'] ?>"><?= $value['nama_tahun_anggaran'] ?></option>
									<?php  } ?>
								</select>
						</div>
						<label for="unit_kerja" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Unit</label>
						<div class="col-sm-4 mb-5">
							<?php if ($this->session->userdata('id_role') == 1) { ?>
								<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
									<?php foreach ($getdivisi as $key => $value) { ?>
										<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
									<?php  } ?>
								</select>
							<?php   } ?>
							<?php if ($this->session->userdata('id_role') == 2) { ?>
								<select name="id_unit_kerja" id="id_unit_kerja" class="form-control" readonly>
									<option value="<?= $this->session->userdata('id_unit_kerja2') ?>"><?= $this->session->userdata('nama_unit_kerja') ?></option>
								</select>
							<?php   } ?>
						</div>
						<label for="uni_kerja" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Lokasi Pekerjaan</label>
						<div class="col-sm-10">
							<div class="card card-primary">
								<div class="card-header text-center">
									<label>Lokasi Pekerjaan</label>
									<div class="card-tools">
										<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                           <i class="fas fa fa-plus"></i>
                        </button> -->
									</div>
								</div>

								<div style="overflow-x: auto;">
									<table class="table table-bordered table-striped" id="dynamic_field">
										<thead class="text-center">
											<tr>
												<th>Provinsi</th>
												<th>Kabupaten</th>
												<th>Detail Lokasi</th>
											</tr>
										</thead>
										<tbody class="text-center">
											<tr>

												<td> <select required name="id_provinsi[]" id="provinsitambah" class="form-control select2bs4">
														<option value="">--Provinsi--</option>
														<?php foreach ($provinsi as $key => $value) { ?>
															<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
														<?php  } ?>
													</select></td>
												<td> <select name="id_kabupaten[]" id="kabupatentambah" class="form-control select2bs4">
														<option value="">--Kabupaten--</option>
													</select></td>
												<td><input type="text" name="detail_lokasi[]" class="form-control form-control-sm"></td>
												<td><button type="button" name="add" id="add" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
											</tr>
										</tbody>
									</table>
									<!-- <div class="table" id="insert-lokasi"></div> -->
								</div>
								<!-- <input type="hidden" id="jumlah-lokasi" value="1"> -->
							</div>
							<!-- <div class="text-right">
                     <br>
                     <button type="button" class="btn btn-success" id="btn-tambah-lokasi">Tambah Lokasi</button>
                     <button type="button" class="btn btn-danger" id="btn-reset-lokasi">Reset Form</button><br><br>
                  </div> -->
						</div>
					</div>
					<!-- nama Paket -->
					<div class="form-group row">
						<label for="nama_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Nama Paket</label>
						<div class="col-sm-4 mb-5">
							<input type="text" name="nama_paket" id="nama_paket" class="form-control form-control-sm">
						</div>
						<label for="program_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Program</label>
						<div class="col-sm-4 mb-5">
							<input type="text" name="program_paket" class="form-control form-control-sm">
						</div>
						<label for="id_jenis_anggaran" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Jenis Anggaran</label>
						<div class="col-sm-4 mb-5">
							<select name="id_jenis_anggaran" id="id_jenis_anggaran" class="form-control select2">
								<option value="">--Pilih--</option>
								<?php foreach ($get_jenis_anggaran as $key => $value) { ?>
									<option value="<?= $value['id_jenis_anggaran'] ?>"><?= $value['nama_jenis_anggaran'] ?></option>
								<?php  } ?>
							</select>
						</div>
						<label for="sepesifikasi_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Spesifikasi Pekerjaan</label>
						<div class="col-sm-4">
							<input type="text" name="sepesifikasi_paket" class="form-control">
						</div>
						<label for="kualifikasi_usaha" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Kualifikasi Usaha</label>
						<div class="col-sm-4 mb-5">
							<select name="kualifikasi_usaha" class="form-control select2">
								<option value="">--Kualifikasi Usaha--</option>
								<option value="Kualifikasi Besar (B1)">Kualifikasi Besar (B1)</option>
								<option value="Kualifikasi Besar (B2)">Kualifikasi Besar (B2)</option>
								<option value="Kualifikasi Menengah (M1)">Kualifikasi Menengah (M1)</option>
								<option value="Kualifikasi Menengah (M2)">Kualifikasi Menengah (M2)</option>
								<option value="Kualifikasi Kecil (K1)">Kualifikasi Kecil (K1)</option>
								<option value="Kualifikasi Kecil (K2)">Kualifikasi Kecil (K2)</option>
								<option value="Kualifikasi Kecil (K3)">Kualifikasi Kecil (K3)</option>
							</select>
						</div>
						<label for="id_metode_pemilihan" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Metode Pemilihan</label>
						<div class="col-sm-4 mb-5">
							<select name="id_metode_pemilihan" id="id_metode_pemilihan" class="form-control select2">
								<option value="">--Pilih--</option>
								<?php foreach ($get_metode as $key => $value) { ?>
									<option value="<?= $value['id_metode_pemilihan'] ?>"><?= $value['nama_metode_pemilihan'] ?></option>
								<?php  } ?>
							</select>
							<select style="display: none;" name="id_kualifikasi" id="id_kualifikasi">
							</select>
						</div>
						<label for="id_jenis_pengadaan" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Jenis Pengadaan</label>
						<div class="col-sm-4 mb-5">
							<select name="id_jenis_pengadaan" id="id_jenis_pengadaan" class="form-control select2">
								<option value="">--Pilih--</option>
								<?php foreach ($get_jenis_pengadaan as $key => $value) { ?>
									<option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
								<?php  } ?>
							</select>
						</div>
						<label for="id_jenis_pengadaan" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Produk Dalam Negri</label>
						<div class="col-sm-4 mb-5">
							<select name="id_produk_dl_negri" id="id_produk_dl_negri" class="form-control select2">
								<option value="">--Pilih--</option>
								<?php foreach ($get_produk_dl_negri as $key => $value) { ?>
									<option value="<?= $value['id_produk_dl_negri'] ?>"><?= $value['keterangan'] ?></option>
								<?php  } ?>
							</select>
						</div>
						<label for="uraian_pekerjaan_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Uraian Pekerjaan</label>
						<div class="col-sm-10 mb-5">
							<textarea name="uraian_pekerjaan_paket" class="form-control form-control-sm"></textarea>
						</div>
						<label for="" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Tahun Jamak</label>
						<div class="col-sm-10 mb-5">
							<div class="form-inline">
								<input type="text" name="tahun_mulai_jamak" class="form-control datepicker2 tahun_jamak_mulai"> <label for="" class="pl-2 pr-2">S/D</label>
								<input type="text" name="tahun_selesai_jamak" class="form-control datepicker2 tahun_jamak_selesai">
							</div>
						</div>
						<label for="uni_kerja" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Sumber Dana</label>
						<div class="col-sm-10">
							<div class="card card-primary">
								<div class="card-header text-center">
									<label>Sumber Dana</label>
									<div class="card-tools">
										<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                           <i class="fas fa fa-plus"></i>
                        </button> -->
									</div>
								</div>

								<div style="overflow-x: auto;">
									<table class="table table-bordered table-striped" id="dynamic_field2">
										<thead class="text-center">
											<tr>
												<th>Asal Dana</th>
												<th>Hps</th>
												<th>Tahun Anggaran</th>
											</tr>
										</thead>
										<tbody class="text-center">
											<tr>
												<td><input type="text" name="asal_dana[]" value="BUMN" class="form-control form-control-sm" readonly></td>
												<td><input type="text" name="hps[]" id="harga_biasa" class="form-control form-control-sm"> <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah"></td>
												<td><input type="text" name="tahun_anggaran[]" id="tahun_anggaran" class="form-control form-control-sm"></td>
												<td><button type="button" name="add2" id="add2" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- jadwal_pemilihan -->

				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-md-6">
				<a href="<?= base_url('rup/rup_penyedia') ?>" class="btn btn-danger m-2 w-100 text-white">Batal</a>
			</div>
			<div class="col-md-6">
				<button type="button" id="simpan_rup_paket_new" class="btn btn-primary m-2 w-100" onclick="save()">Simpan</button>
			</div>
		</div>

	</div>
	<!--MODAL HAPUS-->
	<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
					<h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<input type="hidden" name="kode" id="textkode" value="">
						<div class="alert alert-warning">
							<p>Apakah Anda yakin mau memhapus barang ini?</p>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->
