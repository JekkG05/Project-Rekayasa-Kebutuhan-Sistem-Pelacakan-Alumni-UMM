<nav class="navbar navbar-expand-lg umm-navbar">
    <div class="container">
        <a class="navbar-brand text-white d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo-umm.png') }}" alt="Logo UMM" height="42" class="me-2">
            <span>Sistem Pelacakan Alumni UMM</span>
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUMM">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarUMM">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active-nav' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('alumni.*') ? 'active-nav' : '' }}" href="{{ route('alumni.index') }}">Alumni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tracking-results.*') ? 'active-nav' : '' }}" href="{{ route('tracking-results.index') }}">Tracking Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('verifikasi.*') ? 'active-nav' : '' }}" href="{{ route('verifikasi.index') }}">Verifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('laporan.*') ? 'active-nav' : '' }}" href="{{ route('laporan.index') }}">Laporan</a>
                </li>

                <a href="{{ route('import.alumni.index') }}"
            class="btn ms-3 px-4 py-2 fw-semibold rounded-4 text-white"
            style="background-color: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.25);">
                Import Data Alumni
            </a>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <span class="text-white small fw-semibold">
                    {{ Auth::user()->name ?? 'Admin' }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm px-3 rounded-3 fw-semibold">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
