<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIMUFTI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('/img/default.svg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session('username'); ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if (session()->has('role') && session()->get('role') === 'Tata Usaha') :  ?>
                    <li class="nav-item">
                        <a href="/dashboard_tu" class="nav-link <?= uri_string() == '/dashboard_tu' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/guru" class="nav-link <?= uri_string() == 'guru' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Data Guru
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/mapel" class="nav-link <?= uri_string() == 'mapel' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Data Mata Pelajaran
                            </p>
                        </a>
                    </li>

                <?php elseif (session()->has('id_siswa')) : ?>
                    <li class="nav-item">
                        <a href="/dashboard_siswa" class="nav-link <?= uri_string() == 'dashboard_siswa' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                <?php elseif (session()->has('id_guru')) : ?>
                    <li class="nav-item">
                        <a href="/dashboard_guru" class="nav-link <?= uri_string() == '/dashboard_guru' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/siswa" class="nav-link <?= uri_string() == 'siswa' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kelas" class="nav-link <?= uri_string() == 'kelas' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/mapel" class="nav-link <?= uri_string() == 'mapel' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Data Mata Pelajaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/nilai" class="nav-link <?= uri_string() == 'nilai' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-marker"></i>
                            <p>
                                Data Nilai
                            </p>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav-item">
                    <a href="<?= base_url('logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>