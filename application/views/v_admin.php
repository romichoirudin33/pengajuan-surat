<html>
	<head>
		<title>Admin</title>
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/dashboard.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
			crossorigin="anonymous"
		/>
		<link
			href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css"
			rel="stylesheet"
		/>
		<!-- Favicons -->
		<link
			rel="icon"
			href="<?= base_url('assets/'.$this->Application_model->first()->logo) ?>"
			sizes="32x32"
			type="image/png"
		/>
		<style>
			body {
				background-color: #eee;
			}
			.btn-xs {
				padding: 0.1rem 0.25rem;
				font-size: 0.65rem;
				line-height: 1.5;
				border-radius: 0.1rem;
			}
			.text-sm {
				font-size: 13;
			}
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>
	</head>
	<body>
		<nav
			class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
		>
			<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Admin</a>
			<button
				class="navbar-toggler position-absolute d-md-none collapsed"
				type="button"
				data-toggle="collapse"
				data-target="#sidebarMenu"
				aria-controls="sidebarMenu"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a
						class="nav-link"
						href="<?= site_url('login/destroy') ?>"
						onclick="return confirm('Anda yakin akan logout ?')"
					>
						Sign out
					</a>
				</li>
			</ul>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<nav
					id="sidebarMenu"
					class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
				>
					<div class="sidebar-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(2)=="home" ? 'active' : '' ?>" href="<?= site_url('admin/home') ?>">
									<i class="fas fa-home"></i>
									Dashboard <span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(2)=="penduduk" ? 'active' : '' ?>" href="<?= site_url('admin/penduduk') ?>">
									<i class="fas fa-list"></i>
									Penduduk
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(2)=="surat" ? 'active' : '' ?>" href="<?= site_url('admin/surat') ?>">
									<i class="fas fa-users"></i>
									Surat
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(2)=="pengajuan_surat" ? 'active' : '' ?>" href="<?= site_url('admin/pengajuan_surat') ?>">
									<i class="fas fa-user"></i>
									Pengajuan Surat
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= $this->uri->segment(2)=="user_admin" ? 'active' : '' ?>" href="<?= site_url('admin/user_admin') ?>">
									<i class="fas fa-chart-pie"></i>
									User
								</a>
							</li>
						</ul>
					</div>
				</nav>
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pb-4">
					<?php isset($content) ? $this->load->view($content) : ''; ?>
				</main>
			</div>
		</div>
	
		<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
		<script src="<?= base_url('assets/plugins/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


		
		<script>
			$(document).ready(function () {
				$(".table").DataTable();
				$("#summernote").summernote({height:300});

				
			});
		</script>
	</body>
</html>
