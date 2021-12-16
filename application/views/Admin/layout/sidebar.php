<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <center>
            <span class="brand-text"><b>Admin</b></span>
        </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link <?= $title == 'Dashboard Admin' ? 'active' : '' ?>"">
                        <i class=" nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/data-menu'); ?>" class="nav-link <?= $title == 'Data Menu' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Menu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/data-pesanan'); ?>" class="nav-link <?= $title == 'Data Pesanan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Pesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= $title == 'Data Pelanggan' || $title == 'Data Admin' || $title == 'Data Kasir' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $title == 'Data Pelanggan' || $title == 'Data Admin' || $title == 'Data Kasir' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/data-pelanggan'); ?>" class="nav-link <?= $title == 'Data Pelanggan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/data-admin'); ?>" class="nav-link  <?= $title == 'Data Admin' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/data-kasir'); ?>" class="nav-link  <?= $title == 'Data Kasir' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kasir</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>