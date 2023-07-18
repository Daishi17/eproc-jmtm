<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<input type="hidden" id="id_vendor_reusable" value="<?= $vendor['id_vendor'] ?>" name="id_vendor">
<div class="container">
	<br>
	<br>
	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
		<li><a style="text-decoration: none; color:white;" href="#">Detail Vendor </a></li>

	</ol>
	<div class="content">
		<?= $this->session->flashdata('message'); ?>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link text-white active bg-info" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Identitas Perusahaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link bg-info text-white" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Verifikasi Dokumen Persyaratan Vendor Management System</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<section class="card" id="cardhide">
					<div class="content tab-content">
						<form Aksi="<?= base_url('tender/simpan') ?>" method="post" accept-charset="utf-8" enctype="application/x-www-form-urlencoded" id="formTambahPaket">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-bordered">
											<div class="row">
												<div class="col-md-6">
													<tr>
														<td class="bgwarning" width="250px">Bentuk Usaha</td>
														<td>
															<?= $vendor['bentuk_usaha'] ?>
														</td>
													</tr>
													<tr>
														<td class="bgwarning" width="250px">Nama Badan Usaha</td>
														<td>
															<?= $vendor['nama_usaha'] ?>
														</td>
													</tr>
													<tr>
														<td class="bgwarning">Username Vendor</td>
														<td>
															<?= $vendor['username_vendor'] ?>
														</td>
													</tr>
													<tr>
														<td class="bgwarning">NIB</td>
														<td>
															<?= $vendor['nib'] ?>
														</td>
													</tr>

													<tr>
														<td class="bgwarning">Alamat</td>
														<td>
															<?= $vendor['alamat_usaha'] ?>
														</td>
													</tr>
													<tr>
														<td class="bgwarning">Kode Pos</td>
														<td>
															<?= $vendor['kode_pos_usaha'] ?>
														</td>
													</tr>
													<tr>
														<td class="bgwarning">Kantor Cabang</td>
														<td>
															<?php if ($vendor['kantor_cabang_usaha'] == 0) { ?>
																Tidak
															<?php } else if ($vendor['kantor_cabang_usaha'] == 1) { ?>
																Ya
															<?php } ?>
														</td>
													</tr>
												</div>
											</div>
										</table>
									</div>
									<div class="col-md-6">
										<table class="table table-bordered">
											<tr>
												<td class="bgwarning">NPWP</td>
												<td>
													<?= $vendor['npwp_usaha'] ?>
												</td>
											</tr>
											<tr>
												<td class="bgwarning">Email</td>
												<td>
													<?= $vendor['email_vendor'] ?>
												</td>
											</tr>
											<tr>
												<td class="bgwarning">No. Telpon</td>
												<td>
													<?= $vendor['telpon_usaha'] ?>
												</td>
											</tr>
											<tr>
												<td class="bgwarning">Provinsi</td>
												<td>
													<?= $vendor['nama_provinsi'] ?>
												</td>
											</tr>
											<tr>
												<td class="bgwarning">Kabupaten</td>
												<td>
													<?= $vendor['nama_kabupaten'] ?>
												</td>
											</tr>
											<tr>
												<td class="bgwarning">Area</td>
												<td>
													<?= $vendor['nama_area'] ?>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<?php if ($vendor['status_daftar_hitam_vendor'] == NULL || $vendor['status_daftar_hitam_vendor'] == 0) { ?>

								<?php } else { ?>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-bordered">
												<tr>
													<td style="width: 35%;">Masa Berlaku Daftar Hitam</td>
													<td class="text-danger"><b><?= date('d-m-Y', strtotime($vendor['masa_berlaku_daftar_hitam_mulai'])) ?> s/d <?= date('d-m-Y', strtotime($vendor['masa_berlaku_daftar_hitam_selesai'])) ?></b></td>
												</tr>
												<tr>
													<td>Alasan Daftar Hitam</td>
													<td class="text-danger"><b> <?= $vendor['alasan_daftar_hitam'] ?></b></td>
												</tr>
											</table>
										</div>
									</div>
								<?php } ?>

							</div>
							<div class="form-group row">
								<div class="col-10">
									<a class="btn btn-secondary btn-sm" href="<?= site_url('index.php/vendor'); ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>&nbsp;
								</div>
							</div>
						</form>

					</div>
				</section>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<section class="card">
					<div class="content tab-content">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item active">
								<a class="nav-link bg-info text-white ijin-usaha" id="ijin-usaha" data-toggle="tab" href="#ijinusaha1" role="tab" aria-controls="ijinusaha-tab" aria-selected="false">Ijin Usaha</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info akta text-white " id="message-tab" data-toggle="tab" href="#akta1" role="tab" aria-controls="messages" aria-selected="false">Akta</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white pemilik" id="messages-tab" data-toggle="tab" href="#pemilik1" role="tab" aria-controls="messages" aria-selected="false">Pemilik</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white pengurus" id="messages-tab" data-toggle="tab" href="#pengurus1" role="tab" aria-controls="messages" aria-selected="false">Pengurus</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white  tenaga-ahli" id="messages-tab" data-toggle="tab" href="#tenaga-ahli" role="tab" aria-controls="messages" aria-selected="false">Tenaga Ahli</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white  peralatan" id="messages-tab" data-toggle="tab" href="#peralatan1" role="tab" aria-controls="messages" aria-selected="false">Peralatan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white  pengalaman" id="messages-tab" data-toggle="tab" href="#pengalaman1" role="tab" aria-controls="messages" aria-selected="false">Pengalaman</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white  pajak" id="messages-tab" data-toggle="tab" href="#pajak1" role="tab" aria-controls="messages" aria-selected="false">Pajak</a>
							</li>
							<li class="nav-item">
								<a class="nav-link bg-info text-white  keuangan" id="messages-tab" data-toggle="tab" href="#keuangan1" role="tab" aria-controls="messages" aria-selected="false">Neraca Keuangan</a>
							</li>
							<?php $i = 1;
							foreach ($persyaratan_vms as $key => $value) { ?>
								<li class="nav-item">
									<a class="nav-link bg-info text-white" id="messages-tab" data-toggle="tab" href="#persyaratan_vms<?= $i++ ?>" role="tab" aria-controls="messages" aria-selected="false"><?= $value['nama_persyaratan_vms'] ?></a>
								</li>
							<?php } ?>
						</ul>

						<div class="tab-content">
							<!-- ijin usaha -->
							<div class="tab-pane fade show active" id="ijinusaha1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div id="ijinusaha">
										<div style="overflow-x:auto">
											<table id="dattable_izin_usaha" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Izin Usaha</th>
														<th>Nomor Surat</th>
														<th>Berlaku Sampai</th>
														<th>Instansi Pemberi</th>
														<th>Kualifikasi</th>
														<th>Dokumen Izin Usaha</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- akta -->
							<div class="tab-pane fade" id="akta1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x:auto">
										<table id="dattable_akta" class="table table-bordered">
											<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
												<tr>
													<th>NO</th>
													<th>No Akta Pendirian</th>
													<th>Tanggal Surat Akta Pendirian</th>
													<th>Notaris</th>
													<th>Dokumen Akta Pendirian</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>

							<!-- pemilik -->
							<div class="tab-pane fade" id="pemilik1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x:auto">
										<table id="dattable_pemilik" class="table table-bordered">
											<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
												<tr>
													<th>NO</th>
													<th>Nama Pemilik</th>
													<th>No KTP</th>
													<th>Alamat</th>
													<th>Saham</th>
													<th>Bukti</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- pengurus -->
							<div class="tab-pane fade" id="pengurus1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x:auto">
										<table id="dattable_pengurus" class="table table-bordered">
											<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
												<tr>
													<th>NO</th>
													<th>Nama Pengurus</th>
													<th>No KTP</th>
													<th>Alamat</th>
													<th>Jabatan</th>
													<th>Mulai</th>
													<th>Selesai</th>
													<th>Bukti</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>

							<!-- Tenaga Ahli -->
							<div class="tab-pane fade" id="tenaga-ahli" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<div id="tenagaAhli">
										<br>
										<div style="overflow-x:auto;">
											<table id="dattable_tenaga_ahli" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Tanggal Lahir</th>
														<th>Alamat</th>
														<th>Pendidikan Terakhir</th>
														<th>Profesi/Keahlian</th>
														<th>Jabatan</th>
														<th>Pengalaman Kerja(Tahun)</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
									<div class="content" id="formTenagaAhli">
										<form Aksi="#" id="form_tenaga_ahli_add" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Nama<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<input type="text" name="nama_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Tanggal Lahir<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<input type="date" name="tanggal_lahir_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Alamat<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<textarea name="alamat_tenaga_ahli" id="" cols="32" rows="2"></textarea>
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Pendidikan Terakhir<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<input type="text" name="pendidikan_trakhir_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Email</label>
														<div class="col-md-7">
															<input type="text" name="email_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Profesi/Keahlian<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<textarea name="profesi_tenaga_ahli" id="" cols="32" rows="2"></textarea>
															<div class="invalid-feedback"></div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Jenis Kelamin<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" value="Laki-Laki" id="rkn_statcabang_no" name="jenis_kelamin_tenaga_ahli" checked="checked" onClick="$('#pusat').hide();" />
																<label class="form-check-label" for="rkn_statcabang_no">Pria</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" value="Perempuan" id="rkn_statcabang_yes" name="jenis_kelamin_tenaga_ahli" onClick="$('#pusat').show();" />
																<label class="form-check-label" for="rkn_statcabang_yes">Wanita</label>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Kewarganegaraan</label>
														<div class="col-md-7">
															<input type="text" name="kewarganegaraan_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Pengalaman Kerja(Tahun)<span class="warning" style="color:red">*</span></label>
														<div class="col-md-2">
															<input type="text" name="pengalaman_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Status Kepegawaian<span class="warning" style="color:red">*</span></label>
														<div class="col-md-7">
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" value="Tetap" id="rkn_statcabang_no" name="status_kepegawaian_tenaga_ahli" checked="checked" onClick="$('#pusat').hide();" />
																<label class="form-check-label" for="rkn_statcabang_no">Tetap</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" value="Tidak Tetap" id="rkn_statcabang_yes" name="status_kepegawaian_tenaga_ahli" onClick="$('#pusat').show();" />
																<label class="form-check-label" for="rkn_statcabang_yes">Tidak Tetap</label>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 col-form-label" style="text-align: right;">Jabatan</label>
														<div class="col-md-7">
															<input type="text" name="jabatan_tenaga_ahli" class="form-control">
															<div class="invalid-feedback"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="container">
												<h6>Curiculum Vitae (CV)</h6>
												<div class="card" style="margin-top: 15px;">
													<h5 class="card-header">Pengalaman</h5>
													<div class="card-body">
														<table class="table" id="dynamic_field1">
															<tr>
																<th width="110px">Tahun</th>
																<th width="1000px">Uraian</th>
																<th></th>
															</tr>
															<tr>
																<td><input class="form-control" name="tahun_cv[]" id="tahun_cv" type="date"></td>
																<td><textarea class="form-control" name="uraian_cv[]" id="uraian_cv"></textarea></td>
																<td><button type="button" name="add_cv" id="add_cv" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</table>
													</div>
												</div>
												<div class="card" style="margin-top: 15px;">
													<h5 class="card-header">Pendidikan</h5>
													<div class="card-body">
														<table class="table" id="dynamic_field2">
															<tr>
																<th width="110px">Tahun</th>
																<th width="1000px">Uraian</th>
																<th></th>
															</tr>
															<tr>
																<td><input class="form-control" name="tahun_pendidikan[]" id="tahun_pendidikan" type="date"></td>
																<td><textarea class="form-control" name="uraian_pendidikan[]" id="uraian_pendidikan"></textarea></td>
																<td><button type="button" name="add_pendidikan" id="add_pendidikan" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</table>
													</div>
												</div>
												<div class="card" style="margin-top: 15px;">
													<h5 class="card-header">Sertifikat</h5>
													<div class="card-body">
														<table class="table" id="dynamic_field3">
															<tr>
																<th width="110px">Tahun</th>
																<th width="1000px">Uraian</th>
																<th></th>
															</tr>
															<tr>
																<td><input class="form-control" name="tahun_sertifikat[]" id="tahun_sertifikat" type="date"></td>
																<td><textarea class="form-control" name="uraian_sertifikat[]" id="uraian_sertifikat"></textarea></td>
																<td><button type="button" name="add_sertifikat" id="add_sertifikat" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</table>
													</div>
												</div>
												<div class="card" style="margin-top: 15px;">
													<h5 class="card-header">Bahasa</h5>
													<div class="card-body">
														<table class="table" id="dynamic_field4">
															<tr>
																<th width="1000px">Uraian</th>
																<th></th>
																<th></th>
															</tr>
															<tr>
																<td><textarea class="form-control" name="uraian_bahasa[]" id="uraian_bahasa"></textarea></td>
																<td><button type="button" name="add_bahasa" id="add_bahasa" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button></td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</table>
													</div>
												</div>
												<div style="margin-top: 20px;">
													<button type="submit" name="upload" id="upload" class="btn btn-success">
														<i class="fa fa-save"></i>
														Simpan</button>
													<button type="button" class="btn btn-secondary" onclick="kembali()">
														<i class="fa fa-arrow-circle-left"></i>
														Kembali</button>
													<div class="bs-callout bs-callout-warning">
														<p style="text-align: left">
															<span class="warning" style="color:red;">*</span>Data ini wajib diisi.<br>
															<span class="warning" style="color:red">**</span>Isi dengan tangga terakhir menjadi pengurus perusahaan. Kosongkan jika masih menjabat
														</p>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<!-- peralatan -->
							<div class="tab-pane fade" id="peralatan1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">

									<br>
									<div style="overflow-x: auto;">
										<div id="peralatan">
											<table id="dattable_peralatan" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>No</th>
														<th>Nama Alat</th>
														<th>Jumlah</th>
														<th>Kapasitas</th>
														<th>Merk/Tipe</th>
														<th>Kondisi</th>
														<th>Tahun Pembuatan</th>
														<th>Lokasi Sekarang</th>
														<th>Bukti Kepemilikan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="content" id="formPeralatan">
									<form Aksi="">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Nama Alat<span class="warning" style="color:red">*</span></label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Jumlah<span class="warning" style="color:red">*</span></label>
													<div class="col-md-1">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Kapasitas</label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Mark/Tipe</label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Tahun Pembuatan<span class="warning" style="color:red">*</span></label>
													<div class="col-md-1">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Kondisi<span class="warning" style="color:red">*</span></label>
													<div class="col-md-1">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" value="P" id="rkn_statcabang_no" name="rekanan.rkn_statcabang" checked="checked" onClick="$('#pusat').hide();" />
															<label class="form-check-label" for="rkn_statcabang_no">Baik</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" value="C" id="rkn_statcabang_yes" name="rekanan.rkn_statcabang" onClick="$('#pusat').show();" />
															<label class="form-check-label" for="rkn_statcabang_yes">Rusak</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Lokasi Sekarang</label>
													<div class="col-md-1">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Status Kepemilikan</label>
													<div class="col-md-9">
														<select name="" id="" class="form-control">
															<option value="">Milik Sendiri</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Mark/Tipe</label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
											</div>
											<div style="margin-left: 210px">
												<button type="button" class="btn btn-secondary" onclick="kembali2()"><i class="fa fa-backspace"></i> Kembali</button>
												<button type="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
											</div>
										</div>
									</form>
									<div class="bs-callout bs-callout-warning">
										<p style="text-align: left">
											<span class="warning" style="color:red;">*</span>Data ini wajib diisi.
										</p>
									</div>
								</div>
							</div>

							<!-- Pengalaman -->
							<div class="tab-pane fade" id="pengalaman1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pengalaman">
											<table id="dattable_pengalaman" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Pekerjaan</th>
														<th>Lokasi</th>
														<th>Instantsi Pemberi Tugas</th>
														<th>Alamat</th>
														<th>Tanggal Kontrak</th>
														<th>Selesai Kontrak</th>
														<th>Bukti Pengalaman</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="content" id="formPengalaman">
									<form Aksi="">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Nama Kontrak<span class="warning" style="color:red">*</span></label>
													<div class="col-md-10">
														<textarea name="" id="" class="form-control"></textarea>
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Lokasi<span class="warning" style="color:red">*</span></label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Instansi<span class="warning" style="color:red">*</span></label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Alamat</label>
													<div class="col-md-9">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Telepon</label>
													<div class="col-md-4">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Nomor Kontrak</label>
													<div class="col-md-4">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
													<label class="col-md-2 col-form-label" style="text-align: right;">Nilai Kontrak<span class="warning" style="color:red">*</span></label>
													<div class="col-md-4">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Tanggal Pelaksanaan</label>
													<div class="col-md-4">
														<input type="date" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
													<label class="col-md-2 col-form-label" style="text-align: right;">Persentase Pelaksaan</label>
													<div class="col-md-4">
														<input type="text" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Selesai Kontrak</label>
													<div class="col-md-4">
														<input type="date" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
													<label class="col-md-2 col-form-label" style="text-align: right;">Tanggal Serah Terima</label>
													<div class="col-md-4">
														<input type="date" class="form-control">
														<div class="invalid-feedback"></div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-md-2 col-form-label" style="text-align: right;">Keterangan<span class="warning" style="color:red">*</span></label>
													<div class="col-md-10">
														<textarea name="" id="" class="form-control"></textarea>
														<div class="invalid-feedback"></div>
													</div>
												</div>
											</div>
											<div style="margin-left: 210px">
												<button type="button" class="btn btn-secondary" onclick="kembali3()"><i class="fa fa-backspace"></i> Kembali</button>
												<button type="button" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
											</div>
										</div>
									</form>
									<div class="bs-callout bs-callout-warning">
										<p style="text-align: left">
											<span class="warning" style="color:red;">*</span>Data ini wajib diisi.<br>
											<span class="warning" style="color:red;">**</span>Jika persentase pelaksanaan bernilai kurang dari 100 maka sistem akan menganggap sebagai pekerjaan sedang berlajan.
										</p>
									</div>
								</div>
							</div>

							<!-- Pajak -->
							<div class="tab-pane fade" id="pajak1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="dattable_pajak" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Pajak</th>
														<th>Tanggal</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- Keuangan -->
							<div class="tab-pane fade" id="keuangan1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="datatable_keuangan" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Tahun Audit</th>
														<th>Status Audit</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- NIB -->
							<div class="tab-pane fade" id="persyaratan_vms1" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content" style="margin-top: 20px;">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_nib" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Nomor NIB</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- TDP -->
							<div class="tab-pane fade" id="persyaratan_vms2" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<table id="table_tdp" class="table table-bordered">
											<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
												<tr>
													<th>NO</th>
													<th>Masa Berlaku</th>
													<th>Bukti</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>

							<!-- SIUP -->
							<div class="tab-pane fade" id="persyaratan_vms3" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_siup" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- NPWP -->
							<div class="tab-pane fade" id="persyaratan_vms4" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_npwp" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>NPWP</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- SKPKP -->
							<div class="tab-pane fade" id="persyaratan_vms5" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_skpkp" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- SPPT -->
							<div class="tab-pane fade" id="persyaratan_vms6" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_sppt" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- SIUJK -->
							<div class="tab-pane fade" id="persyaratan_vms7" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_siujk" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- KTP VMS -->
							<div class="tab-pane fade" id="persyaratan_vms8" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_ktp" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>No. Ktp </th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- SBU-->
							<div class="tab-pane fade" id="persyaratan_vms9" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="table_sbu" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- SURAT KETERANGAN DOMISILI -->
							<div class="tab-pane fade" id="persyaratan_vms10" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="tbl_domisili" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- BAGAN STRUKTUR ORGANISASI -->
							<div class="tab-pane fade" id="persyaratan_vms11" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="tbl_bagan" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- BPJS KETENAGA KERJAAN -->
							<div class="tab-pane fade" id="persyaratan_vms12" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="tbl_bpjs_ketenagakerjaan" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- BPJS KESEHATAN -->
							<div class="tab-pane fade" id="persyaratan_vms13" role="tabpanel" aria-labelledby="profile-tab">
								<div class="content">
									<br>
									<div style="overflow-x: auto;">
										<div id="pajak">
											<table id="tbl_bpjs_sehatan" class="table table-bordered">
												<thead style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
													<tr>
														<th>NO</th>
														<th>Masa Berlaku</th>
														<th>Bukti</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

	</div>
