<?php foreach ($tbl_penyakit as $peny) : ?>
	<div class="modal fade" id="ubahPenyakit<?= $peny['id_penyakit']; ?>" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Ubah Data Penyakit (<?= $peny['kode_penyakit']; ?>) </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('penyakit/ubah'); ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?= $peny['id_penyakit']; ?>">
						<div class="form-group">
							<label for="kode">Kode Penyakit : </label>
							<input type="text" class="form-control" id="kode" name="kode" value="<?= $peny['kode_penyakit']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Penyakit : </label>
							<input id="nama" class="form-control" name="nama" value="<?= $peny['nama_penyakit']; ?>">
						</div>
						<div class="form-group">
							<label for="solusi">Solusi : </label>
							<textarea id="solusi" class="form-control" name="solusi"><?= $peny['solusi']; ?></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn mb-2 btn-primary"><i class="fe fe-edit"></i> Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>
