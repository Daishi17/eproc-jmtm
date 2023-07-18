<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div class="container">
	<br>
	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
		<li><a style="text-decoration: none; color:white;" href="#">Jadwal Prakualifikasi</a></li>

	</ol>

	<div class="content">
		<button type="button" class="float-right btn btn-primary mt-3 mb-2 btn-sm" onclick="add()">
			Tambah Data
		</button>

		<?= $this->session->flashdata('message'); ?>
		<!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
		<table id="tbl_prakualifikasi" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th width="10px">No</th>
					<th>Nama Jadwal</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
		<br>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Area</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="formData">
					<input type="hidden" name="id_jadwal_prakualifikasi" id="id_jadwal_prakualifikasi">
					<div class="form-group">
						<label for="nama_jadwal_prakualifikasi">Nama Jadwal Prakualifikasi</label>
						<input type="text" class="form-control" name="nama_jadwal_prakualifikasi" id="nama_jadwal_prakualifikasi" placeholder="Nama Jadwal Prakualifikasi">
						<p class="nama-jadwal-error text-danger"></p>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
			</div>
		</div>
	</div>
</div>