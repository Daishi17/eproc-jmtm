<footer class="site-footer btn-grad70" id="contact">
	<div class="container site-footer__container">
		<div class="row align-items-center site-footer__head">
			<div class="col">
				<img width="200" height="62" src="<?= base_url('assets/img/baru.png') ?>" class="image wp-image-103  attachment-full size-full" alt="" style="max-width: 100%;width:300px;height:50px;" />
			</div>
			<div class="col">
				<h3 class="site-footer__title"><i class="fas fa-phone"></i> Contact</h3>
				<div class="textwidget"></div>
			</div>
			<div class="col">
				<h3 class="site-footer__title"><i class="fas fa-map-marked-alt"></i> Location</h3>
				<div class="textwidget"></div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="textwidget">
					<p> <b>PT Jasamarga Tollroad Maintenance </b> merupakan anak usaha dari PT Jasa Marga (Persero) Tbk, penyedia jalan bebas hambatan terbesar di Indonesia, di mana sebesar 99,82% kepemilikannya adalah milik Jasa Marga sebagai induk Perusahaan. Dikenal bergerak dalam bidang pemeliharaan jalan tol untuk mendukung lini bisnis utama Jasa Marga terutama dalam hal pemenuhan Standar Pelayanan Minimum (SPM) jalan tol, PT Jasamarga Tollroad Maintenance memiliki kantor pusat di Jakarta.</p>
				</div>
			</div>
			<div class="col">
				<div class="textwidget">
					<p> <b> Kantor Pusat </b><br>
						Gedung C Graha Service Provider Lantai 1
						Kawasan Kantor Pusat PT Jasa Marga (Persero) Tbk.
						Plaza Tol Taman Mini Indonesia Indah Jakarta 13550 <br>

						Telp : 021 – 2983 5858
						Fax : 021 – 2281 9474
						email : cs@jmtm.co.id
						PT Jasamarga Tollroad Maintenance is a Subsidiary of PT Jasa Marga (Persero) Tbk
					</p>
				</div>
			</div>
			<div class="col">
				<div class="textwidget">
					<div class="map-responsive"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.793126455659!2d106.87660161335393!3d-6.290898695446872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f29c898a114b%3A0xbdc38eee360b6262!2sPT%20Jasa%20Marga%20(Persero)%20Tbk!5e0!3m2!1sid!2sid!4v1629278862403!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>

		<div class="colophon">
			<p> &copy; E-Procurement JasaMarga TollRoad Maintenance (JMTM).</p>
		</div>
	</div>
</footer>

<!-- <div id="footer" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250));color:black;">
   <div class="container">
      <ul class="list-inline row">
         <li class="ml-3"><a href="#" target="_blank" style="color:black;">Pakta Integritas</a></li>
         <li class="ml-3"><a href="#" style="color:black;" target="_blank">Persyaratan dan Ketentuan</a></li>
      </ul>
      <div id="footerInfo">
         <div id="infoRight">
            <p>&copy; 2021 E-Procurement JasaMarga TollRoad Maintenance(<a href="#" target="_blank">JMTM</a>)</p>
         </div>
      </div>
   </div>
</div>
 -->

<!-- Jquery -->


<!-- Bootstrap -->
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js"></script>


<!-- dataTables -->
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/DataTables/media/js/jquery.dataTables.min.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- custom js -->
<script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/js/src/dropdown.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>theme1.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>klik.js"></script>
<script type='text/javascript' src='http://telkominfra.co.id/wp-content/themes/telkominfra/js/navigation.js?ver=20151215'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	// jam digital
	function jam() {
		setInterval(function() {

			var waktu = new Date();
			var jam = document.getElementById('jam2');
			var hours = waktu.getHours();
			var minutes = waktu.getMinutes();
			var seconds = waktu.getSeconds();

			if (waktu.getHours() < 10) {
				hours = '0' + waktu.getHours();
			}
			if (waktu.getMinutes() < 10) {
				minutes = '0' + waktu.getMinutes();
			}
			if (waktu.getSeconds() < 10) {
				seconds = '0' + waktu.getSeconds();
			}
			jam.innerHTML = '<span>' + hours + ':</span>' +
				'<span>' + minutes + ':</span>' +
				'<span>' + seconds + '</span>';
		}, 1000);
	}

	jam();
</script>
</body>
<script>
	document.onkeydown = function(e) {
		if (event.keyCode == 123) {
			return false;
		}
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
			return false;
		}
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
			return false;
		}
		if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
			return false;
		}
	}
</script>

</html>