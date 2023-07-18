<style>
	.btn-grad100 {
		background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
	}

	.btn-grad100 {
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
	}

	.btn-grad100:hover {
		background-position: right center;
		color: #fff;
		box-shadow: 0 0 30px #ee0979;
		text-decoration: none;
	}

	.btn-grad101 {
		background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
	}

	.btn-grad101 {
		width: 30px;
		height: 30px;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		box-shadow: 0 0 20px #eee;
		border-radius: 5px;
		display: block;
		border: none;
	}

	.btn-grad101:hover {
		background-position: right center;
		color: #fff;
		box-shadow: 0 0 30px #ee0979;
		text-decoration: none;
	}
</style>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div class="container">

			<div style="padding: 10px;">
				<input type="hidden" value="" id="rincian_hps">
					<div class="card">
						<div class="card-header btn-grad100 text-center">Upload Kontrak</div>
						<div class="card-body">

							<br>
							<center>
								<div id="sudah_di_buat_hps_pdf_form">
									<form id="form_file_dokumen_kontrak" enctype="multipart/form-data">
										<div class="input-group col-md-6">
											<div class="input-group-append">
												<button class="input-group-text attach_btn btn-grad100" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
												<input type="file" accept="application/pdf" style="display:none;" id="file" class="file_dokumen_kontrak" name="file_dokumen_kontrak" />
											</div>
											<input type="text" name="nama_file_dokumen_kontrak" class="form-control form-control-sm" id="nama_file_dokumen_kontrak" placeholder="Nama File....">
                                            <input type="text" name="nama_pengadaaan_kontrak" class="form-control form-control-sm" id="nama_pengadaaan_kontrak" placeholder="Nama Pengadaan....">
											<div class="input-group-append">
												<button type="submit" id="upload_manual" name="upload" class="input-group-text  btn-grad100"><i class="fas fa-upload"></i></button>
											</div>
										</div>
									</form>
								</div>
								<br>
								<?php if ($this->session->userdata('id_role') == 1) { ?>
									<div class="col-md-6">
								<label for="">Filter Divisi</label>
								<select name="id_unit_kerja" id="id_unit_kerja" onchange="Pilih_unit()" class="form-control select2">
									<option value="">Cari Divisi</option>
									<?php foreach ($getdivisi as $key => $value) { ?>
										<option value="<?= $value['id_unit_kerja'] ?>"><?= $value['nama_unit_kerja'] ?></option>
									<?php } ?>
								</select>
							</div>
								<?php	} else if ($this->session->userdata('id_role') == 2) { ?>
								<?php } ?>	
								
							</center>
							<br>
							<center>
								<div class="form-group col-md-6" id="process_manual" style="display:none;">
									<small for="" style="display:none;" id="sedang_dikirim_manual">Sedang Mengupload....</small>
									<div class="progress">
										<div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
										</div>
									</div>
								</div>
							</center>
                            <!-- tbl_rincian_hps_via_pdf -->
							<table class="table table-hover" id="tbl_upload_kontrak">
								<thead>
									<tr class="btn-grad100">
										<th>No</th>
										<th>Divisi</th>
										<th>Nama Pengadaan</th>
                                        <th>Nama Dokumen Kontrak</th>
										<th>File</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
				</table>
			</div>
		</div>
	</div>
	<br>
</div>