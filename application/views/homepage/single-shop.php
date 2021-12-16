<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <h2><?= $menu['nama_menu']; ?></h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 entries">
          <article class="entry entry-single">
            <div class="entry-img">
              <img style="display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('assets/img/upload/') . $menu['gambar_menu']; ?>" alt="" class="img-fluid" />
            </div>

            <h2 class="entry-title">
              <a href=""><?= $menu['nama_menu']; ?></a>
              <p><?= "Rp. " . number_format($menu['harga_menu'], 2, ',', '.') ?></p>
            </h2>

            <div class="entry-content">
              <p>
                <?= $menu['deskripsi_menu']; ?>
              </p>
            </div>
            <p>
              <button type="button" style="margin-left: -5px;" data-bs-toggle="modal" data-bs-target="#pesanModal" class="get-started-btn"><i class="fas fa-cart-plus"></i> Pesan Sekarang</button>
            </p>
          </article>
          <!-- End blog entry -->
        </div>
        <!-- End blog entries list -->
      </div>
    </div>
  </section>
  <!-- End Blog Single Section -->
</main>
<!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('pesan'); ?>" method="POST">
        <input type="hidden" name="nama_menu" value="<?= $menu['nama_menu']; ?>">
        <input type="hidden" name="harga" value="<?= $menu['harga_menu']; ?>">
        <input type="hidden" name="kategori_menu" value="<?= $menu['kategori_menu']; ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="id_pesanan">
              <label for=""><b>Nama Pemesan</b></label>
              <input type="text" name="nama_pemesan" required class="form-control" id="" value="<?= $this->session->userdata('nama_pelanggan'); ?>">
            </div>
            <?php if ($menu['kategori_menu'] == 'NASI BOX') : ?>
              <div class="col-6">
                <input type="hidden" name="id_pesanan">
                <label for=""><b>Jumlah</b></label>
                <input type="text" name="jml_pesanan" required class="form-control" id="">
              </div>
            <?php endif ?>
            <div class="col-6">
              <label for=""><b>No. Hp</b></label>
              <input type="text" name="nohp" required class="form-control" id="" value="<?= $this->session->userdata('nohp'); ?>">
            </div>
            <div class="col-6">
              <label for=""><b>Tanggal Acara Dilaksanakan</b></label>
              <input type="date" name="tgl_acara" required class="form-control" id="">
            </div>
            <div class="col-12 mt-2">
              <label for=""><b>Alamat Acara Dilaksanakan</b></label>
              <textarea name="alamat" id="" required class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Pesan</button>
        </div>
      </form>
    </div>
  </div>
</div>