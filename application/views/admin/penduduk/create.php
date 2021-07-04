<div
	class="
		d-flex
		justify-content-between
		flex-wrap flex-md-nowrap
		align-items-center
		pt-3
		pb-2
		mb-3
		border-bottom
	"
>
	<h1 class="h2">Penduduk</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<a
				href="<?= site_url('admin/penduduk') ?>"
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
			action="<?= site_url('admin/penduduk/create') ?>"
			method="post"
			enctype="multipart/form-data"
		>
			<div class="row">
				<div class="col-4">
					<div class="form-group">
						<label for="nik">NIK</label>
						<input
							type="text"
							class="form-control"
							name="nik"
							value="<?= set_value('nik') ?>"
						/>
					</div>
					<div class="form-group">
						<label for="nama_lengkap">Nama Lengkap</label>
						<input
							type="text"
							class="form-control"
							name="nama_lengkap"
							value="<?= set_value('nama_lengkap') ?>"
						/>
					</div>
					<div class="form-group">
						<label for="tempat_lahir">Tempat Lahir</label>
						<input
							type="text"
							class="form-control"
							name="tempat_lahir"
							value="<?= set_value('tempat_lahir') ?>"
						/>
					</div>
					<div class="form-group">
						<label for="tanggal_lahir">Tgl Lahir</label>
						<input
							type="date"
							class="form-control"
							name="tanggal_lahir"
							value="<?= set_value('tanggal_lahir') ?>"
						/>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control">
							<option value="<?= set_value('jenis_kelamin') ?>">
								<?= set_value('jenis_kelamin') ?? 'Pilih' ?>
							</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="status_kawin">Status Kawin</label>
						<select name="status_kawin" class="form-control">
							<option value="<?= set_value('status_kawin') ?>">
								<?= set_value('status_kawin') ?? 'Pilih' ?>
							</option>
							<option value="Belum Kawin">Belum Kawin</option>
							<option value="Kawin">Kawin</option>
							<option value="Cerai Hidup">Cerai Hidup</option>
							<option value="Cerai Mati">Cerai Mati</option>
						</select>
					</div>
					<div class="form-group">
						<label for="agama">Agama</label>
						<select name="agama" class="form-control">
							<option value="<?= set_value('agama') ?>">
								<?= set_value('agama') ?? 'Pilih' ?>
							</option>
							<option value="Islam">Islam</option>
							<option value="Hindu">Hindu</option>
							<option value="Kristen">Kristen</option>
							<option value="Katholik">Katholik</option>
							<option value="Budha">Budha</option>
							<option value="Kong Hu Cu">Kong Hu Cu</option>
						</select>
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
							href="<?= site_url('admin/penduduk') ?>"
							class="btn btn-outline-secondary"
						>
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<label for="kewarganegaraan">Kewarganegaraan</label>
						<select name="kewarganegaraan" class="form-control">
							<option value="<?= set_value('kewarganegaraan') ?>">
								<?= set_value('kewarganegaraan') ?? 'Pilih' ?>
							</option>
							<option value="WNI">WNI</option>
							<option value="WNA">WNA</option>
						</select>
					</div>
					<div class="form-group">
						<label for="pekerjaan">Status Pekerjaan</label>
						<input
							type="text"
							class="form-control"
							name="pekerjaan"
							value="<?= set_value('pekerjaan') ?>"
						/>
					</div>
					<div class="form-group">
						<label for="photo">Photo / KTP</label>
						<input type="file" class="form-control" name="photo" />
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea
							class="form-control"
							id="summernote2"
							name="alamat"
							style="height: 200px"
						>
<?= set_value('alamat') ?></textarea
						>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
