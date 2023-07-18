  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div id="main" class="container">
  	<nav aria-label="breadcrumb" class="mt-3">
  		<ol class="breadcrumb bg-primary">
  			<li class="breadcrumb-item"><a style="color: white;" href="<?= base_url('informasitender') ?>">Beranda &raquo; Batalkan Tender</a></li>
  		</ol>
  	</nav>
  	<div>
  		<div class="tab-content mt-2" style="box-shadow: 2px 2px 10px 2px black;">
  			<div class="container">
  				<br>
  				<form action="" id="form_batal_atau_tender_ulang">
  					<input type="hidden" id="id_paket" name="id_paket" value="<?= $paket['id_paket'] ?>">
  					<table class="table table-striped table-bordered">
  						<tbody>
  							<tr>
  								<th>Kode Tender</th>
  								<td><?= $paket['kode_tender'] ?></td>
  							</tr>
  							<tr>
  								<th>Nama Paket</th>
  								<td><?= $paket['nama_paket'] ?></td>
  							</tr>
  							<tr>
  								<th>Satuan Kerja</th>
  								<td><?= $paket['nama_unit_kerja'] ?></td>
  							</tr>
  							<tr>
  								<th>Jenis Pengadaan</th>
  								<td><?= $paket['nama_jenis_pengadaan'] ?></td>
  							</tr>
  							<tr>
  								<th>Metode Pemilihan</th>
  								<td><?= $paket['nama_metode_pemilihan'] ?></td>
  							</tr>
  							<tr>
  								<th>Alasan Membatalkan Tender</th>
  								<td><textarea name="alasan_pengulanagan_tender" id="" cols="30" rows="10" class="form-control"><?= $paket['alasan_tender_pengulanagan'] ?></textarea></td>
  							</tr>
  						</tbody>
  					</table>
  					<a href="javascript:;" class="btn btn-danger mr-2 mb-2" id="ulang" onclick="Batal_tender()">Membatalkan Tender</a>
  					<a href="javascript:;" id="batal_tender" onclick="Mengulang_tender()" class="btn btn-danger mr-2 mb-2">Mengulang Tender</a>
  					<a href="<?= base_url('panitiajmtm/beranda/informasitender/' . $paket['id_paket']) ?>" class="btn btn-primary mb-2">Kembali</a>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>