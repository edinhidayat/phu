<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dash" class="brand-link">
        <img src="/vendor/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SiAP v.2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/vendor/dist/img/user1.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/dash" class="d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dash" class="nav-link {{ Request::is('dash') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">INPUT</li>
                <li class="nav-item">
                    <a href="/dash/agenda" class="nav-link {{ Request::is('dash/agenda*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Agenda Pendaftaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dash/batal" class="nav-link {{ Request::is('dash/batal*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-times"></i>
                        <p>
                            Pembatalan Porsi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dash/pelimpahan" class="nav-link {{ Request::is('dash/pelimpahan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-people-arrows"></i>
                        <p>
                            Pelimpahan Porsi
                        </p>
                    </a>
                </li>

                <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>

                <li class="nav-item">
                    <a href="/dash/rekapbatal" class="nav-link {{ Request::is('dash/rekapbatal*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>
                            Rekap Pembatalan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dash/rekappelimpahan"
                        class="nav-link {{ Request::is('dash/rekappelimpahan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-theater-masks"></i>
                        <p>
                            Rekap Pelimpahan
                        </p>
                    </a>
                </li>

                <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dash/basic" class="nav-link {{ Request::is('dash/basic') ? 'active' : '' }}">
                                <i class="nav-icon fab fa-unity"></i>
                                <p>
                                    Basic
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dash/tahun" class="nav-link {{ Request::is('dash/tahun*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Tahun
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dash/bank" class="nav-link {{ Request::is('dash/bank*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Bank
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dash/petugas"
                                class="nav-link {{ Request::is('dash/petugas*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>
                                    Petugas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dash/pejabat"
                                class="nav-link {{ Request::is('dash/pejabat*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Pejabat
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dash/user" class="nav-link {{ Request::is('dash/user*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
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
