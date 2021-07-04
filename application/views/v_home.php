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

			.list-group-item {
				padding: 1.5rem 1.25rem;
				border: 1px solid #6c757d;
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
		<div class="container" style="margin-top: -60px">
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
							<a class="nav-link" href="<?= site_url('home') ?>#profil">Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home') ?>#struktur-desa">Struktur Desa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home') ?>#pengajuan-surat">Pengajuan Surat</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('home') ?>#galeri">Galeri</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>

		<!-- carousel -->
		<div
			id="carouselExampleCaptions"
			class="carousel slide"
			data-ride="carousel"
		>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img
						src="<?= base_url('assets/banner-1.jpg') ?>"
						class="d-block w-100"
						alt="..."
					/>
					<div class="carousel-caption d-none d-md-block">
						<h3>
							Selamat datang di Website
							<?= $this->Application_model->first()->name ?>
						</h3>
						<p>Memberikan layanan yang membanggakan.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img
						src="<?= base_url('assets/banner-2.jpg') ?>"
						class="d-block w-100"
						alt="..."
					/>
					<div class="carousel-caption d-none d-md-block">
						<h3>
							Selamat datang di Website
							<?= $this->Application_model->first()->name ?>
						</h3>
						<p>Memberikan kemudahan dalam informasi merupakan impian kami.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img
						src="<?= base_url('assets/banner-3.jpg') ?>"
						class="d-block w-100"
						alt="..."
					/>
					<div class="carousel-caption d-none d-md-block">
						<h3>
							Selamat datang di Website
							<?= $this->Application_model->first()->name ?>
						</h3>
						<p>
							Aduan serta pengajuan surat dapat dilakukan lewat website ini.
						</p>
					</div>
				</div>
			</div>
			<a
				class="carousel-control-prev"
				href="#carouselExampleCaptions"
				role="button"
				data-slide="prev"
			>
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a
				class="carousel-control-next"
				href="#carouselExampleCaptions"
				role="button"
				data-slide="next"
			>
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<section id="profil" class="bg-white">
			<div class="container p-5">
				<h3>Profil</h3>
				<ol>
					<li>
						Kondisi Desa
						<p style="text-align: justify">
							Akar-Akar adalah salah satu desa yang terletak di Kecamatan Bayan,
							Kabupaten Lombok Utara, Provinsi Nusa Tenggara Barat, Indonesia.
							Desa ini sebagian besar penduduknya bersuku Sasak. Pentingnya
							memahami kondisi Desa untuk mengetahui kaitannya dengan
							perencanaan dengan muatan pendukung dan permasalahan yang ada
							memberikan arti penting Keputusan Pembangunan sebagai langkah
							pendayagunaan serta penyelesaian masalah yang timbul di
							masyarakat.
						</p>
						<p style="text-align: justify">
							Desa Akar-akar merupakan salah satu desa dari 9 (Sembilan) Desa
							yang ada di Kecamatan Bayan kabupaten Lombok Utara dengan luas
							50000 Ha. Iklim yang ada di Desa Akar-Akar tidak jauh beda dengan
							iklim yang ada di desa - desa lain di wilayah Indonesia mempunyai
							dua musim yaitu musim penghujan dan musim Kemarau, hal tersebut
							mempunyai pengaruh langsung terhadap pola tanam yang ada di Desa
							Akar -Akar, dan sampai pada saat ini juga tidak ketinggalan
							dibanding dengan kondisi desa-desa yang lain.
						</p>
					</li>
					<li>
						Sejarah Desa
						<p style="text-align: justify">
							Desa Akar-akar adalah Desa pemekaran dari Desa Sukadana Pada tahun
							1966, pada waktu itu desa akar –akar memiliki 4 (empat) dusun
							yaitu: Dusun akar-akar, Dusun Batu Gembung, Dusun Lokok Mumbul dan
							dusun dasan gelumpang. Pada tahun 2000 Desa Akar - Akar
							melaksanakan pemekaran desa dan hasil pemekaran itu menjadi Desa
							Mumbul Sari dan merupakan batas wilayah Desa Akar – Akar untuk
							Sebelah barat. Dan sampai saat ini Desa Akar –Akar memiliki 19
							(Sembilan belas) dusun yaitu: Dusun Akar –Akar, Dusun Akar –Akar
							Utara, Dusun Batu Gembung, Dusun Dasan Gelumpang, Dusun Embar -
							Embar, Dusun Batu Jingkiran, Dusun Terbis, Dusun Pawang Tenun,
							Dusun Pawang Timpas Barat, Dusun Pawang Timpas Timur, Dusun
							Langkang Kok, Dusun Dasan Treng, Dusun Gunjan Sari, Dusun Batu
							Keruk, Dusun Gegurik, Dusun Otak Lendang, Dusun Temuan Sari,Dusun
							Lembah Pedek, Dusun Tanjung Busur.
						</p>
						<p style="text-align: justify">
							Nama Akar-akar diambil dari bahasa Sasak bayan yang berasal dari
							kata “Agar-agar/ tetandan atau jangkar yang berarti akar - akar
							pepohonan. Agar-agar/tetandan atau jangkar pepohonan tumbuh lebat
							disikitar danau/menanga mual yang merupakan lokasi ritual adat
							para leluhur yang didalamnya menurut cerita nenek moyang dihuni
							oleh buaya putih yang dikenal dengan Demung Akar-Akar, buaya putih
							tersebut diceritakan memiliki mahkota yang sama persis dengan
							tetandan/jangkar.
						</p>
					</li>
				</ol>
			</div>
		</section>

		<section class="bg-light">
			<div class="container p-5">
				<img
					src="<?= base_url('assets/struktur-desa.jpg') ?>"
					id="struktur-desa"
					class="w-100"
				/>
			</div>
		</section>

		<section id="pengajuan-surat" class="bg-white">
			<div class="container p-5">
				<div class="row align-items-center">
					<div class="col">
						<img
							src="<?= base_url('assets/avatar-pengajuan.jpg') ?>"
							class="d-block w-100"
						/>
					</div>
					<div class="col">
						<h1 class="mb-4">Pengajuan Surat</h1>

						<p>
							Mau mengurus surat keterangan ke desa ?? <br />
							Sekarang dapat langsung melalui website ini !
						</p>

						<p>Klik tombol di bawah ini untuk melakukan pengajuan surat !</p>
						<a href="<?= site_url('home/ajukan_surat') ?>" class="btn btn-outline-primary mt-4">
							<i class="fas fa-paper-plane"></i> Ajukan Surat
						</a>
					</div>
				</div>
			</div>
		</section>

		<section id="galeri" class="bg-light">
			<div class="container p-5 text-center">
				<h2 class="mb-5">Galeri</h2>
				<div class="row">
					<div class="col">
						<img src="<?= base_url('assets/galeri-1.jpeg') ?>" class="w-100" />
					</div>
					<div class="col">
						<img src="<?= base_url('assets/galeri-2.jpeg') ?>" class="w-100" />
					</div>
					<div class="col">
						<img src="<?= base_url('assets/galeri-3.jpeg') ?>" class="w-100" />
					</div>
					<div class="col">
						<img src="<?= base_url('assets/galeri-4.jpeg') ?>" class="w-100" />
					</div>
				</div>
			</div>
		</section>

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
