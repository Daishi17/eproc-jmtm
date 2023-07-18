</head>

<body style="font-size: 13px;">
	<div class="container-fluid">
		<img class="pull-right" alt="LPSE" src="<?= base_url() ?>assets/img/jmtm2.png" width="15%" />
		<img class="pull-left" alt="LPSE" src="<?= base_url() ?>assets/img/bumn.png" width="15%" style="margin-left: 69.5%;" />
	</div>
	<!-- end header -->

	<!-- start navbar -->
	<div style="background-color:yellow;height:5px">
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin-bottom: 10px;">
				<ul class="navbar-nav ml-auto">
					<li>
						<a href="<?= base_url('buka_penawaran/logout') ?>" class="btn btn-sm btn-danger">Logout</a> <a href=""><?= $this->session->userdata('username'); ?> </a> Panitia
					</li>
				</ul>
			</div>
		</div>
		<div style=" background-image: linear-gradient(to top, rgb(252, 252, 252), rgb(75, 136, 250)) !important;height:5px">
		</div>
	</nav>
	<div style="background-color:yellow;height:5px">
	</div>
	<!-- <div class="container">
      <div style="display: flex; float:right;padding-top:10px;">
         <div>
            <a href="">INBOX</a>
            <span class="badge badge-secondary" style="border-radius: 10px;margin-left:5px;margin-right:5px;" for="">5</span>
         </div>
         <div>
            <a href="">Belum dibaca</a>
            <span class="badge badge-secondary" style="border-radius: 10px;margin-left:5px;margin-right:5px;" for="">4</span>
         </div>
         <div>
            <a href="">Sudah dibaca</a>
            <span for="" class="badge badge-secondary" style="border-radius: 10px;margin-left:5px;margin-right:5px;">10</span>
         </div>
      </div>
   </div> -->