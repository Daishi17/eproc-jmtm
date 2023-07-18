<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div class="container">
	<br>
	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
		<li><a style="text-decoration: none; color:white;" href="#">Master Jenis Jadwal</a></li>

	</ol>

	<div class="content">

		<!-- <div class="float-right mb-2"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Add"><span class="fa fa-plus"></span> Tambah Unit Kerja</a></div> -->
		<table id="serverside" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th width="5%">No</th>
					<th width="60%">Jenis Jadwal</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Jadwal Tender umum (jasa pemborongan) Prakualifikasi sistim nilai dua file (2 Tahap)</td>
					<td> <a href="<?= base_url('jadwal_tender/jadwal_pasca_jasalain') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Jadwal Tender umum (Jasa lain) Pascakualifikasi system nilai dua file (2 Tahap)</td>
					<td><a href="<?= base_url('jadwal_tender/jadwal_pasca_jasalain') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Jadwal Tender umum (Jasa lain) Prakualifikasi system nilai satu file system gugur</td>
					<td><a href="<?= base_url('jadwal_tender/jadwal_pra_jasalain') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Jadwal Tender umum (Jasa Pemborongan) Pascakualifikasi system nilai dua file (2 Tahap)</td>
					<td><a href="<?= base_url('jadwal_tender/pascakualifikasi_tender_umum') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Jadwal Tender umum (Jasa Pemborongan) Prakualifikasi system nilai satu file system gugur</td>
					<td><a href="<?= base_url('jadwal_tender/prakualifikasi_satu_file') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Tender terbatas Prakualifikasi dua file (2 tahap)</td>
					<td><a href="<?= base_url('jadwal_tender/tender_terbatas_prakualifikasi') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>7</td>
					<td>Penujukkan langsung Prakualifikasi dua tahap (2 File) memilih satu vendor dari VMS (mengisi vendor)</td>
					<td><a href="<?= base_url('jadwal_tender/penunjukkan_langsung_prakualifikasi') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>8</td>
					<td>Seleksi umum Prakualifikasi 2 tahap</td>
					<td><a href="<?= base_url('jadwal_tender/seleksiumum') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<tr>
					<td>9</td>
					<td>Seleksi terbatas Prakualifikas 2 tahap (2 file)</td>
					<td><a href="<?= base_url('jadwal_tender/seleksiterbatas') ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr>
				<!-- <tr>
					<td>8</td>
					<td>Penunjukan langsung Prakualifikasi dua tahap (2 File) memilih satu vendor dari VMS (mengisi vendor)
					</td>
					<td><a href="<?= base_url() ?>" class="btn btn-sm btn-info"><i class="fa fa-search"></i> Lihat Jadwal</a></td>
				</tr> -->
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
				<h5 class="modal-title" id="modalTitle">Add Jenis Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="formData">
					<input type="hidden" name="id_jadwal_paket_tender" id="id_jadwal_paket_tender">
					<div class="form-group">
						<label for="jenis_jadwal">Jenis Jadwal</label>
						<input type="text" class="form-control" name="jenis_jadwal" id="jenis_jadwal" placeholder="Jenis Jadwal">
						<p class="jenis_jadwal-error text-danger"></p>
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