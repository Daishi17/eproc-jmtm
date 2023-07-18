<style>
	#bungkusbeliau {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background-color: #fff;
	}

	#bungkusbeliau #dikirim_kepanitia {
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		font: 14px arial;
	}
</style>
<div id="bungkusbeliau" style="display: none;">
	<div id="dikirim_kepanitia">
		<img src="<?= base_url('assets/img/Selamat.gif') ?>" width="100%">
	</div>
</div>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>

<div class="content">
	<div class="container">
		<table class="table table-bordered">
			<tr>
				<th class="bgwarning">Rencana Umum Pengadaan</th>
				<td>
					<input type="hidden" name="id_paket" id="id_paketnya" value="<?= $angga['id_paket'] ?>">
					<table class="table table-bordered">
						<tr>
							<th>Kode Rup</th>
							<th>Nama Paket</th>
							<th>Jenis Pengadaan</th>
							<th>Jenis Anggaran</th>
						</tr>
						<tr>
							<td><?= $angga['kode_jenis_anggaran'] ?><?= $angga['kode_jenis_pengadaan'] ?><?= $angga['kode_metode_pemilihan'] ?><?= $angga['kode_unit_kerja'] ?><?= $angga['kode_produk_dl_negri'] ?></td>
							<td><?= $angga['nama_paket'] ?></td>

							<td><?= $angga['nama_jenis_pengadaan'] ?></td>
							<td width="150px"><?= $angga['nama_tahun_anggaran'] ?>-<?= $angga['nama_jenis_anggaran'] ?>-BUMN</td>
						</tr>
					</table>
				</td>
			</tr>
			<!-- <tr>
				<th class="bgwarning">Agency</th>
				<td><?= $angga['nama_pegawai'] ?></td>
			</tr> -->
			<tr>
				<th class="bgwarning">Unit</th>
				<td><?= $angga['nama_unit_kerja'] ?></td>
			</tr>
		</table>
		<div class="bs-callout-primary" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
			<b>Petunjuk Penginputan Pemilihan Panitia :</b><br>
			1. Pilih Salah Satu Panita <br>
			<br>
		</div>
		<br><br>
		<div style="padding: 10px;">
			<div style="overflow: auto;">
				<input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
				<table id="tbl_id_pilih_panitia" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama Panitia</th>
							<th>Unit</th>
							<th>Status</th>
							<th>Jenis Panitia</th>
							<th>Pilih Panitia</th>
						</tr>

					</thead>
					<tbody class="text-center">
					</tbody>
				</table>
			</div>
		</div> <br><br><br>
		<div class="row">
			<a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalpanitia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
				<form action="#" id="formDataPilihPanitia" enctype="multipart/form-data">
					<input type="hidden" id="id_paket_pada_panitia" name="id_paket" value="<?= $angga['id_paket'] ?>">
					<input type="hidden" id="panita" name="id_panitia">
					<div class="form-group">
						<h4 for="" class="text-danger text-center">PANITIA YANG ANDA PILIH </h4>
						<center>
							<img src="<?= base_url('assets/img/kerja.png') ?>" width="220px" alt="">
						</center>
						<h3 class="text-center" id="nama_panitia"></h3>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="button" class="btn btn-danger btn-block btn-sm" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa fa-ban"></i> Cancel</span>
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-success btn-block btn-sm" id="upload" name="upload" type="submit"> <i class="fas fa fa-check"></i> Pilih</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalpanitia_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
				<form action="#" id="ubah_panitia" enctype="multipart/form-data">
					<input type="hidden" id="id_paket_pada_panitia" name="id_paket" value="<?= $angga['id_paket'] ?>">
					<input type="hidden" id="panita" name="id_panitia">
					<input type="hidden" name="id_panita_mengikuti_paket">
					<div class="form-group">
						<h4 for="" class="text-danger text-center">ANDA YAKIN INGIN MENGUBAH <br> PANITIA DI PAKET INI ?? </h4>
						<center>
							<img src="<?= base_url('assets/img/kerja.png') ?>" width="220px" alt="">
						</center>
						<h3 class="text-center" id="nama_panitia"></h3>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="button" class="btn btn-danger btn-block btn-sm" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa fa-ban"></i> Cancel</span>
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-success btn-block btn-sm" id="upload" name="upload" type="submit"> <i class="fas fa fa-check"></i> Ubah Panitia</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_detail_panitia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Panitia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="margin-top: -25px;">
				<form action="#" id="formDatapanitia" enctype="multipart/form-data">
					<input type="hidden" id="id_paket_pada_panitia" name="id_paket" value="<?= $angga['id_paket'] ?>">
					<input type="hidden" id="panita" name="id_panitia">
					<div class="form-group">
						<h5 for="" class="text-info text-center">NAMA ANGGOTA PANITIA </h5>
						<center>
							<img src="<?= base_url('assets/img/kerja.png') ?>" width="100px" alt="">
						</center>
						<table class="table">
							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
								<tr>
									<th>Nama Anggota</th>
									<th>Jabatan Panitia</th>
									<th>Unit</th>
								</tr>
							</thead>
							<tbody id="detail_panitia">

							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>