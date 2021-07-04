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
				href="<?= site_url('admin/pengajuan_surat') ?>"
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
			action="<?= site_url('admin/pengajuan_surat/edit/'.$data->id) ?>"
			method="post"
			enctype="multipart/form-data"
		>
			<div class="row">
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
							href="<?= site_url('admin/pengajuan_surat') ?>"
							class="btn btn-outline-secondary"
						>
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
						<?php if ($data->status_proses == 'baru' || $data->status_proses ==
                        'diproses') { ?>
						<a
							href="<?= site_url('admin/pengajuan_surat/ditolak/'.$data->id) ?>"
							class="btn btn-outline-danger float-right"
							onclick="return confirm('Anda yakin menolak pengajuan surat ini ?')"
						>
							<i class="fas fa-times"></i> Tolak Pengajuan
						</a>
						<?php } ?>
					</div>
				</div>
				<div class="col-6">
          <p>
            Warga <b><?= $penduduk->nama_lengkap ?></b> dengan nik <b><?= $penduduk->nik ?></b> ini telah melakukan pengajuan <b><?= $data->pengajuan_surat ?> </b>, mohon aparat desa segera memproses pengajuan surat ini !
          </p>
					<div class="form-group">
						<label for="file_surat">File surat</label>
						<input type="file" class="form-control" name="file_surat" />
						<span class="text-block"
							>Isi kolom ini untuk surat yang telah diproses</span
						>
					</div>
					<div class="form-group">
						<label for="status_proses">Status Proses</label>
						<?php if ($data->status_proses == 'baru') { ?>
						<span class="badge badge-primary">Baru</span>
						<?php } ?>
						<div class="form-check">
							<input
								class="form-check-input"
								type="radio"
								name="status_proses"
								id="status_proses1"
								value="dikonfirmasi"
							 <?= $data->status_proses == 'dikonfirmasi' ? 'checked' : '' ?>	
							/>
							<label class="form-check-label" for="status_proses1">
								Dikonfirmasi
							</label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="radio"
								name="status_proses"
								id="status_proses3"
								value="diproses"
								<?= $data->status_proses == 'diproses' ? 'checked' : '' ?>
							/>
							<label class="form-check-label" for="status_proses3">
								Diproses
							</label>
						</div>
						<div class="form-check">
							<input
								class="form-check-input"
								type="radio"
								name="status_proses"
								id="status_proses4"
								value="selesai"
								<?= $data->status_proses == 'selesai' ? 'checked' : '' ?>
							/>
							<label class="form-check-label" for="status_proses4">
								Selesai
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="address">Keterangan</label>
						<textarea
							class="form-control"
							id="summernote2"
							name="keterangan"
							style="height: 150px"
						><?= $data->keterangan ?></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
