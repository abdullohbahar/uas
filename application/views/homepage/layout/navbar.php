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
                <?php if ($this->session->userdata('username') == NULL) : ?>
                    <li><a class="nav-link <?= $title == 'Login' ? 'active' : ''; ?>" href="<?= base_url('masuk'); ?>">Masuk</a></li>
                    <li><a class="nav-link <?= $title == 'Signup' ? 'active' : ''; ?>" href="<?= base_url('daftar'); ?>">Buat Akun</a></li>
                <?php else : ?>
                    <li class="dropdown"><a href="#"><span><i class="fas fa-user"></i> <?= $this->session->userdata('username'); ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#"><span><i class="fas fa-shopping-cart"></i> Pesanan</span></a></li>
                            <li><a href="#"><span><i class="fas fa-user"></i> Profile</span></a></li>
                            <li><a href="<?= base_url('logout'); ?>"><span><i class="fas fa-sign-out-alt"></i> Logout</span></a></li>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End Header -->