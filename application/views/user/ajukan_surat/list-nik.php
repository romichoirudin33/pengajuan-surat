<div class="title-image">
	<div class="title-text">
		<h1 style="font-size: 40px">Pengajuan Surat</h1>
		<h5>Detail pengajuan surat anda</h5>
	</div>
</div>

<section class="bg-white">
	<div class="container" style="padding-top: 2em; padding-bottom: 2em">
		<div class="row">
			<div class="col-3">
				<h5><b>Cek Pengajuan</b></h5>
				<form action="<?= site_url('home/ajukan_surat') ?>" method="GET">
					<div class="input-group mb-3">
						<input
							type="text"
              name="nik"
							class="form-control shadow-none rounded-0"
							placeholder="NIK"
							value="<?= $this->input->get('nik') ?>"
						/>
						<div class="input-group-append">
							<button
								class="btn btn-outline-primary shadow-none rounded-0"
								type="submit"
							>
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				<h5 class="mt-5"><b>Pengajuan Terbaru</b></h5>
				<div style="height: 300px; overflow-y: auto">
					<div class="list-group">
						<?php foreach ($pengajuanBaru as $i) { ?>
						<a
							href="<?= site_url('home/ajukan_surat?id='.$i->id) ?>"
							class="list-group-item list-group-item-action"
						>
							<div class="d-flex w-100 justify-content-between">
								<strong class="text-dark" style="font-size: large"
									><?= $i->pengajuan_surat ?></strong
								>
							</div>
							<small class="text-muted">
								<i class="fas fa-clock"></i>
								<?= date('d-m-Y', strtotime($i->created_at)) ?> </small
							><br />
							<small class="mb-1"
								>di ajukan oleh <b><?= $i->nik ?></b>.</small
							>
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-9">
        <?php if (empty($data)) { ?>
          <div class="alert alert-info" role="alert">
  Pengajuan surat atas NIK <b><?= $this->input->get('nik') ?></b> tidak ditemukan
</div>
        <?php } else { ?>
          <h5>Pengajuan surat oleh NIK <b> <?= $this->input->get('nik')?> </b> ditemukan</h5>
          <table class="table table-bordered table-stripped">
          <thead>
            <tr>
              <th>Surat</th>
              <th class="text-center">File</th>
              <th class="text-center">Status</th>
              <th>Tgl Pengajuan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $i) { ?>
              <tr>
                <td>
                  <a href="<?= site_url('home/ajukan_surat?id='.$i->id) ?> "><?= $i->pengajuan_surat ?></a>
                </td>
                <td class="text-center">
                <?php if ($i->file != null) { ?>
						<a
							href="<?= base_url('assets/file_surat/'.$i->file) ?>"
							class="btn btn-outline-primary btn-sm"
							target="_blank"
						>
							Download <i class="fas fa-download"></i>
						</a>
						<?php } ?>
                </td>
                <td class="text-center">
                <?php if ($i->status_proses == 'baru') { ?>
            <span class="badge badge-primary">Baru</span>
					<?php } ?>
					<?php if ($i->status_proses == 'dikonfirmasi') { ?>
            <span class="badge badge-secondary">Dikonfirmasi</span>
					<?php } ?>
					<?php if ($i->status_proses == 'ditolak') { ?>
            <span class="badge badge-danger">Ditolak</span>
					<?php } ?>
					<?php if ($i->status_proses == 'diproses') { ?>
            <span class="badge badge-warning">Diproses</span>
					<?php } ?>
					<?php if ($i->status_proses == 'selesai') { ?>
            <span class="badge badge-success">Selesai</span>
					<?php } ?>
                </td>
                <td><?= date('d-m-Y', strtotime($i->created_at)) ?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
        <?php } ?>
             
      </div>
		</div>
	</div>
</section>
