<div class="title-image">
	<div class="title-text">
		<h1 style="font-size: 40px">Pengajuan Surat</h1>
		<h5>Pengajuan hanya bisa dilakukan warga terdaftar</h5>
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
									><?= $this->Surat_model->getId($i->surat_id)->jenis_surat;  ?></strong
								>
							</div>
							<small class="text-muted">
								<i class="fas fa-clock"></i>
								<?= date('d-m-Y', strtotime($i->created_at)) ?> </small
							><br />
							<small class="mb-1"
								>di ajukan oleh <b><?= $i->penduduk_nik ?></b>.</small
							>
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-5 text-center">
				<?php if (isset($info)) { ?>
				<div
					class="alert alert-warning alert-dismissible fade show"
					role="alert"
				>
					<strong>Informasi !</strong>
					<?= $info ?>
					<button
						type="button"
						class="close"
						data-dismiss="alert"
						aria-label="Close"
					>
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } ?>
				Silahkan isi data di form berikut untuk melakukan pengajuan surat
				<img
					src="<?= base_url('assets/avatar-pengajuan.jpg') ?>"
					class="d-block w-100"
				/>
			</div>
			<div class="col-4 bg-light p-4 shadow">
				<form action="<?= site_url('home/ajukan_surat') ?>" method="POST">
					<div class="form-group">
						<label>NIK</label>
						<input
							type="text"
							name="nik"
							class="form-control shadow-none rounded-0"
							autocomplete="off"
							value="<?= set_value('nik') ?>"
						/>
					</div>
					<div class="form-group">
						<label>Pengajuan Surat</label>
						<select
							name="surat_id"
							id="surat_id"
							class="form-control shadow-none rounded-0"
						>
							<option value="">Pilih</option>
							<?php foreach ($surat as $i) { ?>
							<option value="<?= $i->id ?>"><?= $i->jenis_surat ?></option>
							<?php } ?>
						</select>
					</div>
					<div
						class="form-group"
						id="form-group-detail-surat"
						style="display: none"
					>
						<label id="title-detail-surat">
							Detail Surat
							<button
								type="button"
								class="btn"
								data-toggle="modal"
								data-target="#detailSuratModal"
							>
								<span class="fas fa-info-circle"></span>
							</button>
						</label>
						<textarea
							name="detail_surat"
							id="detail_surat"
							rows="3"
							class="form-control shadow-none rounded-0"
							autocomplete="off"
						></textarea>
					</div>
					<h5 class="mt-5"><b>Kontak</b></h5>
					<hr />
					<div class="form-group">
						<label>Email</label>
						<input
							type="email"
							name="email"
							class="form-control shadow-none rounded-0"
							autocomplete="off"
							value="<?= set_value('email') ?>"
						/>
					</div>
					<div class="form-group">
						<label>No Telp/HP</label>
						<input
							type="text"
							name="no_hp"
							class="form-control shadow-none rounded-0"
							autocomplete="off"
							value="<?= set_value('no_hp') ?>"
						/>
					</div>
					<div class="form-group">
						<button
							type="submit"
							name="submit"
							value="submit"
							class="btn btn-outline-primary shadow-none rounded-0"
						>
							<i class="fas fa-paper-plane"></i> Kirim pengajuan
						</button>
					</div>
				</form>
				<div
					class="modal fade"
					id="detailSuratModal"
					tabindex="-1"
					aria-labelledby="detailSuratModalLabel"
					aria-hidden="true"
				>
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="detailSuratModalLabel">
									Detail Surat
								</h5>
								<button
									type="button"
									class="close"
									data-dismiss="modal"
									aria-label="Close"
								>
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>
									Detail surat dapat anda ceritakan secara singkat Surat yang
									anda ajukan.
								</p>
								<p>
									Misal surat keterangan usaha, Usaha jual atau usaha lainya.
									Ataupun anda dapat menjelaskan secara rinci kebutuhan apa yang
									sedang anda alami sehingga membutuhkan surat ini
								</p>
							</div>
							<div class="modal-footer">
								<button
									type="button"
									class="btn btn-secondary"
									data-dismiss="modal"
								>
									Close
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
