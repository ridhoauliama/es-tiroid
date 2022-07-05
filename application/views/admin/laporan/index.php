<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-0">
          <div class="col">
            <h5 class="mb-0 page-title"><?= $tabel ?></h5>
          </div>
          <div class="col-auto">
            <form class="form-inline">
              <div class="form-group d-none d-lg-inline">
                <label for="reportrange" class="sr-only">Date Ranges</label>
                <div id="reportrange" class="px-2 py-2">
                  <span class="small"></span>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row my-1">
          <!-- Small table -->
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <a target="_blank" href="<?= base_url('laporan/cetakLaporan') ?>" class="btn btn-success mb-2 mr-2">
                  <i class="fe fe-printer fe-16"></i> Cetak Laporan
                </a>
                <a href="<?= base_url('laporan/hapusLaporan') ?>" class="btn btn-danger mb-2" onclick="return confirm('Seluruh riwayat konsultasi akan dihapus. Yakin?');">
                  <i class="fe fe-trash-2 fe-16"></i> Hapus Laporan
                </a>
                <?= $this->session->flashdata('pesan'); ?>
                <!-- table -->
                <table class="table table-hover table-borderless border-v datatables" id="dataTable-1">
                  <thead class="thead-dark">
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Hasil Konsultasi</th>
                      <th>Nilai Probabilitas Bayes (%)</th>
                      <th>Tanggal Konsultasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php $i = 1; ?>
                      <?php foreach ($laporan as $l) : ?>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $l['nama_user'] ?></td>
                        <td class="text-center"><?= $l['usia'] ?> Tahun</td>
                        <td class="text-center"><?= $l['jk'] ?></td>
                        <td class="text-center"><?= $l['nama_penyakit']; ?> (<?= $l['kode_penyakit'] ?>)</td>
                        <td class="text-center"><?= str_pad(substr(($l['hasil_probabilitas'] * 100), 0, 5), 2, '0'); ?> %</td>
                        <td class="text-center"><?= date('d F Y', $l['waktu']); ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>