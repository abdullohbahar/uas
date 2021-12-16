    <main id="main">
      <!-- ======= Blog Single Section ======= -->

      <section id="blog" class="blog mb-5">
        <div class="container" data-aos="fade-up">
          <div class="row mt-5 justify-content-md-center">
            <div class="col-lg-6 mt-5">
              <form action="<?= base_url('auth/login'); ?>" method="POST">
                <div class="card">
                  <div class="card-header">
                    <center>
                      <h1><b>Login</b></h1>
                    </center>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" id="" />
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    <label for="" class="mt-3">Password</label>
                    <input type="password" name="password" class="form-control" id="" />
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-12 d-grid gap-2">
                        <button type="submit" class="btn btn-info" style="color: white">
                          Login
                        </button>
                      </div>
                      <div class="col-12 mt-2">
                        Belum Punya Akun? <a href="<?= base_url('daftar'); ?>">Daftar</a>
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