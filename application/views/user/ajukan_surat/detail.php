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
			<div class="col-9 bg-light shadow">
				<div class="row p-4">
					<div class="col-6">
						<?php $penduduk = $this->Penduduk_model->getNik($data->nik); ?>
						<h3><b>Detail Pemohon</b></h3>
						<br />
						<table class="table table-sm text-sm">
							<tr>
								<td>NIK</td>
								<td>
									:
									<?= $penduduk->nik ?>
								</td>
							</tr>
							<tr>
								<td>NAMA LENGKAP</td>
								<td>
									:
									<?= $penduduk->nama_lengkap ?>
								</td>
							</tr>
							<tr>
								<td>TTL</td>
								<td>
									:
									<?= $penduduk->tempat_lahir . ', '. date(
    'd-m-Y',
    strtotime($penduduk->tanggal_lahir)
) ?>
								</td>
							</tr>
							<tr>
								<td>ALAMAT</td>
								<td>
									:
									<?= $penduduk->alamat ?>
								</td>
							</tr>
							<tr>
								<td>AGAMA</td>
								<td>
									:
									<?= $penduduk->agama ?>
								</td>
							</tr>
							<tr>
								<td>JENIS KELAMIN</td>
								<td>
									:
									<?= $penduduk->jenis_kelamin ?>
								</td>
							</tr>
							<tr>
								<td>STATUS KAWIN</td>
								<td>
									:
									<?= $penduduk->status_kawin ?>
								</td>
							</tr>
							<tr>
								<td>PEKERJAAN</td>
								<td>
									:
									<?= $penduduk->pekerjaan ?>
								</td>
							</tr>
							<tr>
								<td>KEWARGANEGARAAN</td>
								<td>
									:
									<?= $penduduk->kewarganegaraan ?>
								</td>
							</tr>
						</table>
						<h3 class="mb-3"><b>Kontak Pemohon</b></h3>
						<strong
							><i class="fas fa-envelope"></i>
							<?= $data->email ?></strong
						>
						<br />
						<br />

						<strong
							><i class="fas fa-phone"></i>
							<?= $data->no_hp ?></strong
						>
						<br /><br />
					</div>
					<div class="col-6">
						<p>
							Pengajuan <b><?= $data->pengajuan_surat ?> </b> <br />
							<small class="text-muted"
								><i class="fas fa-clock"></i>
								<?= date('d-m-Y', strtotime($data->created_at)) ?></small
							>
						</p>
						<div class="form-group">
							<label for="status_proses">Status Proses</label>
							<?php if ($data->status_proses == 'baru') { ?>
							<span class="badge badge-primary">Baru</span>
							<?php } else { ?>
							<span class="badge badge-success"
								><?= $data->status_proses ?></span
							>
							<?php } ?>
						</div>

						<div class="form-group">
							<label for="address">Keterangan</label>
							<textarea
								class="form-control shadow-none rounded-0"
								id="summernote2"
								name="keterangan"
								style="height: 150px; resize: none"
							>
<?= $data->keterangan ?></textarea
							>
						</div>
						<?php if ($data->file != null) { ?>
						<a
							href="<?= base_url('assets/file_surat/'.$data->file) ?>"
							class="btn btn-outline-primary btn-sm"
							target="_blank"
						>
							Download <i class="fas fa-download"></i>
						</a>
						<?php } ?>
						<a
							href="<?= site_url('home/ajukan_surat') ?>"
							class="btn btn-outline-success btn-sm"
						>
							Ajukan Surat Lagi ? <i class="fas fa-redo"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