</div>

<!-- TEMPAT PARA MODAL!!! -->

<!-- MODAL IZIN USAHA -->
<div class="modal fade" id="modalIzinUsahaSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_izin_usaha_sesuai">
				<input type="hidden" name="id_izin_usaha">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalIzinUsahaTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_izin_usaha_tidak_sesuai">
				<input type="hidden" name="id_izin_usaha">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL IZIN USAHA -->

<!-- MODAL AKTA USAHA -->
<div class="modal fade" id="modalIzinAktaSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_akta_sesuai">
				<input type="hidden" name="id_akta_pendirian">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalIzinAktaTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_akta_tidak_sesuai">
				<input type="hidden" name="id_akta_pendirian">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL AKTA USAHA -->


<!-- MODAL PEMILIK USAHA -->
<div class="modal fade" id="modalIzinPemilikSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pemilik_sesuai">
				<input type="hidden" name="id_pemilik">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalIzinPemilikTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pemilik_tidak_sesuai">
				<input type="hidden" name="id_pemilik">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL PEMILIK USAHA -->

<!-- MODAL PENGURUS USAHA -->
<div class="modal fade" id="modalIzinPengurusSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pengurus_sesuai">
				<input type="hidden" name="id_pengurus">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalIzinPengurusTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pengurus_tidak_sesuai">
				<input type="hidden" name="id_pengurus">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL PENGURUS USAHA -->

