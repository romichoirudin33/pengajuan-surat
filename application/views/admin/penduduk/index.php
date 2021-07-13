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
				href="<?= site_url('admin/penduduk/create') ?>"
				class="btn btn-sm btn-outline-secondary"
			>
				<i class="fas fa-plus"></i> Tambah
			</a>
		</div>
	</div>
</div>

<?php if ($this->session->flashdata('info')): ?>
<div
	class="alert alert-success alert-dismissible fade show shadow-sm"
	role="alert"
>
	<strong>Info</strong>
	<?php echo $this->session->flashdata('info'); ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php endif; ?>

<div class="card mb-2">
	<div class="card-body">
		<h5>Filter berdasarkan tanggal lahir</h5>
		<form action="" method="GET" class="mb-0">
			<div class="row">
				<div class="col-5">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl Mulai</label>
						<div class="col-sm-9">
							<input
								type="date"
								class="form-control"
								name="start"
								value="<?= $this->input->get('start') ?>"
							/>
						</div>
					</div>
				</div>
				<div class="col-5">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl akhir</label>
						<div class="col-sm-9">
							<input
								type="date"
								class="form-control"
								name="end"
								value="<?= $this->input->get('end') ?>"
							/>
						</div>
					</div>
				</div>
				<div class="col-2">
					<input type="submit" class="btn btn-outline-primary" value="Cari" />
				</div>
			</div>
		</form>
	</div>
</div>

<?php if ($data) { ?>
	<div class="card">
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<thead>
				<tr class="text-center text-uppercase">
					<th>photo</th>
					<th>nama lengkap</th>
					<th>ttl</th>
					<th>jenis_kelamin</th>
					<th>alamat</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($data as $key) { ?>
				<tr class="text-center">
					<td width="15%">
						<img
							class="img-fluid"
							src="<?= base_url('assets/photo_penduduk/'.$key->photo) ?>"
						/>
					</td>
					<td class="text-left">
						<?= $key->nama_lengkap ?> <br />
						<small
							><b><?= $key->nik ?></b></small
						>
					</td>
					<td class="text-left">
						<?= $key->tempat_lahir ?>,
						<?= date('d-m-Y', strtotime($key->tanggal_lahir)) ?>
					</td>
					<td class="text-left"><?= $key->jenis_kelamin ?></td>
					<td class="text-left"><?= $key->alamat ?></td>
					<td>
						<a
							href="<?= site_url('admin/penduduk/edit/'.$key->id) ?>"
							class="btn btn-primary btn-sm"
						>
							<i class="fas fa-edit"></i>
						</a>
						<a
							href="<?= site_url('admin/penduduk/destroy/'.$key->id) ?>"
							class="btn btn-danger btn-sm"
							onclick="return confirm('Anda yakin hapus data ini ?')"
						>
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
	<?php } else { ?>
		<div class="alert alert-primary" role="alert">
  <?= $msg ?>
</div>
<?php } ?>


