<x-guest-layout>
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-10">
            <div class="login-wrapper shadow-lg">

                <div class="row g-0">
                    <!-- Bagian kiri -->
                    <div class="col-md-6 login-left p-5 d-flex flex-column justify-content-center">
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/logo-umm.png') }}" alt="Logo UMM" height="90" class="mb-3">
                            <h2 class="fw-bold mb-2">Sistem Pelacakan Alumni</h2>
                            <p class="mb-0">Universitas Muhammadiyah Malang</p>
                        </div>

                        <div class="login-info-box mt-3">
                            <h5 class="fw-bold mb-3">Selamat Datang</h5>
                            <p class="mb-2">
                                Sistem ini digunakan untuk membantu pengelolaan data alumni,
                                hasil pelacakan, verifikasi manual, dan laporan monitoring alumni.
                            </p>
                            <p class="mb-0">
                                Silakan masuk menggunakan akun admin untuk mengakses dashboard sistem.
                            </p>
                        </div>
                    </div>

                    <!-- Bagian kanan -->
                    <div class="col-md-6 bg-white p-5 d-flex flex-column justify-content-center">
                        <div class="mb-4">
                            <h3 class="fw-bold mb-1">Login Admin</h3>
                            <p class="text-muted mb-0">Masukkan email dan password untuk melanjutkan.</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-3" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input id="email" class="form-control form-control-lg login-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" class="form-control form-control-lg login-input" type="password" name="password" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                    <label class="form-check-label text-muted" for="remember_me">
                                        Remember me
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="small text-decoration-none login-link" href="{{ route('password.request') }}">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-login btn-lg">
                                    Masuk ke Sistem
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
