<main id="main">
  <!-- ======= Blog Single Section ======= -->

  <section id="blog" class="blog mb-5">
    <div class="container" data-aos="fade-up">
      <div class="row mt-5 justify-content-md-center">
        <div class="col-lg-12 mt-5">
          <form action="" method="POST">
            <div class="card">
              <div class="card-header">
                <center>
                  <h1><b>Signup</b></h1>
                </center>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label for="" class="mt-3">Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?= set_value('nama_pelanggan'); ?>" id="" required />
                    <?= form_error('nama_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-6">
                    <label for="" class="mt-3">Nomor HP</label>
                    <input type="text" name="nohp" class="form-control" value="<?= set_value('nohp'); ?>" id="" required />
                    <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-6">
                    <label for="" class="mt-3">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" id="" required />
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-6">
                    <label for="" class="mt-3">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>" id="" required />
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-6">
                    <label for="" class="mt-3">Password</label>
                    <input type="password" name="password" class="form-control" id="" required />
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-12">
                    <label for="" class="mt-3">Alamat</label>
                    <textarea name="alamat" class="form-control" id="" required></textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-12 d-grid gap-2">
                    <button type="submit" class="btn btn-info" style="color: white">
                      Daftar
                    </button>
                  </div>
                  <div class="col-12 mt-2">
                    Sudah Punya Akun? <a href="<?= base_url('masuk'); ?>">Masuk</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Blog Single Section -->
</main>
<!-- End #main -->