<!-- MODAL TENAGA AHLI USAHA -->
<div class="modal fade" id="modalIzintTenagaAhliSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_tenaga_ahli_sesuai">
				<input type="hidden" name="id_tenaga_ahli">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalIzintTenagaAhliTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_tenaga_ahli_tidak_sesuai">
				<input type="hidden" name="id_tenaga_ahli">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL TENAGA AHLI USAHA -->

<!-- MODAL TENAGA PERALATAN USAHA -->
<div class="modal fade" id="modalPeralatanSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_peralatan_sesuai1">
				<input type="hidden" name="id_peralatan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPeralatanTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_peralatan_tidak_sesuai">
				<input type="hidden" name="id_peralatan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL TENAGA PERALATAN USAHA -->

<!-- MODAL TENAGA PENGALAMAN USAHA -->
<div class="modal fade" id="modalPengalamanSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pengalaman_sesuai">
				<input type="hidden" name="id_pengalaman">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPengalamanTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pengalaman_tidak_sesuai">
				<input type="hidden" name="id_pengalaman">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL TENAGA PENGALAMAN USAHA -->

<!-- MODAL PAJAK USAHA -->
<div class="modal fade" id="modalPajakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pajak_sesuai">
				<input type="hidden" name="id_pajak">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPajakTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_pajak_tidak_sesuai">
				<input type="hidden" name="id_pajak">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL PAJAK USAHA -->


