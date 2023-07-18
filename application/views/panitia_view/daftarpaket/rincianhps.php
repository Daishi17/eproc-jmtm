  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<div style="padding: 10px;">
  		<form class="form-inline float-left">
  			<h5 for="">TOTAL HPS PAKET : </h5>
  			<input type="text" class="form-control col-md-5 mb-1 mt-4 ml-3" disabled value="<?= "Rp " . number_format($total_hps['hps'], 2, ',', '.') ?>">
  		</form>
  		<input type="hidden" value="<?= $angga['id_paket'] ?>" id="rincian_hps">
  		<br>
  		<div class="row mb-3">
  			<div class="col-md-8 mt-0 float-right">
  				<div class="card">
  					<div class="card-header bg-primary text-white">
  						Dokumen Pdf Rincian HPS
  					</div>
  					<div class="card-body">
  						<table>
  							<?php foreach ($pdf_rincian_hps as $key => $value) { ?>
  								<tr>
  									<td><a href="<?= base_url('rincian_hps_pdf_file/' . $value['file_rincian_hps_pdf']) ?>"><img src="<?= base_url('assets/img/sayaku.png') ?>" style="width: 20px;" alt=""></a></td>
  									<td><a href="<?= base_url('paket/hapus_rincian_hps_pdf/' . $value['id_rincian_hps_pdf']) ?>"><i class="far fa-trash-alt"></i></a></td>
  								</tr>
  							<?php  } ?>
  						</table>
  					</div>
  				</div>

  			</div>
  		</div>
  		<div style="overflow: auto;">
  			<table id="rincian_hps_tbl" class="table table-bordered table-active">
  				<thead>
  					<tr class="bg-primary text-white text-center">
  						<th>NO</th>
  						<th>Jenis Barang/Jasa</th>
  						<th>Satuan</th>
  						<th>Vol</th>
  						<th>Pajak (%)</th>
  						<th>Harga</th>
  						<th>Total</th>
  						<th>Keterangan</th>
  					</tr>
  				</thead>
  				<tbody class="text-center">
  				</tbody>
  			</table>
  		</div>
  		<br><br>
  		<?php $total = 0;
			foreach ($total_rincian_hps as $key => $value) { ?>
  			<?php
				$total +=  ($value['satuan_rincian_hps'] * $value['harga_rincian_hps']) * $value['persen_rincian_hps'] / 100;
				?>
  		<?php } ?>
  		<!-- jika nilai lebih besar dari nilai Pagu Gak bisa -->
  		<?php if ($total > $total_hps['hps']) { ?>
  			<div class="alert alert-warning float-right" role="alert">
  				<label for=""> Nilai Rincian Hps Tidak Boleh Lebih Dari Nilai Hps Paket!!</label>
  				<br>
  				<label class="text-danger" for="">Klik Tombol Refresh Untuk Update HPS</label>
  				<br>
  				<form class="form-inline float-right was-validated">
  					<label for=""> TOTAL RINCIAN HPS</label>
  					<input type="text" class="form-control is-invalid form-control-sm mb-2 ml-2 mt-2" id="validationServer03" disabled value="<?= "Rp " . number_format($total, 2, ',', '.') ?>">
  					<a href="" class="btn btn-primary btn-sm ml-2"><i class="fas fa-sync-alt"></i></a>
  				</form>
  			</div>
  		<?php  } else { ?>
  			<div class="alert alert-success float-right" role="alert">
  				<form class="form-inline float-right">
  					<h6 for="">TOTAL RINCIAN HPS : </h6>
  					<input type="text" class="form-control form-control-sm col-md-5 mb-2 ml-2 mt-2" disabled value="<?= "Rp " . number_format($total, 2, ',', '.') ?>">
  				</form>
  			</div>
  		<?php   } ?>

  		<br>
  	</div>
  	<div class="row">
  		<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $angga['id_paket']) ?>" class="btn btn-sm btn-primary">Kembali</a>
  	</div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalDataRincianHps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="modalTitle"></h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form action="#" id="formDataHps">
  					<input type="hidden" name="id_rincian_hps" id="id_rincian_hps">
  					<input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket">
  					<!-- inpu disini untuk agency by id-nya nanti -->
  					<div class="row">
  						<div class="form-group col-md-6">
  							<label for="jenis_barang_jasa_rincian_hps">Jenis Barang/Jasa</label>
  							<input type="text" class="form-control" name="jenis_barang_jasa_rincian_hps" id="jenis_barang_jasa_rincian_hps" placeholder="Jenis Barang/Jasa">
  							<p class="jenis_barang_jasa_rincian_hps-error text-danger"></p>
  							<label for="satuan_rincian_hps">Satuan</label>
  							<input type="text" class="form-control" name="satuan_rincian_hps" id="satuan_rincian_hps" placeholder="Satuan">
  							<p class="satuan_rincian_hps-error text-danger"></p>
  							<label for="vol_rincian_hps">Vol</label>
  							<input type="text" class="form-control" name="vol_rincian_hps" id="vol_rincian_hps" placeholder="Vol">
  							<p class="vol_rincian_hps-error text-danger"></p>
  						</div>
  						<div class="form-group  col-md-6">
  							<label for="persen_rincian_hps">Pajak(%)</label>
  							<input type="text" class="form-control" name="persen_rincian_hps" id="persen_rincian_hps" placeholder="Jenis Barang/Jasa">
  							<p class="persen_rincian_hps-error text-danger"></p>
  							<label for="harga_rincian_hps">Harga</label>
  							<input type="text" class="form-control" name="harga_rincian_hps" id="harga_rincian_hps" placeholder="Satuan">
  							<p class="harga_rincian_hps-error text-danger"></p>
  							<label for="keterangan_rincian_hps">Keterangan</label>
  							<textarea name="keterangan_rincian_hps" id="keterangan_rincian_hps" class="form-control"></textarea>
  							<p class="keterangan_rincian_hps-error text-danger"></p>
  						</div>
  					</div>
  				</form>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  				<button type="button" class="btn btn-primary" id="btnSave" onclick="save_rincian_hps()">Save</button>
  			</div>
  		</div>
  	</div>
  </div>