<div
	class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
	<h1 class="h2">Administrator</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<a
				href="<?= site_url('admin/user_admin') ?>"
				class="btn btn-sm btn-outline-secondary"
			>
				<i class="fas fa-arrow-left"></i> Kembali
			</a>
		</div>
	</div>
</div>

<?php if (validation_errors()) { ?>
	<div class="alert alert-danger shadow-sm" role="alert">
	<?php echo validation_errors(); ?>
	</div>
<?php } ?>

<div class="card">
	<div class="card-body">
		<form
			action="<?= site_url('admin/user_admin/edit/'.$data->id) ?>"
			method="post"
			enctype="multipart/form-data"
		>
			<div class="row">
				<div class="col-4">
					<div class="form-group">
						<label for="name">Nama Administrator</label>
						<input type="text" class="form-control" name="name" value="<?= $data->name ?>"/>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" readonly value="<?= $data->email ?>"/>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" readonly value="<?= $data->username ?>"/>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" value="<?= $data->password ?>"/>
					</div>
					<div class="form-group">
						<label for="passconf">Ulangi Password</label>
						<input type="password" class="form-control" name="passconf" value="<?= $data->password ?>"/>
					</div>
					<div class="form-group">
						<button
							class="btn btn-primary"
							type="submit"
							name="submit"
							value="submit"
						>
							<i class="fas fa-save"></i> Simpan
						</button>
						<a
							href="<?= site_url('admin/user_admin') ?>"
							class="btn btn-outline-secondary"
						>
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<label for="photo">Photo</label>
						<input type="file" class="form-control" name="photo" />
						<span class="text-block">Isi kolom jika gambar ingin diganti</span>
					</div>
					<div class="form-group">
						<label for="address">Alamat</label>
						<textarea
							class="form-control"
							id="summernote2"
							name="address"
							style="height: 300px"
						><?= $data->address ?></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
