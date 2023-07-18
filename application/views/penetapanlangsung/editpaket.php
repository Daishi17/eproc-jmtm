  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<div style="text-align: center;">
  		<h2>TAMBAH PAKET</h2>
  		<div class="row">
  			<div class="col-md-5">
  				<hr>
  			</div>
  			<div class="btn btn-sm btn-primary col-md-2">Adding</div>
  			<div class="col-md-4">
  				<hr>
  			</div>
  		</div>
  	</div>
  	<form action="#" method="POST" id="formDataEditRup">
  		<input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>">
  		<div class="card">
  			<div class="card-body">
  				<!-- tahun anggaran -->
  				<div class="form-group row">
  					<label for="tahun_anggaran" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Tahun Anggaran</label>
  					<div class="col-sm-4  mb-5">
  						<input type="text" class="form-control form-control-sm " id="tahun_anggaran" placeholder="Tahun Anggaran" readonly value="<?= date('Y') ?>">
  					</div>
  					<label for="id_unit_kerja" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Unit</label>
  					<div class="col-sm-4 mb-5">
  						<?php if ($this->session->userdata('id_role') == 1) { ?>

  							<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
  								<option value="<?= $angga['id_unit_kerja'] ?>"><?= $angga['nama_unit_kerja'] ?></option>
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
  						<?php if ($this->session->userdata('id_role') == 6) { ?>

  							<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
  								<option value="<?= $angga['id_unit_kerja'] ?>"><?= $angga['nama_unit_kerja'] ?></option>
  								<?php foreach ($getdivisi as $key => $value) { ?>
  									<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
  								<?php  } ?>
  							</select>
  						<?php   } ?>
  						<p class="id_unit_kerja-error text-danger"></p>
  					</div>
  					<!-- lokasi pekerjaan -->
  					<label for="" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Lokasi Pekerjaan</label>
  					<div class="col-sm-10">
  						<div class="card card-primary">
  							<div class="card-header text-center">
  								<div class="card-tools">
  									<label>Lokasi Pekerjaan</label>
  									<button type="button" class="float-right btn btn-primary mt-3 mb-2 btn-sm" onclick="add_lokasi_pekerjaan()">
  										<i class="fas fa fa-plus"></i> Lokasi
  									</button>
  								</div>
  							</div>

  							<div style="overflow-x: auto;" class="p-4">
  								<table id="lokasi_kerja" class="table table-bordered table-striped">
  									<thead class="text-center">
  										<tr>
  											<th>#</th>
  											<th>Provinsi</th>
  											<th>Kabupaten</th>
  											<th>Detail Lokasi</th>
  											<th>Action</th>
  										</tr>
  									</thead>
  									<input type="hidden" name="id_paket" id="paketdilokasi" value="<?= $angga['id_paket'] ?>">
  									<tbody class="text-center">

  									</tbody>
  								</table>
  							</div>
  						</div>
  					</div>
  				</div>
  				<!-- nama Paket -->
  				<div class="form-group row">
  					<label for="nama_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Nama Paket</label>
  					<div class="col-sm-4 mb-4">
  						<input type="text" name="nama_paket" value="<?= $angga['nama_paket'] ?>" id="nama_paket" class="form-control form-control-sm">
  						<p class="nama_paket-error text-danger"></p>
  					</div>
  					<label for="program_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Program</label>
  					<div class="col-sm-4 mb-4">
  						<input type="text" name="program_paket" value="<?= $angga['program_paket'] ?>" class="form-control form-control-sm mb-4">
  						<p class="program_paket-error text-danger"></p>
  					</div>
  					<label for="id_jenis_anggaran" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Jenis Anggaran</label>
  					<div class="col-sm-4 mb-5">
  						<select name="id_jenis_anggaran" id="id_jenis_anggaran" class="form-control select2">
  							<option value="<?= $angga['id_jenis_anggaran'] ?>"><?= $angga['nama_jenis_anggaran'] ?></option>
  							<?php foreach ($get_jenis_anggaran as $key => $value) { ?>
  								<option value="<?= $value['id_jenis_anggaran'] ?>"><?= $value['nama_jenis_anggaran'] ?></option>
  							<?php  } ?>
  						</select>
  						<p class="id_jenis_anggaran-error text-danger"></p>
  					</div>
  					<label for="sepesifikasi_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Sepesifikasi Pekerjaan</label>
  					<div class="col-sm-4 mb-5">
  						<input type="text" name="sepesifikasi_paket" value="<?= $angga['sepesifikasi_paket'] ?>" class="form-control form-control-sm">
  						<!-- palidasi -->
  						<p class="sepesifikasi_paket-error text-danger"></p>
  					</div>
  					<label for="kualifikasi_usaha" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Kualifikasi Usaha</label>
  					<div class="col-sm-4 mb-5">
  						<select name="kualifikasi_usaha" class="form-control select2">
  							<option value="<?= $angga['kualifikasi_usaha'] ?>"><?= $angga['kualifikasi_usaha'] ?></option>
  							<option value="Usaha Besar">Usaha Besar</option>
  							<option value="Usaha Menengah">Usaha Menengah</option>
  							<option value="Usaha Kecil">Usaha Kecil</option>
  						</select>
  						<p class="kualifikasi_usaha-error text-danger"></p>
  					</div>
  					<label for="id_metode_pemilihan" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Metode Pemilihan</label>
  					<div class="col-sm-4  mb-5">
  						<select name="id_metode_pemilihan" id="id_metode_pemilihan" class="form-control select2">
  							<option value="<?= $angga['id_metode_pemilihan'] ?>"><?= $angga['nama_metode_pemilihan'] ?></option>
  							<?php foreach ($get_metode as $key => $value) { ?>
  								<option value="<?= $value['id_metode_pemilihan'] ?>"><?= $value['nama_metode_pemilihan'] ?></option>
  							<?php  } ?>
  						</select>
  						<select style="display: none;" name="id_kualifikasi" id="id_kualifikasi">
  						</select>
  						<p class="id_metode_pemilihan-error text-danger"></p>
  					</div>
  					<label for="id_jenis_pengadaan" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Jenis Pengandaan</label>
  					<div class="col-sm-4  mb-5">
  						<select name="id_jenis_pengadaan" id="id_jenis_pengadaan" class="form-control form-control select2">
  							<option value="<?= $angga['id_jenis_pengadaan'] ?>"><?= $angga['nama_jenis_pengadaan'] ?></option>
  							<?php foreach ($get_jenis_pengadaan as $key => $value) { ?>
  								<option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
  							<?php  } ?>
  						</select>
  						<p class="id_jenis_pengadaan-error text-danger"></p>
  					</div>
  					<label for="id_produk_dl_negri" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Produk Dalam Negri</label>
  					<div class="col-sm-4  mb-5">
  						<select name="id_produk_dl_negri" id="id_produk_dl_negri" class="form-control select2">
  							<option value="<?= $angga['id_produk_dl_negri'] ?>"><?= $angga['keterangan'] ?></option>
  							<?php foreach ($get_produk_dl_negri as $key => $value) { ?>
  								<option value="<?= $value['id_produk_dl_negri'] ?>"><?= $value['keterangan'] ?></option>
  							<?php  } ?>
  						</select>
  						<p class="id_produk_dl_negri-error text-danger"></p>
  					</div>
  					<label for="uraian_pekerjaan_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Uraian Pekerjaan</label>
  					<div class="col-sm-10 mb-5">
  						<textarea name="uraian_pekerjaan_paket" class="form-control form-control-sm"><?= $angga['uraian_pekerjaan_paket'] ?></textarea>
  						<p class="uraian_pekerjaan_paket-error text-danger"></p>
  					</div>
  					<label for="" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Tahun Jamak</label>
  					<div class="col-sm-10 mb-5">
  						<div class="form-inline">
  							<input type="text" name="tahun_mulai_jamak" class="form-control datepicker2 tahun_jamak_mulai" value="<?= $angga['tahun_mulai_jamak'] ?>"> <label for="" class="pl-2 pr-2">S/D</label>
  							<input type="text" name="tahun_selesai_jamak" class="form-control datepicker2 tahun_jamak_selesai" value="<?= $angga['tahun_selesai_jamak'] ?>">
  						</div>
  					</div>
  					<label for="id_sumber_dana" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Sumber Dana</label>
  					<div class="col-sm-10">
  						<div class="card card-primary">
  							<div class="card-header text-center">
  								<div class="card-tools">
  									<label>Sumber Dana</label>
  									<button type="button" class="float-right btn btn-primary mt-3 mb-2 btn-sm" onclick="add_sumber_dana()">
  										<i class="fas fa fa-plus"></i> Sumber Dana
  									</button>
  								</div>
  							</div>

  							<div style="overflow-x: auto;" class="p-4">
  								<table id="sumber_dana" class="table table-bordered table-striped">
  									<thead class="text-center">
  										<tr>
  											<th>#</th>
  											<th>Asal Dana</th>
  											<th>Hps</th>
  											<th>Action</th>
  										</tr>
  									</thead>
  									<input type="hidden" name="id_paket" id="paketdisumberdana" value="<?= $angga['id_paket'] ?>">
  									<tbody class="text-center">

  									</tbody>
  									<p id="test"></p>
  								</table>
  							</div>
  						</div>
  					</div>
  				</div>

  				<!-- jadwal_pemilihan -->
  				<!-- <div class="form-group row">
               <label for="uni_kerja" class="col-sm-3 col-form-label" style="font-weight: bold;font-size:14px">Jadwal Pemilihan</label>
               <div class="col-sm-9">
                  <div class="card card-primary">
                     <div class="card-header text-center">
                        <label>Jadwal Pemilihan</label>
                        <div class="card-tools">
                        </div>
                     </div>

                     <div style="overflow-x: auto;">
                        <table class="table table-bordered table-striped">
                           <thead class="text-center">
                              <tr>
                                 <th>Tahap</th>
                                 <th>Tanggal Mulai</th>
                                 <th>Tanggal Selesai</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              <?php foreach ($jadwal_pemilihan as $key => $value) { ?>
                                 <input type="hidden" name="id_jadwal_pemilihan" value="<?= $value['id_jadwal_pemilihan'] ?>">
                                 <tr>
                                    <td><input type="text" class="form-control" name="tahap" value="<?= $value['tahap'] ?>" placeholder="Nama Tahap" id="tahap"></td>
                                    <td><input type="date" name="tanggal_mulai" id="tanggal_mulai" value="<?= $value['tanggal_mulai'] ?>" class="form-control"></td>
                                    <td><input type="date" name="tanggal_selesai" id="tanggal_selesai" value="<?= $value['tanggal_selesai'] ?>" class="form-control"></td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                        <div class="table" id="insert-jadwal"></div>
                     </div>
                     <input type="hidden" id="jumlah-jadwal" value="1">
                  </div>
                  <div class="text-right">
                     <br>
                     <button type="button" class="btn btn-success" id="btn-tambah-jadwal">Tambah Jadwal</button>
                     <button type="button" class="btn btn-danger" id="btn-reset-jadwal">Reset Form</button><br><br>
                  </div>
               </div> -->
  			</div>
  		</div>
  	</form>
  	<div class="row">
  		<div class="col-md-6">
  			<a href="<?= base_url('penetapanlangsung/daftarpaket') ?>" class="btn btn-danger m-2 w-100 text-white">Batal</a>
  		</div>
  		<div class="col-md-6">
  			<button type="button" class="btn btn-primary m-2 w-100" onclick="edit_rup2()">Simpan</button>
  		</div>
  	</div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal_lokasi_kerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="modalTitle">Tambah Lokasi Pekerjaan</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form action="#" id="formDataLokasiPekerjaan">
  					<input type="hidden" name="id_lokasi_pekerjaan" id="id_lokasi_pekerjaan">
  					<input type="hidden" name="id_paket" id="id_paket" value="<?= $angga['id_paket'] ?>">
  					<div class="form-group">
  						<select name="id_provinsi" id="provinsi2" class="form-control select2bs4">
  							<?php foreach ($provinsi as $key => $value) { ?>
  								<option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
  							<?php  } ?>
  						</select>
  						<p class="provinsi-error text-danger"></p>
  					</div>
  					<div class="form-group">
  						<select name="id_kabupaten" id="kabupaten2" class="form-control select2bs4">
  						</select>
  						<p class="kabupaten-error text-danger"></p>
  					</div>
  					<div class="form-group">
  						<input type="text" name="detail_lokasi" class="form-control">

  					</div>

  				</form>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  				<button type="button" class="btn btn-primary" id="btnSave" onclick="save_lokasi_kerja()">Save</button>
  			</div>
  		</div>
  	</div>
  </div>

  <!-- sumberdana -->
  <!-- Modal -->
  <div class="modal fade" id="modal_sumber_dana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="modalTitle">Tambah Sumber Dana</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form action="#" id="FormDataSumberDana">
  					<input type="hidden" name="id_sumber_dana" id="id_sumber_dana">
  					<input type="hidden" name="id_paket" id="id_paket" value="<?= $angga['id_paket'] ?>">
  					<div class="form-group">
  						<label for="">Asal Dana</label>
  						<input type="text" name="asal_dana" value="BUMN" readonly class="form-control">
  					</div>
  					<div class="form-group">
  						<label for="">Hps</label>
  						<input type="text" name="hps" id="harga_biasa" class="form-control">
  						<input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah">
  					</div>
  				</form>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  				<button type="button" class="btn btn-primary" id="btnSave" onclick="save_sumber_dana()">Save</button>
  			</div>
  		</div>
  	</div>
  </div>