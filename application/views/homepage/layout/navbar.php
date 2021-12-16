<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="<?= base_url(''); ?>">Pondok <span>Rejeki</span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link <?= $title == 'Home' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a></li>
                <li><a class="nav-link <?= $title == 'Paket Makanan' ? 'active' : ''; ?>" href="<?= base_url('paket-makanan'); ?>">Paket Makanan</a></li>
                <li><a class="nav-link <?= $title == 'Login' ? 'active' : ''; ?>" href="<?= base_url('masuk'); ?>">Masuk</a></li>
                <li><a class="nav-link <?= $title == 'Signup' ? 'active' : ''; ?>" href="<?= base_url('daftar'); ?>">Buat Akun</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End Header -->