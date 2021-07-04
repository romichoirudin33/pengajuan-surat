<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= $this->Application_model->first()->name ?></title>

		<!-- Bootstrap core CSS -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
			crossorigin="anonymous"
		/>

		<!-- Favicons -->
		<link
			rel="icon"
			href="<?= base_url('assets/'.$this->Application_model->first()->logo) ?>"
			sizes="32x32"
			type="image/png"
		/>

		<style>
			* {
				font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
					"Lucida Sans", Arial, sans-serif;
			}

			body {
				background-color: #fdfdfd;
			}

			.bg-white {
				background-color: #fff;
			}

			.text-sm {
				font-size: smaller;
			}

			.title-image {
				background-image: url("<?=base_url('assets/banner-1.jpg')?>");
				background-color: #cccccc;
				height: 250px;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				position: relative;
			}

			.title-text {
				text-align: center;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				color: white;
			}
		</style>
	</head>
	<body>
		<!-- pre-header -->
		<div class="bg-secondary" style="height: 120px">
			<div class="container p-4">
				<h6 class="text-light">
					Selamat datang di Website
					<?= $this->Application_model->first()->name ?>
				</h6>
			</div>
		</div>
		<!-- header -->
		<div class="container" style="margin-top: -57px">
			<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
				<a class="navbar-brand" href="#">
					<img
						src="<?= base_url('assets/'.$this->Application_model->first()->logo) ?>"
						height="30"
						alt=""
					/>
				</a>
				<button
					class="navbar-toggler"
					type="button"
					data-toggle="collapse"
					data-target="#navbarNav"
					aria-controls="navbarNav"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="<?= site_url('home') ?>#">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home') ?>#profil"
								>Profil</a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home') ?>#struktur-desa"
								>Struktur Desa</a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home/ajukan_surat') ?>"
								>Pengajuan Surat</a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home') ?>#galeri"
								>Galeri</a
							>
						</li>
					</ul>
				</div>
			</nav>
		</div>

		<?php isset($content) ? $this->load->view($content) : ''; ?>

		<footer class="bg-dark text-secondary">
			<div class="container pt-5 pb-5">
				<div class="row">
					<div class="col">
						<img
							src="<?= base_url('assets/'.$this->Application_model->first()->logo) ?>"
							height="40"
						/>
						<h6 class="mt-2">Kabupaten Lombok Utara</h6>
						<div class="card bg-transparent border border-secondary">
							<div class="card-body">Memberikan layanan terbaik buat desa</div>
						</div>
					</div>
					<div class="col">
						<ul class="list-group list-group-flush">
							<li class="list-group-item bg-transparent">
								Akar Akar, Bayan, Kabupaten Lombok Utara, Nusa Tenggara Bar.
								83354
							</li>
							<li class="list-group-item bg-transparent">
								Senin - jumat, 08.00 - 15.00
							</li>
							<li class="list-group-item bg-transparent">0819-9951-5318</li>
						</ul>
					</div>
					<div class="col">
						<div class="mapouter">
							<div class="gmap_canvas">
								<iframe
									style="width: 100%"
									height="300"
									id="gmap_canvas"
									src="https://maps.google.com/maps?q=Kantor%20Desa%20Akar%20Akar,%20Akar%20Akar,%20Kabupaten%20Lombok%20Utara,%20Nusa%20Tenggara%20Barat&t=&z=13&ie=UTF8&iwloc=&output=embed"
									frameborder="0"
									scrolling="no"
									marginheight="0"
									marginwidth="0"
								></iframe
								><a href="https://www.whatismyip-address.com/divi-discount/"></a
								><br /><style>
									.mapouter {
										position: relative;
										text-align: right;
										height: 300px;
										width: 100%;
									}</style
								><a href="https://www.embedgooglemap.net">embedgooglemap.net</a
								><style>
									.gmap_canvas {
										overflow: hidden;
										background: none !important;
										height: 300px;
										width: 100%;
									}
								</style>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="<?= base_url('assets/plugins/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>
