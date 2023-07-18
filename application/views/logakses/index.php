<?php date_default_timezone_set("Asia/Jakarta") ?>
<div class="preloader">
	<div class="loading">
		<img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
	</div>
</div>
<div id="main" class="container">
	<br>
	<div class="breadcrumb">Log Akses</div>
	<div class="content">
		<div class="row">
			<div class="col-md-10"></div>
		</div>
		<div class="bs-callout bs-callout-warning" style="margin-top: 20px;">
			<strong>Harap diperhatikan: </strong> Periksa catatan akses Anda secara rutin, jika Anda merasa tidak pernah login seperti yang tercatat pada sistem, bisa jadi orang lain mengetahui dan menggunakan password Anda.
			<br>
			<b>Segera ubah Password Anda</b>
		</div>

		<div style="overflow-x: auto;">
			<table id="myLogAkses" class="table table-bordered">
				<thead>
					<th>No</th>
					<th>Waktu Login</th>
					<th>Alamat IP</th>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($log_akses as $key => $value) {   ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $value['waktu_login'] ?></td>
							<td><?= $value['alamat_ip'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>