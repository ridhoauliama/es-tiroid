<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h3 class="page-title">Profil Admin</h3>
        <div class="col-md-12 mb-4">
          <div class="card profile shadow">
            <div class="card-body my-4">
              <div class="row align-items-center">
                <div class="col-md-3 text-center mb-5">
                  <a class="avatar avatar-xl">
                    <img class="avatar-img rounded-circle" src="<?= base_url('assets/img/') . $user['image']; ?>" alt="Avatar" title="<?= $user['image']; ?>" width="100%">
                  </a>
                </div>
                <div class="col">
                  <?= $this->session->flashdata('pesan') ?>
                  <div class="row align-items-center">
                    <div class="col-md-7">
                      <h4 class="mb-1"><?= $user['nama_user'] ?></h4>
                      <p class="small mb-3 mr-auto">
                        <span class="badge badge-dark"><i class="fe fe-user"></i> <?= $user['username'] ?></span>
                        <span class="badge badge-dark"><i class="fe fe-monitor"></i> STMIK Triguna Dharma Medan</span>
                      </p>
                    </div>
                    <div class="col">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-7">
                      <p class="text-muted"> Hello there! Perkenalkan saya adalah seorang mahasiswi semester 8 dari STMIK Triguna Dharma Medan yang sekarang sedang menyelesaikan skripsi untuk syarat kelulusan. Enjoy aman hehe~~ </p>
                    </div>
                    <div class="col">
                      <!-- <p class="small mb-0 mr-auto text-black"><i class="fe fe-monitor fe-16"></i>
                        STMIK Triguna Dharma Medan
                      </p> -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mr-auto">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#ubahProfile<?= $user['id_user']; ?>">
                        <i class="fe fe-settings fe-16"></i> Pengaturan Akun
                      </button>
                      <a href="" data-toggle="modal" data-target="#ubahPassword" class="btn btn-warning">
                        <i class="fe fe-shield fe-16"></i> Keamanan Akun
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>