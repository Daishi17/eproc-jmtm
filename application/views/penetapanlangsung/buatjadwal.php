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
	<input type="hidden" name="id_paket" id="id_paketkusaja" value="<?= $angga['id_paket'] ?>">
	<br>
	<ol class="breadcrumb btn-grad100" href="#">Jadwal Penetapan Langsung</a></li>
	</ol>
	<div class="content">
		<div class="card">
			<?php if ($this->session->userdata('id_role') == 3) { ?>
				<div class="card-header btn-grad100">
					Jadwal Penetapan Langsung
				</div>
			<?php } else { ?>
				<div class="card-header btn-grad100">
					Atur Jadwal Penetapan Langsung
				</div>
			<?php } ?>
			<?php if ($result_data_jadwal_detail == null) { ?>
				<?= $this->session->flashdata('message'); ?>
				<div class="card-body">
					<form action="" id="form_jadwal_penetapan_langsung">
						<table class="table table-hover">
							<thead>
								<tr class="btn-grad100">
									<th>No</th>
									<th>Nama Jadwal</th>
									<th>Tanggal & Jam Mulai</th>
									<th>Tangga & Jam Selesai</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								$mulai = 1;
								$selesai = 1;
								$erorr = 1;
								$bener = 1;
								$erorrtext = 1;
								$benertext = 1;
								$erorr_row = 1;
								$name_jadwal = 1;
								foreach ($result_data_jadwal as $key => $value) { ?>
									<tr id="erorr_jadwal_row<?= $erorr_row++ ?>">
										<td><?= $no++ ?></td>
										<td><?= $value['nama_jadwal_penetapan_langsung'] ?></td>
										<div class="alert alert-danger" style="display: none;" id="error-jadwal<?= $erorr++ ?>" role="alert">
											Jadwal <?= $value['nama_jadwal_penetapan_langsung'] ?><?= $erorrtext++ ?> Belum Benar Mengisinya
										</div>
										<div class="alert alert-success" style="display: none;" id="bener-jadwal<?= $bener++ ?>" role="alert">
											Jadwal <?= $value['nama_jadwal_penetapan_langsung'] ?><?= $benertext++ ?> Sudah Benar
										</div>

										<input type="hidden" name="nama_jadwal_penetapan_langsung_detail[]" value="<?= $value['nama_jadwal_penetapan_langsung'] ?>">
										<td><input class="form-control form-control-sm" name="tanggal_mulai[]" type="text" id="mulai<?= $mulai++ ?>"></td>
										<td><input class="form-control form-control-sm" name="tanggal_selesai[]" type="text" id="selesai<?= $selesai++ ?>"></td>

									</tr>
								<?php  } ?>
							</tbody>
						</table>
						<center>
							<button style="width: 300px;" id="btnSave" type="button" onclick="simpan_jadwal()" class="btn btn-primary">Simpan Jadwal</button>
							<a href="<?= base_url('penetapanlangsung/detailpaket/' . $angga['id_paket']) ?>" class="btn btn-primary">Kembali</a>
						</center>
					</form>
				</div>
			<?php } else { ?>
				<div class="card-body">
					<form action="javascript:;" id="form_jadwal_penetapan_langsung">
						<input type="hidden" name="id_paket" id="id_paketkusaja" value="<?= $angga['id_paket'] ?>">
						<table class=" table table-hover">
							<thead>
								<tr class="btn-grad100">
									<th>No</th>
									<th>Nama Jadwal</th>
									<th>Tanggal & Jam Mulai</th>
									<th>Tangga & Jam Selesai</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								$mulai_detail = 1;
								$selesai_detail = 1;
								$erorr_detail = 1;
								$bener_detail = 1;
								$erorrtext_detail = 1;
								$benertext_detail = 1;
								$erorr_row_detail = 1;
								$name_jadwal_detail = 1;
								$i = 1;
								foreach ($result_data_jadwal_detail as  $value2) { ?>
									<input type="hidden" name="id_jadwal_penetapan_langsung[<?= $i ?>]" value="<?= $value2['id_jadwal_penetapan_langsung'] ?>">
									<tr id="erorr_jadwal_row<?= $erorr_row_detail++ ?>">
										<td><?= $no++ ?></td>
										<td><?= $value2['nama_jadwal_penetapan_langsung_detail'] ?></td>
										<div class="alert alert-danger" style="display: none;" role="alert">
											Jadwal <?= $value2['nama_jadwal_penetapan_langsung_detail'] ?> Belum Benar Mengisinya
										</div>
										<div class="alert alert-success" style="display: none;" role="alert">
											Jadwal <?= $value2['nama_jadwal_penetapan_langsung_detail'] ?> Sudah Benar
										</div>
										<td><input class="form-control form-control-sm" name="tanggal_mulai[<?= $i ?>]" id="mulai<?= $mulai_detail++ ?>" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_mulai'])) ?>" type="text"></td>
										<td><input class="form-control form-control-sm" name="tanggal_selesai[<?= $i ?>]" id="selesai<?= $selesai_detail++ ?>" value="<?= date('d-F-Y H:i', strtotime($value2['tanggal_selesai']))  ?>" type="text"></td>
									</tr>
									<?php $i++ ?>
								<?php  } ?>
							</tbody>
						</table>
						<center>
							<?php if ($this->session->userdata('id_role') == 1) { ?>
								<button type="submit" id="btnSave" class="btn btn-grad100">Update Jadwal</button>
							<?php } else if ($this->session->userdata('id_role') == 3) { ?>
								<button type="submit" id="btnSave" class="btn btn-grad100">Update Jadwal</button>
							<?php } ?>
							<?php if ($this->session->userdata('id_role') == 3) { ?>
								<a class="btn btn-grad100" href="<?= base_url('penetapanlangsung/detailpaket/' . $angga['id_paket']) ?>">Kembali</a>
							<?php } else { ?>
								<a class="btn btn-grad100" href="<?= base_url('paket/edit_paket/' . $angga['id_paket']) ?>">Kembali</a>
							<?php } ?>

						</center>
					</form>
				</div>
			<?php   } ?>

		</div>
	</div>
</div>