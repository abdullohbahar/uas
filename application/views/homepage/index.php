		<!-- ======= Hero Section ======= -->
		<section id="hero" class="d-flex align-items-center">
			<div class="container" data-aos="zoom-out" data-aos-delay="100">
				<div class="row">
					<div class="col-xl-6">
						<h1>Kamu Sedang Bingung Pesan Catering Di Daerah Yogyakarta Dimana?</h1>
						<h2>
							Pesan Saja Di Tempat Kami Klik Paket Makanan Untuk Melihat Menu-Menu Yang Tersedia
						</h2>
						<a href="<?= base_url('paket-makanan'); ?>" class="btn-get-started scrollto">Paket Makan</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Hero -->

		<main id="main">
			<!-- ======= Tabs Section ======= -->
			<section id="tabs" class="tabs">
				<div class="container" data-aos="fade-up">
					<ul class="nav nav-tabs row d-flex">
						<li class="nav-item col-3">
							<a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
								<h4 class="d-none d-lg-block">Tentang Kami</h4>
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active show" id="tab-1">
							<div class="row">
								<div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
									<h3>
										Voluptatem dignissimos provident quasi corporis voluptates
										sit assumenda.
									</h3>
									<p class="fst-italic">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
										do eiusmod tempor incididunt ut labore et dolore magna
										aliqua.
									</p>
									<ul>
										<li>
											<i class="ri-check-double-line"></i> Ullamco laboris nisi
											ut aliquip ex ea commodo consequat.
										</li>
										<li>
											<i class="ri-check-double-line"></i> Duis aute irure dolor
											in reprehenderit in voluptate velit.
										</li>
										<li>
											<i class="ri-check-double-line"></i> Ullamco laboris nisi
											ut aliquip ex ea commodo consequat. Duis aute irure dolor
											in reprehenderit in voluptate trideta storacalaperda
											mastiro dolore eu fugiat nulla pariatur.
										</li>
									</ul>
									<p>
										Ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit
										esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
										occaecat cupidatat non proident, sunt in culpa qui officia
										deserunt mollit anim id est laborum
									</p>
								</div>
								<div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
									<img src="assets/img/tabs-1.jpg" alt="" class="img-fluid" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Tabs Section -->

			<!-- ======= Portfolio Section ======= -->
			<section id="portfolio" class="portfolio">
				<div class="container" data-aos="fade-up">
					<div class="section-title">
						<h2>Paket Makanan</h2>
					</div>

					<div class="row" data-aos="fade-up" data-aos-delay="100">
						<div class="col-lg-12 d-flex justify-content-center">
							<ul id="portfolio-flters">
								<li data-filter="*" class="filter-active">All</li>
								<li data-filter=".filter-prasmanan">Prasmanan</li>
								<li data-filter=".filter-box">Nasi Kotak</li>
								<li data-filter=".filter-tumpeng">Nasi Tumpeng</li>
							</ul>
						</div>
					</div>

					<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
						<?php foreach ($prasmanan as $p) : ?>
							<div class="col-lg-4 col-md-6 portfolio-item filter-prasmanan">
								<div class="portfolio-wrap">
									<img src="<?= base_url('assets/img/upload/') . $p['gambar_menu']; ?>" class="img-fluid" alt="" />
									<div class="portfolio-info">
										<h4><?= $p['nama_menu']; ?></h4>
										<div class="portfolio-links">
											<a href="<?= base_url('assets/img/upload/') . $p['gambar_menu']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $p['deskripsi_menu']; ?>"><i class="bx bx-plus"></i></a>
											<a href="<?= base_url('detail-paket/') . $p['id_menu']; ?>" title="More Details"><i class="bx bx-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>

						<?php foreach ($box as $b) : ?>
							<div class="col-lg-4 col-md-6 portfolio-item filter-box">
								<div class="portfolio-wrap">
									<img src="<?= base_url('assets/img/upload/') . $b['gambar_menu']; ?>" class="img-fluid" alt="" />
									<div class="portfolio-info">
										<h4><?= $b['nama_menu']; ?></h4>
										<div class="portfolio-links">
											<a href="<?= base_url('assets/img/upload/') . $b['gambar_menu']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $b['deskripsi_menu']; ?>"><i class="bx bx-plus"></i></a>
											<a href="<?= base_url('detail-paket/') . $b['id_menu']; ?>" title="More Details"><i class="bx bx-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>

						<?php foreach ($tumpeng as $b) : ?>
							<div class="col-lg-4 col-md-6 portfolio-item filter-tumpeng">
								<div class="portfolio-wrap">
									<img src="<?= base_url('assets/img/upload/') . $b['gambar_menu']; ?>" class="img-fluid" alt="" />
									<div class="portfolio-info">
										<h4><?= $b['nama_menu']; ?></h4>
										<div class="portfolio-links">
											<a href="<?= base_url('assets/img/upload/') . $b['gambar_menu']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $b['deskripsi_menu']; ?>"><i class="bx bx-plus"></i></a>
											<a href="<?= base_url('detail-paket/') . $b['id_menu']; ?>" title="More Details"><i class="bx bx-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>

					</div>
				</div>
			</section>
			<!-- End Portfolio Section -->
		</main>
		<!-- End #main -->