  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Detail Agency / Sub Agency</a></li>

  	</ol>
  	<div class="content mt-4">
  		<div class="alert alert-success">Data Berhasil disimpan</div>
  		<table class="table">
  			<tr>
  				<td align="right" width=20%><b>Nama Agency</b></td>
  				<td colspan="3">Agency 1</td>
  			</tr>
  			<tr>
  				<td align="right"><b>Alamat</b></td>
  				<td>Jl. Epicentrum Tengah</td>
  				<td align="right"><b>Agency Induk</b></td>
  				<td>Admin Agency</td>
  			</tr>
  			<tr>
  				<td align="right"><b>Provinsi</b> </td>
  				<td>DKI Jakarta</td>
  				<td align="right"><b>Kabupaten / Kota </b></td>
  				<td>Jakarta Selatan (Kota) </td>
  			</tr>
  			<tr>
  				<td align="right"><b>Telepon </b></td>
  				<td>219898898</td>
  				<td align="right"><b>Fax</b></td>
  				<td>219898898</td>
  			</tr>
  			<tr>
  				<td align="right"><b>Jenis Agency</b> </td>
  				<td>Departemen</td>
  				<td align="right"><b>Website </b></td>
  				<td>https://lkpp.go.id</td>
  			</tr>
  			<tr>
  				<td align="right"><b>Tanggal Pendaftaran</b></td>
  				<td>24 Juni 2018</td>
  				<td></td>
  				<td></td>
  			</tr>
  			<tr>
  				<td></td>
  				<td colspan="3">
  					<table>
  						<tr>
  							<td align="right"></td>
  							<td width="10px"><b>No.</b></td>
  							<td><b>Penanggung Jawab</b></td>
  							<td><b>Nomor SK Penunjukan</b> </td>

  						</tr>
  						<tr>
  							<td></td>
  							<td>1.</td>
  							<td>Agency 1 - 001001</td>
  							<td>123/SKP/2018</td>
  						</tr>
  					</table>
  				</td>
  			</tr>
  		</table>
  		<a class="btn btn-light btn-sm" href="<?= base_url('subagency') ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
  		<a class="btn btn-light btn-sm" href="<?= base_url('subagency/edit_subagency') ?>"><i class="fa fa-arrow-alt-circle-right"></i> Edit</a>
  		<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#hapusSubAgency"><i class="fa fa-trash"></i> Hapus</a>
  	</div>
  </div>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="hapusSubAgency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-sm" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				Anda yakin akan menghapus data ini?
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
  				<button type="button" class="btn btn-primary">OK</button>
  			</div>
  		</div>
  	</div>
  </div>