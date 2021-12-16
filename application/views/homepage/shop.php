    <main id="main">

      <!-- ======= Blog Single Section ======= -->
      <section id="blog" class="blog mt-5">
        <div class="container mt-5" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-4">
              <div class="sidebar">
                <h3 class="sidebar-title">Categories</h3>
                <div class="sidebar-item categories">
                  <ul>
                    <li>
                      <a href="#">General <span>(25)</span></a>
                    </li>
                    <li>
                      <a href="#">Lifestyle <span>(12)</span></a>
                    </li>
                    <li>
                      <a href="#">Travel <span>(5)</span></a>
                    </li>
                    <li>
                      <a href="#">Design <span>(22)</span></a>
                    </li>
                    <li>
                      <a href="#">Creative <span>(8)</span></a>
                    </li>
                    <li>
                      <a href="#">Educaion <span>(14)</span></a>
                    </li>
                  </ul>
                </div>
                <!-- End sidebar categories-->
              </div>
              <!-- End sidebar -->
            </div>
            <!-- End blog sidebar -->
            <div class="col-lg-8 entries">
              <div class="row">
                <?php foreach ($menu as $m) : ?>
                  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card">
                      <a href="<?= base_url('assets/img/upload/') . $m['gambar_menu']; ?>" data-gallery="portfolioGallery" target="_blank">
                        <img style="width: 267px; height: 164px;" src="<?= base_url('assets/img/upload/') . $m['gambar_menu']; ?>" class="card-img-top" alt="...">
                      </a>
                      <div class="card-body">
                        <h5 class="card-title"><?= $m['nama_menu']; ?></h5>
                        <p class="card-text"><?= $m['harga_menu']; ?></p>
                        <a href="<?= base_url('shop/detailPaket/') . $m['id_menu']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
                <!-- End blog entry -->
              </div>
              <!-- End blog entries list -->
            </div>
          </div>
      </section>
      <!-- End Blog Single Section -->
    </main>
    <!-- End #main -->