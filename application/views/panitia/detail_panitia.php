  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Pokja Pemilihan <span style="color:grey"><i class="fa fa-chevron-right"></i> Pokja Kepanitian 4</span></a></li>

  	</ol>
  	<div class="content">
  		<table class="table">
  			<tr>
  				<td align="right" width=20%><b>Nama Pokja</b><span style="color:red">*</span></td>
  				<td colspan="3"> <input type="text" class="form-control form-control-sm" value="Pokja Kepanitian 4" /></td>
  			</tr>
  			<tr>
  				<td align="right" width=20%><b>Nomor SK</b><span style="color:red">*</span></td>
  				<td> <input type="text" class="form-control form-control-sm" value="12/SK/PKJ/2018" /></td>
  				<td align="right" width=20%><b>Tahun</b><span style="color:red">*</span></td>
  				<td>2018</td>
  			</tr>
  			<tr>
  				<td align="right"><b>Alamat </b><span style="color:red">*</span></td>
  				<td colspan="3"> <textarea class="form-control form-control-sm" rows="3">Jl. Epicentrum</textarea></td>
  			</tr>
  			<tr>
  				<td align="right"><b>Provinsi </b><span style="color:red">*</span></td>
  				<td><select class="form-control form-control-sm">
  						<option selected>DKI Jakarta</option>
  					</select>
  				</td>
  				<td align="right"><b>Kabupaten / Kota </b><span style="color:red">*</span></td>
  				<td><select class="form-control form-control-sm">
  						<option selected>Adm. Kepulauan Seribu (Kab.)</option>
  					</select>
  				</td>
  			</tr>
  			<tr>
  				<td align="right"><b>K/L/PD </b><span style="color:red">*</span></td>
  				<td colspan=2>
  					<div class="formline">
  						<select id=" instansi" name="instansiId" class="form-control select_tender">
  							<option value="">Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah</option>
  						</select>
  						<a id="updateSatker" href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-sync-alt"></i></a>
  					</div>
  				</td>
  				<td></td>
  			</tr>
  			<tr>
  				<td align="right"><b>Satuan Kerja </b><span style="color:red">*</span></td>
  				<td colspan=2>
  					<div class="formline">
  						<select id=" instansi" name="instansiId" class="form-control">
  							<option value="">LEMBAGA KEBIJAKAN PENGADAAN BARANG/JASA PEMERINTAH</option>
  						</select>
  						<a id="updateSatker" href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-sync-alt"></i></a>
  					</div>
  				</td>
  				<td></td>
  			</tr>
  		</table>
  		<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  			<li>Daftar Anggota Pokja Pemilihan</li>
  		</ol>
  		<table class="table">
  			<tr>
  				<th><input type="checkbox"></th>
  				<th>Nama</th>
  				<th>User ID</th>
  				<th>Jabatan</th>
  			</tr>
  			<tr>
  				<td><input type="checkbox"></td>
  				<td>pokja4a</td>
  				<td>POKJA4A</td>
  				<td>
  					<select class="form-control form-control-sm">
  						<option selected>Ketua</option>
  					</select>
  				</td>
  			</tr>
  			<tr>
  				<td><input type="checkbox"></td>
  				<td>pokja4b</td>
  				<td>POKJA4B</td>
  				<td>
  					<select class="form-control form-control-sm">
  						<option selected>Anggota</option>
  					</select>
  				</td>
  			</tr>
  			<tr>
  				<td><input type="checkbox"></td>
  				<td>pokja4c</td>
  				<td>POKJA4C</td>
  				<td>
  					<select class="form-control form-control-sm">
  						<option selected>Anggota</option>
  					</select>
  				</td>
  			</tr>
  		</table>
  		<div class="bs-callout-info mb-3"><span style="color:red">*</span>Data ini Harus Diisi</div>
  		<a class="btn btn-light btn-sm" href="<?= base_url('pokpem') ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
  	</div>
  </div>