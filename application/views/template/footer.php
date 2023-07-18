<div id="footer" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250));color:black;">
	<div class="container">
		<center>
			<div id="footerInfo">
				<div id="infoRight">
					<p>&copy; 2021 E-Procurement Jasamarga Tollroad Maintenance(<a href="#" target="_blank">JMTM</a>)</p>
				</div>
			</div>
		</center>
	</div>
</div>


<!-- Jquery -->


<!-- Bootstrap -->
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/dist/js/bootstrap.min.js"></script>


<!-- dataTables -->
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/DataTables/media/js/jquery.dataTables.min.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="<?= base_url('assets/') ?>kintek.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>boostrapnew/js/src/dropdown.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>theme1.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>klik.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type='text/javascript' src='http://telkominfra.co.id/wp-content/themes/telkominfra/js/navigation.js?ver=20151215'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
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