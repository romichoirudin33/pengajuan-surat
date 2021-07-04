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
	<h1 class="h2">Surat</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<a
				href="<?= site_url('admin/surat/create') ?>"
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

<div class="card">
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<thead>
				<tr class="text-center text-uppercase">
					<th>contoh surat</th>
					<th>jenis surat</th>
					<th>keterangan surat</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($data as $key) { ?>
				<tr class="text-center">
					<td width="15%">
						<a
							target="_blank"
							href="<?= base_url('assets/contoh_file/'.$key->contoh_file) ?>"
						>
							<?= $key->contoh_file ?>
						</a>
					</td>
					<td class="text-left"><?= $key->jenis_surat ?></td>
					<td class="text-left"><?= $key->keterangan_surat ?></td>
					<td>
						<a
							href="<?= site_url('admin/surat/edit/'.$key->id) ?>"
							class="btn btn-primary btn-sm"
						>
							<i class="fas fa-edit"></i>
						</a>
						<a
							href="<?= site_url('admin/surat/destroy/'.$key->id) ?>"
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
