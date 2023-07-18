  <div class="preloader">
  	<div class="loading">
  		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
  	</div>
  </div>
  <div class="container">
  	<br>
  	<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  		<li><a style="text-decoration: none; color:white;" href="#">Daftar UKPBJ / Edit</a></li>

  	</ol>
  	<div class="content">
  		<div class="alert alert-success" role="alert">
  			Data berhasil disimpan
  		</div>
  		<table class="table">
  			<tr>
  				<td align="right" width=20%>Nama <span style="color:red">*</span></td>
  				<td> <input type="text" class="form-control form-control-sm" value="UKPBJ LKPP" /></td>
  			</tr>
  			<tr>
  				<td align="right">Alamat <span style="color:red">*</span></td>
  				<td> <input type="text" class="form-control form-control-sm" value="Jl. Epicentrum Tengah Lot 11 B, Jakarta Selatan, DKI Jakarta" /></td>
  			</tr>
  			<tr>
  				<td align="right">Telepon <span style="color:red">*</span></td>
  				<td> <input type="text" class="form-control form-control-sm" value="219898898" /></td>
  			</tr>
  			<tr>
  				<td align="right">Fax <span style="color:red">*</span></td>
  				<td> <input type="text" class="form-control form-control-sm" value="219898898" /></td>
  			</tr>
  			<tr>
  				<td align="right">Tanggal Pendaftaran <span style="color:red">*</span></td>
  				<td> <input type="date" class="form-control form-control-sm" value="31-09-2019" /></td>
  			</tr>
  			<tr>
  				<td align="right">Penanggung Jawab <span style="color:red">*</span></td>
  				<td>
  					<select class="form-control form-control-sm">
  						<option value="" selected>Anita Shantika-9828827700111</option>
  					</select>
  				</td>
  			</tr>
  		</table>

  		<ol class="breadcrumb" style=" background-image: linear-gradient(to top,rgb(35, 32, 223),rgba(11, 76, 255, 0.63)) !important;">
  			<li><a style="text-decoration: none; color:white;" href="#">Daftar Pegawai UKPBJ</a></li>
  		</ol>
  		<table id="" class="table table-bordered">
  			<tr>
  				<th><input type="checkbox"></th>
  				<th>Nama</th>
  				<th>User ID</th>
  				<th>NIP</th>
  				<th>Email</th>
  			</tr>
  			<tr>
  				<td><input type="checkbox"></td>
  				<td>Ardiyansah</td>
  				<td>POKJA_1</td>
  				<td>11201231237981732981</td>
  				<td>ardiyansah@gmail.com</td>
  			</tr>
  			<tr>
  				<td><input type="checkbox"></td>
  				<td>Ani Yuliana</td>
  				<td>POKJA_2</td>
  				<td>11201212319832791827</td>
  				<td>aniyuliana@gmail.com</td>
  			</tr>
  		</table>
  		<div class="bs-callout-info mb-3"><span style="color:red">*</span>Harus Diisi</div>
  		<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
  		<button type="submit" class="btn btn-sm"><i class="fa fa-plus-circle"></i> Tambah Pegawai UKPBJ</button>
  		<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Pegawai UKPBJ</button>
  		<a href="<?= base_url('ukpbj') ?>" class=" btn btn-sm"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
  	</div>
  </div>