<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BUSTAT LAMPUNG')</title>

    {{-- Google Fonts (Poppins) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- CSS Framework & Ikon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- CSS Tema Utama Lampung --}}
    <style>
        :root {
            --lampung-gold: #FFD700;
            --lampung-dark: #3a2d27;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding-top: 56px; /* Memberi ruang untuk navbar fixed-top */
        }

        /* Navbar Customization */
        .navbar {
            background-color: var(--lampung-dark) !important;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        /* Logika untuk link aktif di navbar */
        .nav-link.active,
        .nav-link:hover {
            color: var(--lampung-gold) !important;
        }

        .navbar-brand i {
            color: var(--lampung-gold);
        }

        /* Footer */
        .footer {
            background-color: var(--lampung-dark);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>

    {{-- Placeholder untuk CSS spesifik halaman lain --}}
    @stack('styles')
</head>
<body>

    <div class="app-wrapper">
        <!-- Header / Navbar -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="bi bi-bus-front-fill"></i>
                        BUSTAT LAMPUNG
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                {{-- Request::is('/') akan mengecek apakah halaman saat ini adalah root/beranda --}}
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                {{-- Request::is('peta*') akan mengecek apakah URL dimulai dengan 'peta' --}}
                                <a class="nav-link {{ request()->is('peta*') ? 'active' : '' }}" href="{{ url('/peta') }}">Peta</a>
                            </li>
                            <li class="nav-item">
                                 {{-- Request::is('tabel*') akan mengecek apakah URL dimulai dengan 'tabel' --}}
                                <a class="nav-link {{ request()->is('tabel*') ? 'active' : '' }}" href="{{ url('/tabel') }}">Tabel Informasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Konten Halaman Dinamis -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container">
                <p class="mb-0">&copy; {{ date('Y') }} Mukhlish Sulthon Nashrullah | All Rights Reserved</p>
            </div>
        </footer>
    </div>

    {{-- Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Placeholder untuk JS spesifik halaman lain --}}
    @stack('scripts')
</body>
</html>