<!-- MODAL PAJAK USAHA -->
<div class="modal fade" id="modalNeracaKeuanganSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_neraca_keuangan_sesuai">
				<input type="hidden" name="id_keuangan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalNeracaKeuanganTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_neraca_keuangan_tidak_sesuai">
				<input type="hidden" name="id_keuangan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL PAJAK USAHA -->

<!-- MODAL NIB USAHA -->
<div class="modal fade" id="modalNibSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_nib_sesuai">
				<input type="hidden" name="id_nib">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalNibTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_nib_tidak_sesuai">
				<input type="hidden" name="id_nib">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL NIB USAHA -->

<!-- MODAL TDP USAHA -->
<div class="modal fade" id="modalTdpSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_tdp_sesuai">
				<input type="hidden" name="id_tdp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTdpTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_tdp_tidak_sesuai">
				<input type="hidden" name="id_tdp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL TDP USAHA -->

<!-- MODAL SIUP USAHA -->
<div class="modal fade" id="modalsiupSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_siup_sesuai">
				<input type="hidden" name="id_siup">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalsiupTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_siup_tidak_sesuai">
				<input type="hidden" name="id_siup">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL SIUP USAHA -->


<!-- MODAL NPWP USAHA -->
<div class="modal fade" id="modalnpwpSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_npwp_sesuai">
				<input type="hidden" name="id_npwp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalnpwpTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_npwp_tidak_sesuai">
				<input type="hidden" name="id_npwp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL NPWP USAHA -->


