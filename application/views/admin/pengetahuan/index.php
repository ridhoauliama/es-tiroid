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
								<button type="button" class="btn btn-primary btn-round mb-2" data-toggle="modal" data-target="#tambahPengetahuan" data-whatever="@mdo">
									<i class="fe fe-plus-square fe-16"></i> Set Rules (Basis Aturan)
								</button>
								<?= $this->session->flashdata('pesan'); ?>
								<!-- table -->
								<table class="table table-hover table-borderless border-v datatables" id="dataTable-1">
									<thead class="thead-dark">
										<tr class="text-center">
											<th>No</th>
											<th>Jenis Penyakit</th>
											<th>Gejala</th>
											<th>Nilai Probabilitas</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($pengetahuan as $P) : ?>
											<tr>
												<td class="text-center"><?= $i; ?></td>
												<td><?= $P['kode_penyakit']; ?> - <?= $P['nama_penyakit']; ?></td>
												<td><?= $P['kode_gejala']; ?> - <?= $P['nama_gejala']; ?></td>
												<td class="text-center"><?= $P['probabilitas']; ?></td>
												<td class="text-center">
													<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="text-muted sr-only">Action</span>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<button class="dropdown-item" class="btn btn-primary" data-toggle="modal" data-target="#ubahPengetahuan<?= $P['id']; ?>">
															<i class="fe fe-edit"></i> Edit
														</button>
														<a class="dropdown-item" href="<?= base_url('pengetahuan/hapus/') . $P['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
															<i class="fe fe-trash-2"></i> Hapus
														</a>
													</div>
												</td>
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
