</head>

<body style="font-size: 13px;">

	<!-- start navbar -->
	<header class="site-header pos-relative">
		<div class="site-header__top  btn-grad4">
			<div class="container">
				<nav class="site-navigation --secondary">
					<div class="menu-top-menu-container">
						<ul id="menu-top-menu" class="menu">
							<li id="menu-item-366" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-19 current_page_item menu-item-366">
								<a href="javascript:;" class="" style="font-weight: bold;color:white;" data-toggle="modal" data-target="#tentangkami"> <i class="far fa-address-card"> </i> &nbsp;Tentang Kami</a>
							</li>
							<li id="menu-item-444" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-444"><a style="font-weight: bold;" href="#contact"><i class="fas fa-phone-square"></i> Kontak Kami</a>
							</li>
							<li id="menu-item-9" class="  menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a href="javascript:;" style="font-weight: bold;" data-toggle="modal" data-target="#ketentuan"><i class="fas fa-file-signature"></i> Persyaratan dan Ketentuan</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="site-header__bottom btn-grad">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<h1 class="site-brand" style="margin-left:-70px;">
						<a href="#">
							<img alt="LPSE" src="<?= base_url() ?>assets/img/JasaMarga_logobumn.png" width="300px">
						</a>
					</h1>
					<button class="site-toggler"><i class="fas fa-bars"></i></button>
					<nav class="site-navigation no-show">
						<div class="menu-menu-primary-container">
							<ul id="menu-menu-primary" class="menu">
								<li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62"><a style="color:white;font-weight: bold;" href="<?= base_url('home') ?>"><i class="fas fa fa-home"></i> Beranda</a></li>
								<li id="menu-item-355" style="margin-left: -10px;" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-355"><a style="color:white;font-weight: bold;" href="#"><i class="fab fa-searchengin"></i> Cari Paket</a></li>
								<li id="menu-item-62" style="margin-left: -10px;" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62"><a style="color:white;font-weight: bold;" href="javascript:;" data-toggle="modal" data-target="#regulasi"><i class="fas fa-balance-scale"></i> Regulasi</a></li>
								<!-- <li id="menu-item-344" style="margin-left: -20px;" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-344"><a style="color:white;font-weight: bold;" href="#"><i class="fas fa-book-dead"></i> Daftar Hitam</a></li> -->
								<li id="menu-item-365" style="margin-left: -20px;" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-365"><a style="color:white;font-weight: bold;" href="https://www.instagram.com/jmtm.official/" target="_blank"><i class="fas fa-camera-retro"></i> Konten Khusus</a></li>
								<li id="menu-item-380" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-380"><a style="color:white;font-weight: bold;" class="btn-grad2" href="https://vms.jmtm.co.id/home/daftarvendor">Daftar Penyedia</a></li>
								<li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12">
									<a class="btn-grad3" style="color:white;font-weight: bold;" href="#">Login</a>
									<ul class="sub-menu btn-grad3">
										<!-- <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-355"><a style="color:black;" href="https://vms.jmtm.co.id/auth">Penyedia</a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-356"><a style="color:black;" href="https://jmtm-eproc.kintekindo.net/auth">Non Penyedia</a></li> -->
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-355"><a style="color:black;" href="https://localhost/jmtm-vendor/auth">Penyedia</a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-356"><a style="color:black;" href="<?= base_url('auth') ?>">Non Penyedia</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- <div class="site-search">
								<form method="get" id="searchform" action="https://telkominfra.co.id/">
									<input type="text" name="s">
								</form>
							</div> -->
					</nav>
				</div>
			</div>
		</div>
		<div style="background-color:yellow;height:5px">
		</div>
	</header>

	<!-- Modal -->
	<div class="modal fade" id="tentangkami" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header btn-grad6">
					<h5 class="modal-title text-white" id="exampleModalLongTitle">TENTANG KAMI</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container marketing">
						<img src="https://jmtm.co.id/assets/template/images/logo-jmtm.png" alt="logo">
						<!-- Area kotak -->
						<div class="kotak">
							<!-- area profil -->
							<div class="profile">
								<h1>PROFIL PERUSAHAAN</h1>
								<p>PT Jasamarga Tollroad Maintenance merupakan anak usaha dari PT Jasa Marga (Persero) Tbk, penyedia jalan bebas hambatan terbesar di Indonesia, di mana sebesar 99,82% kepemilikannya adalah milik Jasa Marga sebagai induk Perusahaan. Dikenal bergerak dalam bidang pemeliharaan jalan tol untuk mendukung lini bisnis utama Jasa Marga terutama dalam hal pemenuhan Standar Pelayanan Minimum (SPM) jalan tol, PT Jasamarga Tollroad Maintenance memiliki kantor pusat di Jakarta.</p>

								<p>
									<img src="https://jmtm.co.id/assets/template/images/tentang-kami1.jpg" alt="gambar isi">
								</p>

								<h2>Strategi Kami</h2>
								<p>
									Jasamarga Tollroad Maintenance kian mantap dan memfokuskan pekerjaan pada pemeliharaan jalan tol, termasuk jembatan tol, serta seluruh fasilitasnya. Tentu saja semua dilakukan dengan kualitas tinggi yang menjadi standar kami. Oleh karena itu, memproduksi sarana dan prasarana untuk pemeliharaan dan pengoperasian jalan dan jembatan tol menjadi bagian dari strategi usaha yang akan terus kami kembangkan dengan inovasi dan teknologi yang selalu terbarukan.
								</p>
								<p>
									<img src="https://jmtm.co.id/assets/template/images/tentang-kami2.jpg" alt="gambar isi">
								</p>
								<p>
									Dengan standar dan kontrol yang kami miliki inilah jaminan kualitas pemeliharaan konstruksi dan jalan tol yang kami kerjakan dapat melampaui Standar Pelayanan Minimum (SPM) dari Jasa Marga sebagai perusahaan induk. Jasamarga Tollroad Maintenance juga menjalin kerja sama dengan mitra bisnis strategis yang memiliki kemampuan dan keahlian di bidangnya. Pun segala kegiatan pemasaran dilaksanakan oleh manajemen yang profesional, handal dan terpercaya. Sehingga seiring berjalannya bisnis, Perusahaan dapat selalu mengedepankan prinsip-prinsip “Good Corporate Governance” dalam proyek atau pekerjaan, baik yang sedang maupun yang akan digarap di masa depan.
								</p>
							</div>
						</div>
					</div><!-- /.container -->
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="ketentuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header btn-grad6">
					<h5 class="modal-title text-white" id="exampleModalLongTitle">SYARAT DAN KETENTUAN</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container marketing">
						<img src="https://jmtm.co.id/assets/template/images/logo-jmtm.png" alt="logo">
						<!-- Area kotak -->
						<div class="kotak">
							<!-- area profil -->
							<div class="profile">
								<br>
								<p>
									Syarat dan ketentuan penggunaan E-Procurement<b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dimaksudkan untuk menginformasikan ketentuan yang berlaku dalam situs E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dan harus disepakati oleh pihak mitra kerja untuk dapar menjadi Penyedia di lingkungan <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> , sebagaimana diatur di bawah ini:
								</p>

								<h5>1. UMUM</h5>
								<ul>
									<ul>a. <a class="text-primary" href="https://eproc.jmtm.co.id">https://eproc.jmtm.co.id </a>adalah situs online yang bertujuan untuk memfasilitasi antara mitra kerja untuk menjadi Penyedia di lingkungan <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> </ul>
									<ul>b. Pengguna E-Procurement (Calon Penyedia / Penyedia) wajib tunduk pada Syarat dan Ketentuan E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> ini serta kebijakan lain yang ditetapkan dan berlaku di <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .</ul>
								</ul>
								<h5>2. KEANGGOTAAN</h5>
								<ul>
									<ul>a.Untuk menjadi Penyedia, Calon Penyedia harus terlebih dahulu mengisi formulir registrasi secara online dengan data yang benar dan akurat sesuai keadaan yang sebenarnya.</ul>
									<ul>
										b. Calon Penyedia hanya akan dinyatakan resmi sebagai Penyedia apabila telah mendapatkan Surat DPT (Daftar Penyedia Terseleksi) dari <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .
									</ul>
									<ul>
										c. Penyedia yang sudah mendapatkan DPT wajib memperbaharui data-data Perusahaan apabila sudah tidak sesuai lagi dengan keadaan yang sebenarnya atau jika tidak sesuai dengan ketentuan ini dan/atau peraturan perundang-undangan yang berlaku.
									</ul>
									<ul>
										d. Setiap Perusahaan hanya diperkenankan memiliki 1 (satu) account Penyedia.
									</ul>
									<ul>
										DPT ini tidak berlaku jika:
										<ul>
											1. Penyedia terkena sanksi atau masalah hukum sesuai dengan ketentuan dan perundang-undangan yang berlaku.
											Dokumen administrasi habis masa berlakunya.
										</ul>
										<ul>
											2. Penyedia melanggar ketentuan sebagaimana yang diatur dalam Syarat dan ketentuan penggunaan E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .
											DPT dapat digunakan sebagai salah satu persyaratan pendaftaran proses pengadaan.
										</ul>
										<ul>
											3. Calon Penyedia dan Penyedia harus mematuhi semua persyaratan yang dibutuhkan dan memahami bahwa usaha dalam bentuk apapun untuk dapat menembus sistem komputer dengan tujuan memanipulasi data Perusahaan merupakan tindakan melanggar hukum dan akan dikenakan sanksi sesuai dengan ketentuan dan perundang-undangan yang berlaku.
										</ul>
									</ul>
								</ul>
								<h5>3. TANGGUNG JAWAB PENGGUNAAN ACCOUNT PENYEDIA</h5>
								<ul>
									a. Calon Penyedia dan Penyedia akan diberikan account yang digunakan untuk dapat login pada E-Procurement.
								</ul>
								<ul>
									b. Calon Penyedia dan Penyedia bertanggungjawab atas kerahasiaan username dan password yang diberikan oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> ./li>
									Setiap atau seluruh kerugian yang timbul sebagai akibat dari penyalahgunaan username dan password yang diberikan oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> oleh Calon Penyedia dan Penyedia menjadi tanggungjawab dari Calon Penyedia dan Penyedia.
								</ul>
								<ul>c. Calon Penyedia dan Penyedia setuju untuk segera memberitahukan kepada Admin <b>VMS (Vendor Management System)</b> <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> apabila mengetahui adanya penyalahgunaan account miliknya oleh pihak lain yang tidak berhak atau jika ada gangguan keamanan atas account miliknya itu, segera setelah diketahui adanya penyalahgunaan atau gangguan tersebut.</ul>

								<h5>4. EVALUASI PENYEDIA</h5>
								<ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> akan melakukan evaluasi data Penyedia dan memeriksa keaslian serta keabsahan seluruh dokumen Penyedia yang diunggah kedalam system E-Procurement.</ul>
								<ul>
									b. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat sewaktu-waktu melakukan kunjungan kelokasi sesuai dengan alamat yang dicantumkan tanpa atau dengan pemberitahuan terlebih dahulu kepada Calon Penyedia atau Penyedia.
								</ul>

								<h5>5. TANGGUNG JAWAB DAN RISIKO</h5>
								<ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> tidak bertanggung jawab atas segala akibat yang timbul karena adanya gangguan jaringan koneksi dan penyalahgunaan oleh pihak lain yang menggunakan situs ini.</ul>
								<ul>b. E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat dihubungkan/ditautkan dengan situs lain yang dimiliki dan dioperasikan oleh pihak ketiga. Untuk itu <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> tidak bertanggung jawab atas segala risiko yang terjadi akibat tautan yang dilakukan oleh pihak ketiga tersebut.</ul>
								<ul>
									c. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> tidak menjamin dan tidak bertanggungjawab, bahwa layanan ini akan berlangsung terus tanpa gangguan, tepat waktu, aman atau sama sekali tanpa kesalahan.
								</ul>
								<ul>
									d. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat sewaktu-waktu memperbaharui sistem E-Procurement ini tanpa pemberitahuan sebelumnya kepada Penyedia. Dalam hal ini Penyedia diwajibkan mengunjungi situs secara berkala.
								</ul>

								<h5>6. GANTI KERUGIAN</h5>
								<ul>a. Calon Penyedia & Penyedia setuju untuk menanggung segala risiko yang timbul akibat adanya kesalahan informasi maupun penyalahgunaan situs ini yang dilakukan oleh Calon Penyedia & Penyedia, adanya klaim dari pihak ketiga, termasuk membayar ganti rugi kepada <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> beserta afiliasinya, dan karyawannya dari semua kerugian yang mungkin akan ditanggung oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> (termasuk biaya kuasa hukum).</ul>

								<h5>7. PERLINDUNGAN HAK CIPTA</h5>
								<ul>a. Calon Penyedia & Penyedia setuju untuk tidak akan, untuk kepentingan komersial, mengupload, menstranmisikan, mereproduksi, menyebarluaskan atau berpartisipasi di dalam pemindahtanganan atau penjualan, atau dengan cara apapun memanfaatkan setiap content yang diperoleh dari E-Procurement <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> .</ul>

								<h5>8. PERUBAHAN KETENTUAN</h5>
								<ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> dapat memperbaiki, menambah, atau mengurangi ketentuan ini setiap saat, dengan atau tanpa pemberitahuan sebelumnya kepada Penyedia. Dalam hal terdapat perubahan yang dilakukan oleh <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> maka Penyedia harus melakukan penyesuaian terhadap adanya perubahan tersebut.</ul>

								<h5>9. PEMUTUSAN PERJANJIAN</h5>
								<ul>a. <b>PT. JASAMARGA TOLLROAD MAINTENANCE</b> berhak menonaktifkan status Penyedia dan menghapus data Penyedia jika diperlukan secara sepihak apabila Penyedia dianggap tidak dapat memenuhi dan mentaati ketentuan - ketentuan ini.</ul>
								<br>
								<div class="bs-callout btn-grad5">
									<ul>
										<b>DENGAN INI KAMI TELAH MEMBACA MEMAHAMI DAN SETUJU UNTUK MEMATUHI SEGALA ATURAN DAN PERSYARATAN DIATAS.</b>
									</ul>
								</div>
							</div>
						</div>
					</div><!-- /.container -->
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="regulasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header btn-grad6">
					<h5 class="modal-title text-white" id="exampleModalLongTitle">REGULASI</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container marketing">
						<img alt="LPSE" src="<?= base_url() ?>assets/img/JasaMarga_logobumn.png" width="450px">

						<!-- Area kotak -->
						<div class="kotak">
							<!-- area profil -->
							<div class="profile">
								<p>Pengadaan Barang Dan Jasa Pada PT.Jasamarga Tollroad Maintenance(JMTM) Dilaksanakan Sesuai Dengan Surat Keputusan Pengadaan Barang Dan Jasa, Yang Berlaku Di Lingkungan PT.Jasamarga Tollroad Maintenance(JMTM)</p>
							</div>
						</div>
					</div><!-- /.container -->
				</div>
			</div>
		</div>
	</div>