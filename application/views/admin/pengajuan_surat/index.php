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
	<h1 class="h2">Pengajuan Surat</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<a
				href="<?= site_url('admin/pengajuan_surat/index?proses=baru') ?>"
				class="btn btn-sm btn-outline-primary"
			>
				Baru <span class="badge badge-primary"><?= count($baru) ?></span>
			</a>
			<a
				href="<?= site_url('admin/pengajuan_surat/index?proses=diproses') ?>"
				class="btn btn-sm btn-outline-success"
			>
			Diproses <span class="badge badge-success"><?= count($diproses) ?></span>
			</a>
			<a
				href="<?= site_url('admin/pengajuan_surat/index?proses=ditolak') ?>"
				class="btn btn-sm btn-outline-danger"
			>
				Ditolak <i class="fas fa-times"></i>
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
		<table class="table table-bordered table-striped table-sm">
			<thead>
				<tr class="text-center text-uppercase">
					<th>NIK - Nama Penduduk</th>
					<th>Pengajuan Surat</th>
					<th colspan="2">Status Proses</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($data as $key) { ?>
				<?php
        $penduduk = $this->Penduduk_model->getNik($key->penduduk_nik); ?>
				<tr class="text-center">
					<td class="text-left">
						<?= $penduduk->nik.' <br />
						'.$penduduk->nama_lengkap ?>
					</td>
					<td class="text-left">
						<strong><?= $this->Surat_model->getId($key->surat_id)->jenis_surat;  ?> </strong><br />
						<a href=""><?= $key->file ?></a> <br />
						<label class="text-muted text-sm">
						<i class="fas fa-clock"></i>
						<?= date('d-m-Y', strtotime($key->created_at))  ?>
						</label>
					</td>
					<td>
					<br>
					<?php if ($key->status_proses == 'baru') { ?>
            <span class="badge badge-primary">Baru</span>
					<?php } ?>
					<?php if ($key->status_proses == 'dikonfirmasi') { ?>
            <span class="badge badge-secondary">Dikonfirmasi</span>
					<?php } ?>
					<?php if ($key->status_proses == 'ditolak') { ?>
            <span class="badge badge-danger">Ditolak</span>
					<?php } ?>
					<?php if ($key->status_proses == 'diproses') { ?>
            <span class="badge badge-warning">Diproses</span>
					<?php } ?>
					<?php if ($key->status_proses == 'selesai') { ?>
            <span class="badge badge-success">Selesai</span>
					<?php } ?>
					
          </td>
					<td>
					<br>
					<a
							href="<?= site_url('admin/pengajuan_surat/edit/'.$key->id) ?>"
							class="btn btn-outline-secondary btn-sm"
						>
							<i class="fas fa-edit"></i>
						</a>
						<?php if ($key->status_proses == 'baru' || $key->status_proses ==
                        'diproses') { ?>
						<a
							href="<?= site_url('admin/pengajuan_surat/ditolak/'.$key->id) ?>"
							class="btn btn-outline-danger btn-sm"
							onclick="return confirm('Anda yakin menolak pengajuan surat ini ?')"
						>
							<i class="fas fa-times"></i>
						</a>
						<?php } ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
