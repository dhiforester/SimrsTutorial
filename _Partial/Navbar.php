<header id="header" class="header fixed-top d-flex align-items-center landing_background">
    <!-- Logo Dan Nama Aplikasi -->
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block text-white">SIMRS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div>
    <!-- Form Pencarian Bantuan -->
    <div class="search-bar">
        <form action="javascript:void(0);" class="search-form d-flex align-items-center" method="POST">
            <input type="text" name="keyword" placeholder="Cari Bantuan" title="Cari Bantuan">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <!-- Tombol Pencarian Bantuan Mobile -->
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="javascript:void(0);">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- Notifikasi -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-danger rounded-pill badge-number">2</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        Anda Memiliki 2 Pemberitahuan
                    </li>
                    <!-- List Notifikasi ke 1-->
                    <li><hr class="dropdown-divider"></li>
                    <li class="notification-item">
                        <i class="bi bi-exclamation-triangle text-danger"></i>
                        <div>
                            <h4><a href="">Notifikasi Ke 1</a></h4>
                            <p>Penjelasan Notifikasi Ke 1</p>
                        </div>
                    </li>
                    <!-- List Notifikasi ke 2-->
                    <li><hr class="dropdown-divider"></li>
                    <li class="notification-item">
                        <i class="bi bi-exclamation-triangle text-danger"></i>
                        <div>
                            <h4><a href="">Notifikasi Ke 2</a></h4>
                            <p>Penjelasan Notifikasi Ke 2</p>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Profile User -->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/User/No-Image.png" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">Nama User</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Nama Kamu</h6>
                        <span>Hak/Level Akses</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php">
                            <i class="bi bi-person"></i>
                            <span>Profile Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <!-- Menu Profile Edit -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="bi bi-gear"></i>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <!-- Menu Profile Ganti Password -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="bi bi-key"></i>
                            <span>Ganti Password</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <!-- Menu Profile Bantuan -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php">
                            <i class="bi bi-question-circle"></i>
                            <span>Butuh Bantuan?</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <!-- Menu Profile Logout -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>