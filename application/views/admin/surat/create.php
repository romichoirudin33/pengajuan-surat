<div
	class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
	<h1 class="h2">Surat</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<a
				href="<?= site_url('admin/surat') ?>"
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
			action="<?= site_url('admin/surat/create') ?>"
			method="post"
			enctype="multipart/form-data"
		>
			<div class="row">
				<div class="col-4">
					<div class="form-group">
						<label for="jenis_surat">Jenis Surat</label>
						<input type="text" class="form-control" name="jenis_surat" value="<?= set_value('jenis_surat') ?>"/>
					</div>
					<div class="form-group">
						<label for="contoh_file">Contoh Surat</label>
						<input type="file" class="form-control" name="contoh_file" />
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
							href="<?= site_url('admin/surat') ?>"
							class="btn btn-outline-secondary"
						>
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<label for="keterangan_surat">Keterangan Surat</label>
						<textarea
							class="form-control"
							id="summernote2"
							name="keterangan_surat"
							style="height: 150px"
						><?= set_value('keterangan_surat') ?></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
