{{-- NAVBAR --}}
<div class="row">
    <div class="col-lg">
        <nav class="navbar fixed-top navbar-expand-lg" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="/">Seksi PHU Majalengka</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('surat*') ? 'active' : '' }}" href="/surat">Al-Qur'an</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="#">Pricing</a>-->
                        <!--</li>-->
                        @auth()
                            <li class="nav-item">
                                <a class="btn btn-danger rounded px-4 ms-3" href="/dash">Dashboard</a>
                            </li>
                        @endauth
                        @guest()
                            <li class="nav-item">
                                <a class="btn btn-danger rounded px-4 ms-3" href="/login">Login</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div> {{-- Akhir Navbar --}}
<div class="row">
    <div class="col">
        <div class="progress"></div>
    </div>
</div>