<!-- MODAL SKPKP USAHA -->
<div class="modal fade" id="modalskpkpSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_skpkp_sesuai">
				<input type="hidden" name="id_skpkp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalskpkpTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_skpkp_tidak_sesuai">
				<input type="hidden" name="id_skpkp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL SKPKP USAHA -->

<!-- MODAL SPPT USAHA -->
<div class="modal fade" id="modalspptSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_sppt_sesuai">
				<input type="hidden" name="id_sppt">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalspptTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_sppt_tidak_sesuai">
				<input type="hidden" name="id_sppt">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL SPPT USAHA -->

<!-- MODAL SIUJK USAHA -->
<div class="modal fade" id="modalsiujkSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_siujk_sesuai">
				<input type="hidden" name="id_siujk">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalsiujkTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_siujk_tidak_sesuai">
				<input type="hidden" name="id_siujk">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL SIUJK USAHA -->

<!-- MODAL KTP USAHA -->
<div class="modal fade" id="modalktpSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_ktp_sesuai">
				<input type="hidden" name="id_ktp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalktpTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_ktp_tidak_sesuai">
				<input type="hidden" name="id_ktp">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL KTP USAHA -->

<!-- MODAL SBU USAHA -->
<div class="modal fade" id="modalsbuSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_sbu_sesuai">
				<input type="hidden" name="id_sbu">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalsbuTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_sbu_tidak_sesuai">
				<input type="hidden" name="id_sbu">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL SBU USAHA -->

