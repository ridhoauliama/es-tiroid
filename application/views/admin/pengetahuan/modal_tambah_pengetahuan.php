<div class="modal fade" id="tambahPengetahuan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="varyModalLabel">Input Basis Aturan (<i>Rules</i>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('pengetahuan/tambah'); ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="penyakit">Jenis Penyakit :</label>
            <select name="penyakit" id="penyakit" class="form-control" required>
              <option value="">-- Pilih Jenis Penyakit --</option>
              <?php foreach ($penyakit as $K) : ?>
                <option value="<?= $K['id_penyakit']; ?>"><?= $K['kode_penyakit']; ?> - <?= $K['nama_penyakit']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="gejala">Gejala :</label>
            <select name="gejala" id="gejala" class="form-control" required>
              <option value="">-- Pilih Gejala --</option>
              <?php foreach ($gejala as $G) : ?>
                <option value="<?= $G['id_gejala']; ?>"><?= $G['kode_gejala']; ?> - <?= $G['nama_gejala']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="probabilitas" class="col-form-label">Nilai Probabilitas :</label>
            <input id="probabilitas" class="form-control" type="text" name="probabilitas" required>
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