<div id="footer" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250));color:black;">
	<div class="container">
		<div id="footerInfo">
			<div id="infoRight">
				<p>&copy; 2021 E-Procurement Jasamarga Tollroad Maintenance(<a href="#" target="_blank">JMTM</a>)</p>
			</div>
		</div>
	</div>
</div>


<!-- Jquery -->


<!-- Bootstrap -->
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js"></script>


<!-- dataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- custom js -->
<script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.full.min.js"></script>
<script>
	// jam digital
	function jam() {
		setInterval(function() {

			var waktu = new Date();
			var jam = document.getElementById('jam4');
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


<script>
	$(document).ready(function() {
		window.setTimeout(function() {
			$(".preloader").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 2000)
	})
</script>
</body>

</html>