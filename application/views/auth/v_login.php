<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta name="description" content="" />
		<title>Login · <?= $this->Application_model->first()->name ?></title>

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
		<meta name="theme-color" content="#563d7c" />

		<style>
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
		<!-- Custom styles for this template -->
		<link href="<?= base_url('assets/plugins/auth.css') ?>" rel="stylesheet" />
	</head>
	<body>
		<form class="form-signin" method="post" action="<?= site_url('login') ?>">
			<input type="hidden" name="redirect" value="<?= $this->input->get('redirect') ?>">
			<div class="text-center mb-4">
				<a href="<?= site_url('/') ?>">
					<img
						class="mb-4"
						src="<?= base_url('assets/'.$this->Application_model->first()->logo)  ?>"
						alt=""
						width="72"
						height="72"
					/>
				</a>
				<!-- <h1 class="h3 mb-3 font-weight-normal">Login</h1> -->
				<p>
					Login admin area. <br />
				</p>
			</div>

			<?php if (validation_errors()) { ?>
			<div class="alert alert-danger shadow-sm" role="alert">
				<?php echo validation_errors(); ?>
			</div>
			<?php } ?>

			<?php if ($this->session->flashdata('info')): ?>
			<div
				class="alert alert-success alert-dismissible fade show shadow-sm"
				role="alert"
			>
				<strong>Info</strong>
				<?php echo $this->session->flashdata('info'); ?>
				<button
					type="button"
					class="close"
					data-dismiss="alert"
					aria-label="Close"
				>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif; ?>

			<div class="form-label-group">
				<input
					type="text"
					id="inputEmail"
					name="username"
					class="form-control shadow-none"
					placeholder="Username"
					value="<?= set_value('username') ?>"
					required
					autofocus
				/>
				<label for="inputEmail">Username</label>
			</div>

			<div class="form-label-group">
				<input
					type="password"
					id="inputPassword"
					name="password"
					class="form-control shadow-none"
					placeholder="Password"
				/>
				<label for="inputPassword">Password</label>
			</div>
			<button
				class="btn btn-lg btn-primary btn-block mb-2"
				name="submit"
				value="submit"
				type="submit"
			>
				Login
			</button>
			<p class="mt-5 mb-3 text-muted text-center">
				&copy; Since 2021-<?= date('Y') ?>
			</p>
		</form>
	</body>
</html>
