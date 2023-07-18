  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">User Acceptance Test</a></li>

  	</ol>

  	<div class="content">
  		<!-- <?= form_open_multipart('uat/upload') ?>
          <div class="input-group">
              <input type="file" class="form-control form-control-sm" id="importexcel" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcel" aria-label="Upload">
              <button class="btn btn-sm btn-success" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/excel.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>
          </div>
          <?= form_close(); ?> -->


  		<?= $this->session->flashdata('pesan'); ?>
  		<!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
  		<?php if (!$this->session->userdata('nama_penguji')) { ?>

  			<div class="card">
  				<div class="card-header btn-grad">
  					Isi Data Sebelum Melakukan UAT
  				</div>
  				<div class="card-body">
  					<form action="<?= base_url('uat/simpan_data_uat') ?>" method="POST">
  						<label for=""><span class="text-danger">*</span>Nama Penguji</label>
  						<input name="nama_penguji" type="text" class="form-control form-control-sm">
  						<span class="text-danger"><?= form_error('nama_penguji') ?></span>
  						<br>
  						<label for=""><span class="text-danger">*</span>Nama Divisi</label>
  						<input name="nama_divisi" type="text" class="form-control form-control-sm">
  						<span class="text-danger"><?= form_error('nama_penguji') ?></span>
  						<br>
  						<center>
  							<button type="submit" class="btn btn-grad">Simpan</button>
  						</center>
  					</form>
  				</div>
  			</div>
  		<?php } else { ?>
  			<br>
  			<center>
  				<a class="btn btn-sm btn-danger" href="<?= base_url('uat/exportpdfuat') ?>"> <img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt=""> EXPORT PDF</a>
  			</center>
  			<br>
  			<br>
  			<table id="serverside" class="table table-striped table-bordered">
  				<thead>
  					<tr>
  						<th style="width: 5%;">No</th>
  						<th>Deskripsi</th>
  						<th>Status</th>
  						<th>Nama Penguji</th>
  						<th>Divisi</th>
  						<th>Aksi</th>
  					</tr>
  				</thead>
  				<tbody>

  				</tbody>
  			</table>
  		<?php } ?>
  		<br>
  	</div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal_note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLongTitle">Catatan</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form id="simpan_note">
  					<input type="hidden" name="id_uat" id="id_uat">
  					<div class="form-group">
  						<label for=""></label>
  						<textarea name="catatan" id="" class="form-control form-control-sm" cols="30" rows="10"></textarea>
  					</div>
  				</form>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  				<button type="button" onclick="Catatan_save()" class="btn btn-primary">Save changes</button>
  			</div>
  		</div>
  	</div>
  </div>