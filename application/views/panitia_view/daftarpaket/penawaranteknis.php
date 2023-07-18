  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<nav aria-label="breadcrumb" class="mt-3">
  		<ol class="breadcrumb bg-primary">
  			<li class="breadcrumb-item"><a style="color: white;" href="#">Beranda &raquo; Daftar Paket &raquo; Penawaran Teknis</a></li>
  		</ol>
  	</nav>
  	<div id="success-teknis-alert"></div>
  	<div class="content">
  		<div id="demo"></div>
  		<div class="bs-callout bs-callout-info">
  			<b>Petunjuk :</b><br />
  			1. Pilih Daftar Penawaran Teknis yang di persyaratkan untuk Melengkapi Penawaran peserta tender,dan<br />
  			2. Untuk Menambahkan Dokumen Penawaran Teknis,klik button Tambah Syarat Teknis.
  		</div>
  		<div class="card border-primary mb-3">
  			<div class="card-header bg-primary" style="color: white;">Penawaran Teknis</div>
  			<div class="card-body">
  				<div style="padding: 20px;">
  					<?php if ($penawaranteknis_cek) { ?>
  						<form action="<?= base_url('panitiajmtm/daftarpaket/update_penawaran_teknis/' . $paket['id_paket']) ?>" method="post">
  							<?= $this->session->flashdata('message') ?>
  							<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
  							<table class="table" id="penawaranteknis">
  								<tr>
  									<label for="" style="font-size: 20px;">Administrasi</label>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_masa_berlaku" value="<?= $masa_berlaku_penawaran['id_penawaran_teknis'] ?>">
  												<?php if ($masa_berlaku_penawaran['status_checked'] == 1) { ?>
  													<input type="checkbox" name="masa_berlaku_penawaran" id="masa_berlaku_penawaran" value="<?= $masa_berlaku_penawaran['status_checked'] ?>" onclick="masa_berlaku_penawaran1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="masa_berlaku_penawaran" id="masa_berlaku_penawaran" onclick="masa_berlaku_penawaran1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_masa_berlaku_penawaran" value="<?= $masa_berlaku_penawaran['status_checked'] ?>">
  												Masa Berlaku Penawaran
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_penawaran" value="<?= $penawaran['id_penawaran_teknis'] ?>">
  												<?php if ($penawaran['status_checked'] == 1) { ?>
  													<input type="checkbox" name="penawaran" id="penawaran" value="<?= $penawaran['status_checked'] ?>" onclick="penawaran1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="penawaran" id="penawaran" onclick="penawaran1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_penawaran" value="<?= $penawaran['status_checked'] ?>">
  												Penawaran
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td>
  										<label for="" style="font-size: 20px;">Teknis</label>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_spesifikasi" value="<?= $spesifikasi['id_penawaran_teknis'] ?>">
  												<?php if ($spesifikasi['status_checked'] == 1) { ?>
  													<input type="checkbox" name="spesifikasi" id="spesifikasi" value="<?= $spesifikasi['status_checked'] ?>" onclick="spesifikasi1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="spesifikasi" id="spesifikasi" onclick="spesifikasi1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_spesifikasi" value="<?= $spesifikasi['status_checked'] ?>">
  												Sepesifikasi Teknis Dan Identitas
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_penyerahan" value="<?= $penyerahan['id_penawaran_teknis'] ?>">
  												<?php if ($penyerahan['status_checked'] == 1) { ?>
  													<input type="checkbox" name="penyerahan" id="penyerahan" value="<?= $penyerahan['status_checked'] ?>" onclick="penyerahan1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="penyerahan" id="penyerahan" onclick="penyerahan1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_penyerahan" value="<?= $penyerahan['status_checked'] ?>">
  												Jadwal Penyerahan Atau Pengiriman Barang
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_bagian_pekerjaan" value="<?= $bagian_pekerjaan['id_penawaran_teknis'] ?>">
  												<?php if ($bagian_pekerjaan['status_checked'] == 1) { ?>
  													<input type="checkbox" name="bagian_pekerjaan" id="bagian_pekerjaan" value="<?= $bagian_pekerjaan['status_checked'] ?>" onclick="bagian_pekerjaan1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="bagian_pekerjaan" id="bagian_pekerjaan" onclick="bagian_pekerjaan1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_bagian_pekerjaan" value="<?= $bagian_pekerjaan['status_checked'] ?>">
  												Bagian Pekerjaan Yang Disubkontrakan an Isian LDK
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_browsur" value="<?= $browsur['id_penawaran_teknis'] ?>">
  												<?php if ($browsur['status_checked'] == 1) { ?>
  													<input type="checkbox" name="browsur" id="browsur" value="<?= $browsur['status_checked'] ?>" onclick="browsur1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="browsur" id="browsur" onclick="browsur1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_browsur" value="<?= $browsur['status_checked'] ?>">
  												Browsur Atau Gambar-Gambar
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_jaminan" value="<?= $jaminan['id_penawaran_teknis'] ?>">
  												<?php if ($jaminan['status_checked'] == 1) { ?>
  													<input type="checkbox" name="jaminan" id="jaminan" value="<?= $jaminan['status_checked'] ?>" onclick="jaminan1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="jaminan" id="jaminan" onclick="jaminan1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_jaminan" value="<?= $jaminan['status_checked'] ?>">
  												Jaminan Purna Jual
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_asuransi" value="<?= $asuransi['id_penawaran_teknis'] ?>">
  												<?php if ($asuransi['status_checked'] == 1) { ?>
  													<input type="checkbox" name="asuransi" id="asuransi" value="<?= $asuransi['status_checked'] ?>" onclick="asuransi1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="asuransi" id="asuransi" onclick="asuransi1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_asuransi" value="<?= $asuransi['status_checked'] ?>">
  												Asuransi
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_tenaga_teknis" value="<?= $tenaga_teknis['id_penawaran_teknis'] ?>">
  												<?php if ($tenaga_teknis['status_checked'] == 1) { ?>
  													<input type="checkbox" name="tenaga_teknis" id="tenaga_teknis" value="<?= $tenaga_teknis['status_checked'] ?>" onclick="tenagateknis1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="tenaga_teknis" id="tenaga_teknis" onclick="tenagateknis1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_tenaga_teknis" value="<?= $tenaga_teknis['status_checked'] ?>">
  												Tenaga Teknis
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="hidden" name="id_rekapitulasi" value="<?= $rekapitulasi['id_penawaran_teknis'] ?>">
  												<?php if ($rekapitulasi['status_checked'] == 1) { ?>
  													<input type="checkbox" name="rekapitulasi" id="rekapitulasi" value="<?= $rekapitulasi['status_checked'] ?>" onclick="rekapitulasi1()" checked>
  												<?php } else { ?>
  													<input type="checkbox" name="rekapitulasi" id="rekapitulasi" onclick="rekapitulasi1()">
  												<?php } ?>
  												<input type="hidden" name="status_checked_rekapitulasi" value="<?= $rekapitulasi['status_checked'] ?>">
  												Rekapitulasi Perhitungan TKDN
  											</label>
  										</div>
  									</td>
  								</tr>
  							</table>
  							<!-- <div class="float-right">
							<div>
								<a type="button" class="btn btn-warning mb-2" id="tambahizin2" value="Tambah Izin Usaha"><i class="fas fa-plus-circle"></i> Tambah Izin Usaha</a>
							</div>
						</div><br><br> -->
  							<div class="row">
  								<div style="float: left;">
  									<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Update</button>
  									<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  								</div>
  							</div>
  						</form>
  					<?php } else { ?>
  						<form action="<?= base_url('panitiajmtm/daftarpaket/save_penawaran_teknis') ?>" method="post">
  							<?= $this->session->flashdata('message') ?>
  							<input type="hidden" name="id_paket" value="<?= $paket['id_paket'] ?>">
  							<table class="table" id="penawaranteknis">
  								<tr>
  									<label for="" style="font-size: 20px;">Administrasi</label>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="masa_berlaku_penawaran" id="masa_berlaku_penawaran" onclick="masa_berlaku_penawaran1()">
  												<input type="hidden" name="status_checked_masa_berlaku_penawaran" value="0">
  												<input type="hidden" name="nama_masa_berlaku_penawaran" value="Masa Berlaku Penawaran">
  												Masa Berlaku Penawaran
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="penawaran" id="penawaran" onclick="penawaran1()">
  												<input type="hidden" name="status_checked_penawaran" value="0">
  												<input type="hidden" name="nama_penawaran" value="Penawaran">
  												Penawaran
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td>
  										<label for="" style="font-size: 20px;">Teknis</label>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="spesifikasi" id="spesifikasi" onclick="spesifikasi1()">
  												<input type="hidden" name="status_checked_spesifikasi" value="0">
  												<input type="hidden" name="spesifikasi" value="Sepesifikasi Teknis Dan Identitas">
  												Sepesifikasi Teknis Dan Identitas
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="penyerahan" id="penyerahan" onclick="penyerahan1()">
  												<input type="hidden" name="status_checked_penyerahan" value="0">
  												<input type="hidden" name="nama_penyerahan" value="Jadwal Penyerahan Atau Pengiriman Barang">
  												Jadwal Penyerahan Atau Pengiriman Barang
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="bagian_pekerjaan" id="bagian_pekerjaan" onclick="bagian_pekerjaan1()">
  												<input type="hidden" name="status_checked_bagian_pekerjaan" value="0">
  												<input type="hidden" name="nama_bagian_pekerjaan" value="Bagian Pekerjaan Yang Disubkontrakan an Isian LDK">
  												Bagian Pekerjaan Yang Disubkontrakan an Isian LDK
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="browsur" id="browsur" onclick="browsur1()">
  												<input type="hidden" name="status_checked_browsur" value="0">
  												<input type="hidden" name="nama_browsur" value="Browsur Atau Gambar-Gambar">
  												Browsur Atau Gambar-Gambar
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="jaminan" id="jaminan" onclick="jaminan1()">
  												<input type="hidden" name="status_checked_jaminan" value="0">
  												<input type="hidden" name="nama_jaminan" value="Jaminan Purna Jual">
  												Jaminan Purna Jual
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="asuransi" id="asuransi" onclick="asuransi1()">
  												<input type="hidden" name="status_checked_asuransi" value="0">
  												<input type="hidden" name="nama_asuransi" value="Asuransi">
  												Asuransi
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="tenaga_teknis" id="tenaga_teknis" onclick="tenagateknis1()">
  												<input type="hidden" name="status_checked_tenaga_teknis" value="0">
  												<input type="hidden" name="nama_tenaga_teknis" value="Tenaga Teknis">
  												Tenaga Teknis
  											</label>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="col-md-12">
  										<div class="checkbox">
  											<label>
  												<input type="checkbox" name="rekapitulasi" id="rekapitulasi" onclick="rekapitulasi1()">
  												<input type="hidden" name="status_checked_rekapitulasi" value="0">
  												<input type="hidden" name="nama_rekapitulasi" value="Rekapitulasi Perhitungan TKDN">
  												Rekapitulasi Perhitungan TKDN
  											</label>
  										</div>
  									</td>
  								</tr>
  							</table>
  							<!-- <div class="float-right">
							<div>
								<a type="button" class="btn btn-warning mb-2" id="tambahizin2" value="Tambah Izin Usaha"><i class="fas fa-plus-circle"></i> Tambah Izin Usaha</a>
							</div>
						</div><br><br> -->
  							<div class="row">
  								<div style="float: left;">
  									<button type="submit" class="btn btn-success ml-4 mb-5" style="width: 100px;"><i class="fas fa-save mr-2"></i>Simpan</button>
  									<a href="<?= base_url('panitiajmtm/daftarpaket/tender/' . $paket['id_paket']) ?>" class="btn btn-info ml-4 mb-5" style="width: 100px;"><i class="fas fa-arrow-circle-left mr-2"></i>Kembali</a>
  								</div>
  							</div>
  						</form>
  					<?php } ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>