<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div class="content p-3 ml-5 mr-5">
	<div class="card" style="box-shadow: 2px 2px 10px 2px black;">
		<div class="card-header btn-grad">
			DATA RUP JASAMARGA TOLLROAD MAINTENANCE
		</div>
		<div class="card-body">
			<br><br>
			<div class="row">
				<div class="col-md-6">
					<div class="bs-callout btn-grad5" style="box-shadow: 2px 2px 10px 2px black;">
						<div class="row mb-2 g-3 align-items-center">
							<div class="col-md-3">
								<label for="Divisi" style="font-weight: bold;" class="col-form-label">Unit</label>
							</div>
							<div class="col-md-6">
								<select name="id_unit_kerja" id="id_unit_kerja" class="form-control select2">
									<option value=""></option>
									<option value=""></option>
									<?php foreach ($getdivisi as $key => $value) { ?>
										<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="mt-3 mb-2"></div>
						<div class="row g-3 align-items-center">
							<div class="col-md-3">
								<label for="Divisi" style="font-weight: bold;" class="col-form-label">JENIS PENGADAAN</label>
							</div>
							<div class="col-md-6">
								<select name="id_jenis_pengadaan" id="id_jenis_pengadaan" class="form-control select2">
									<option value=""></option>
									<option value=""></option>
									<?php foreach ($get_jenis_pengadaan as $key => $value) { ?>
										<option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<center>
							<div class="col-md-10 mt-3">
								<button class="btn btn-sm btn-grad10 mr-4" style="width: 100px;" name="filter" id="filter" type="button"> <img src="<?= base_url('assets/img/perahu.png') ?>" style="width: 30px;" alt=""> Fillter</button>
								<button class="btn btn-grad9 " style="width: 100px;" id="reload"><i class="fas fa-sync-alt"></i></button>
							</div>
						</center>
					</div>
				</div>
				<!--<div class="col-md-6">-->
				<!--	<div class="bs-callout btn-grad5" style="box-shadow: 2px 2px 10px 2px black;">-->
				<!--		<div class="row mb-2 g-3 align-items-center">-->
				<!--			<div class="col-md-3">-->
				<!--				<label for="Divisi" style="font-weight: bold;" class="col-form-label">upload excel</label>-->
				<!--			</div>-->
				<!--			<div class="col-md-6">-->
				<!--				<?= $this->session->flashdata('pesan'); ?>-->
				<!--				<?= form_open_multipart('rup/uploaddata') ?>-->
				<!--				<div class="input-group">-->
				<!--					<input type="file" class="form-control form-control-sm" id="importexcel" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcel" aria-label="Upload">-->
				<!--					<button class="btn btn-sm btn-success" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/excel.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>-->
				<!--				</div>-->
				<!--				<?= form_close(); ?>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--		<div class="mt-3 mb-2"></div>-->
				<!--		<div class="row mb-5 g-3 align-items-center">-->
				<!--			<div class="col-md-3">-->
				<!--				<label for="Divisi" style="font-weight: bold;" class="col-form-label">Download excel</label>-->
				<!--			</div>-->
				<!--			<div class="col-md-6">-->
				<!--				<?php if ($this->session->userdata('id_role') == 1) { ?>-->
				<!--					<a href="<?= base_url('assets/RUP_TEMPLATE.xlsx') ?>" class="btn btn-info btn-sm"><img src="<?= base_url('assets/img/excel.png') ?>" style="width: 20px;" alt=""> DOWNLOAD TEMPLATE</a>-->
				<!--				<?php  } else if ($this->session->userdata('id_role') == 2) { ?>-->
				<!--					<a href="<?= base_url('assets/RUP_TEMPLATE_AGENCY.xlsx') ?>" class="btn btn-info btn-sm"><img src="<?= base_url('assets/img/excel.png') ?>" style="width: 20px;" alt=""> DOWNLOAD TEMPLATE</a>-->
				<!--				<?php  } ?>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
			</div>
			<br>
			<div class="card" style="box-shadow: 2px 2px 10px 2px black;">
				<div class="card-header btn-grad">
					<div>
						<form action="#" method="POST" id="formData">
							<a href="<?= base_url('rup/tambah_rup_penyedia') ?>" style="width:200px;border-radius:20px" class="btn text-white btn-grad9 btn-sm">
								<img src="<?= base_url('assets/img/ICON-2.png') ?>" style="width: 70px;" alt="">Tambah RUP
							</a>
						</form>
					</div>
				</div>
				<div class="card-body">
					<div style="overflow-x: auto;">
						<table id="serverside" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
							<thead style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
								<tr>
									<th>No</th>
									<th>Kode RUP</th>
									<th style="width: 100px !important;">Nama Paket</th>
									<th>Unit</th>
									<th>Program</th>
									<th>Jenis Pengadaan</th>
									<th>Metode Pemilihan</th>
									<th>Produk Dalam Negri</th>
									<th>Jenis Anggaran</th>
									<th>Finalisasi Draft</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
			<br>
		</div>
	</div>

	<!-- Modal add -->
	<!-- <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Unit Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="#" id="formData">
               <input type="hidden" name="id_paket" id="id_paket">
               <div class="form-group">
                  <label for="nama_paket">Nama Paket</label>
                  <input type="text" class="form-control" name="nama_paket" id="nama_paket">
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
         </div>
      </div>
   </div>
</div> -->

	<!-- modal detail -->
	<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Detail Paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-active table-bordered">
								<tr>
									<th>Kode RUP</th>
									<th><label id="detail_kode_rup"></label></th>
								</tr>
								<tr>
									<th>Nama Paket</th>
									<th><label id="detail_nama_paket"></label></th>
								</tr>
								<tr>
									<th>Unit</th>
									<th><label id="detail_divisi"></label></th>
								</tr>
								<tr>
									<th>Program</th>
									<th><label id="detail_program"></label></th>
								</tr>
								<tr>
									<th>Tahun Jamak</th>
									<th><label id="tahun_jamak"></label></th>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<table class="table table-active table-bordered">
								<tr>
									<th>Jenis Pangadaan</th>
									<th><label id="detail_jenis_pengadaan"></label></th>
								</tr>
								<tr>
									<th>Metode Pemiihan</th>
									<th><label id="detail_metode_pemilihan"></label></th>
								</tr>
								<tr>
									<th>Produk Dalam Negri</th>
									<th><label id="detail_dalam_negri"></label></th>
								</tr>
								<tr>
									<th>Jenis Anggaran</th>
									<th><label id="detail_jenis_anggaran"></label></th>
								</tr>
							</table>
						</div>
					</div>
					<!-- get sumber dana -->
					<div class="row">
						<div class="col-md-2">
							<label for="" style="font-weight: bold;">Sumber Dana</label>
						</div>
						<div class="col-md-10">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Asal Dana</th>
										<th>HPS</th>
									</tr>
								</thead>
								<tbody id="detail_sumber_dana">

								</tbody>
							</table>
						</div>
					</div>

					<!-- get lokasi pekerjaan -->
					<div class="row">
						<div class="col-md-2">
							<label for="" style="font-weight: bold;">Lokasi Pekerjaan</label>
						</div>
						<div class="col-md-10">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Provinsi</th>
										<th>Kabupaten</th>
										<th>Detail Lokasi</th>
									</tr>
								</thead>
								<tbody id="detail_lokasi_kerja">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="Modal_Revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Permintaan Revisi Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="Form_permintaan_revisi">
					<input type="hidden" name="id_paket" id="id_paket">
					<div class="form-group">
						<input type="text" readonly name="nama_peminta_revisi" value="<?= $this->session->userdata('username'); ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Alasan Revisi Paket</label>
						<textarea name="alasan_revisi_paket" class="form-control"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave" onclick="save_permintaan_revisi()">Kirim Permintaan</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="Modal_Setuju_Revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Penyetujuan Revisi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<center>
					<h4>Permintaa Revisi Dari</h4>
				</center>
				<form action="#" id="Form_penyetujuan_revisi">
					<input type="hidden" name="id_paket" id="id_paket">
					<div class="form-group">
						<label for="">Nama Agency</label>
						<input type="text" readonly name="nama_peminta_revisi" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Alasan Revisi Paket</label>
						<textarea readonly name="alasan_revisi_paket" class="form-control"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="btnSave" onclick="save_setujui_revisi()"> <i class="far fa-paper-plane"></i> Approve</button>
			</div>
		</div>
	</div>
</div>