<!-- MODAL SBU USAHA -->
<div class="modal fade" id="modaldomisiliSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_domisili_sesuai">
				<input type="hidden" name="id_domisili">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modaldomisiliTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_domisili_tidak_sesuai">
				<input type="hidden" name="id_domisili">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL SBU USAHA -->

<!-- MODAL BAGAN USAHA -->
<div class="modal fade" id="modalbaganSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_bagan_sesuai">
				<input type="hidden" name="id_bagan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalbaganTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_bagan_tidak_sesuai">
				<input type="hidden" name="id_bagan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL BAGAN USAHA -->

<!-- MODAL KETENAGAKERJAAN USAHA -->
<div class="modal fade" id="modalbpjs_ketenagakerjaanSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_bpjs_ketenagakerjaan_sesuai">
				<input type="hidden" name="id_bpjs_ketenagakerjaan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalbpjs_ketenagakerjaanTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_bpjs_ketenagakerjaan_tidak_sesuai">
				<input type="hidden" name="id_bpjs_ketenagakerjaan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL KETENAGAKERJAAN USAHA -->

<!-- MODAL kesehatan USAHA -->
<div class="modal fade" id="modalbpjs_kesehatanSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_bpjs_kesehatan_sesuai">
				<input type="hidden" name="id_bpjs_kesehatan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalbpjs_kesehatanTidakSesuai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_approve_bpjs_kesehatan_tidak_sesuai">
				<input type="hidden" name="id_bpjs_kesehatan">
				<div class="modal-header">
					<h5 class="modal-title" id="modalIzinUsahaTitle">Alasan Tidak Sesuai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea name="alasan" id="alasan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MODAL kesehatan USAHA -->
