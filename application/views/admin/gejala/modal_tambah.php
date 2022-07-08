<div class="modal fade" id="tambahGejala" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahModal">Input Gejala Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('gejala/tambah'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="kode" class="col-form-label">Kode Gejala :</label>
						<input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama" class="col-form-label">Gejala : </label>
						<input type="text" class="form-control" id="nama" name="nama" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn mb-2 btn-primary"><i class="fe fe-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
