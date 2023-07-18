<script>
	var serverside_transaksi_langsung = $('#serverside_transaksi_langsung')

	$(document).ready(function() {
		serverside_transaksi_langsung.DataTable({
			"responsive": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= base_url('penetapanlangsung/get_paket_yang_sedang_berjalan/') ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"target": [-1],
				"orderable": false
			}],
			"oLanguage": {
				"sSearch": "Pencarian : ",
				"sEmptyTable": "Data Tidak Tersedia",
				"sLoadingRecords": "Silahkan Tunggu - loading...",
				"sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
				"sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
			}
		});
	});
</script>


<!-- INI UNTUK CHAT NEGOSIASI  Transaksi Langsung-->
<script>
	$(document).ready(function() {
		$('#klik_file').click(function() {
			$('#file').toggle();
		});
	})
	$(document).ready(function() {
		$('#action_menu_btn').click(function() {
			$('.action_menu').toggle();
		}); // ini Untuk Menu Pengaturan
		pesan()

		function pesan() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/ngeload_chat_transaksi_langsung/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
					id_penerima: id_penerima,
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
					d.forEach(d => {

						var today = new Date();
						var dd = String(today.getDate()).padStart(2, '0');
						var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
						var yyyy = today.getFullYear();

						today = dd + '-' + mm + '-' + yyyy;
						// console.log(today);

						var times = new Date(d.waktu)
						var time = times.toLocaleTimeString()
						var tanggal = String(times.getDate()).padStart(2, '0');
						var bulan = String(times.getMonth() + 1).padStart(2, '0');
						var tahun = times.getFullYear()
						var lengkapDB = tanggal + '-' + bulan + '-' + tahun
						// console.log(lengkapDB == today)
						var kapan = "Today"
						var tanggal_bulan = tanggal + "-" + bulan
						if (lengkapDB != today) {
							kapan = tanggal_bulan
						}
						// console.log(kapan)
						if (parseInt(d.id_pengirim) == id_pengirim) {
							if (d.dokumen_chat == null) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';
							} else if (d.dokumen_chat) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									// '<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
									'<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
									'<br>' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';

							} else if (d.img_chat) {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'<img width="100px" src="<?= base_url('file_chat/') ?>' + d.img_chat + '">' +
									// '<a  class="text-primary" href="<?= base_url('/file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
									'<br>' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';

							} else {
								html += '<div class="d-flex justify-content-end mb-4">' +
									'<div class="msg_cotainer_send">' +
									'' + d.isi + '' +
									'<span class="msg_time">' + kapan + ',' + time + '</span>' +
									'</div>' +
									'</div>';
							}
						} else if (parseInt(d.id_penerima) == id_penerima) {
							if (d.dokumen_chat == null) {
								html += `<label class="badge badge-primary ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							} else {
								html += `<label class="badge badge-primary ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('base') ?>"> ${d.dokumen_chat}</a>
                        <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
							}
						} else {
							if (d.dokumen_chat == null) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
							} else if (d.dokumen_chat) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else if (d.img_chat) {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100px" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							} else {
								html += `<label class="badge badge-danger ml-5" >${d.username_vendor}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
							}
						}
						// notifikasis
					});
					// console.log(html)
					$('#letakpesan').html(html);

				}
			});

		}

		function notif() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/ngeload_notif_transaksi_langsung/" + id_paket,
				data: {
					id_pengirim: id_pengirim,
					id_penerima: id_penerima,
				},
				dataType: "json",
				success: function(r) {
					var n = r.data;
					$("#notifikasi").html(n);
				}
			});

		}
		setInterval(() => {
			pesan()
			notif()
		}, 1000);
		var form_kirim_chat_transaksi_langsung = $('#form_kirim_chat_transaksi_langsung');
		$('#form_kirim_chat_transaksi_langsung').on('submit', function(e) {
			e.preventDefault();
			var isi = $('.type_msg').val();
			var id_paket = $('#id_paket').val();
			if (isi != "") {
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>paket/kirim_pesan_transaksi_langsung/" + id_paket,
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(r) {
						form_kirim_chat_transaksi_langsung[0].reset();
						if (r.status) {
							$('.search_btn').trigger('click');
							$('.type_msg').val('');
							scrollToBottom()
						}

					}
				});
			}


		});
		scrollToBottom()

		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000
			}, "slow");
		}


		pesan()
		$('.search_btn').click(function(e) {
			pesan()
		});
		orang()

		function orang() {
			var id_penerima = '<?= $data2['id_mengikuti_vendor'] ?>';
			var id_paket = $('#id_paket').val();
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>paket/GetAllVendor_transaksi_langsung/" + id_paket + '/' + id_penerima,
				dataType: "json",
				success: function(response) {
					var html = '';
					var x = 0;
					var i;
					for (i = 0; i < response['vendor'].length; i++) {

						html +=
							'<li class="active-angga coba" data-id="' + response['vendor'][i].id_mengikuti_vendor + '">' +
							'<div class="d-flex bd-highlight ">' +
							'<div class="img_cont ">' +
							'<img src="<?= base_url('assets/img/servant.png') ?>" alt="" class="rounded-circle user_img_msg">' +
							'<span class="online_icon " ></span>' +
							'</div>' +
							'<div class="user_info">' +
							'<span class="">' + response['vendor'][i].username_vendor + '</a>' + '</span>' +
							'<p class="">' + response['vendor'][i].username_vendor + ' is online</p>' +
							'</div>' +
							'</div>' +
							'</li>';
					}
					$('#yangAktif').html(html);
				}
			});
		}

		// $('#sudahdibaca').on('click', function() {
		// 	var id_paket = $('#id_paket').val();
		// 	var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
		// 	$.ajax({
		// 		type: "post",
		// 		url: "<?= base_url() ?>panitiajmtm/beranda/sudah_dibaca2/" + id_paket,
		// 		data: {
		// 			id_pengirim: id_pengirim,
		// 		},
		// 		dataType: "json",
		// 		success: function(data) {
		// 			window.location.replace("<?= base_url() ?>panitiajmtm/beranda/pertanyaantender/" + id_paket);

		// 		}
		// 	});
		// });
	});
</script>