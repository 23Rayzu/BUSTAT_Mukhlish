<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - BUSTAT LAMPUNG</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS for Lampung Theme -->
    <style>
        :root {
            --lampung-gold: #FFD700;
            /* Warna emas untuk aksen */
            --lampung-dark: #3a2d27;
            /* Warna coklat tua terinspirasi dari Tapis */
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
        }

        /* Navbar Customization */
        .navbar {
            background-color: var(--lampung-dark);
            transition: background-color 0.3s ease;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
            font-weight: 600;
        }

        .nav-link.active,
        .nav-link:hover {
            color: var(--lampung-gold) !important;
        }

        .navbar-brand i {
            color: var(--lampung-gold);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://placehold.co/1920x800/2c3e50/ffffff?text=Landmark+Lampung');
            /* Placeholder - Ganti dengan gambar landmark Lampung seperti Menara Siger atau Pantai */
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section .siger-icon {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.7));
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-section p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 1rem auto 2rem auto;
        }

        /* Custom Button */
        .btn-gold {
            background-color: var(--lampung-gold);
            color: var(--lampung-dark);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            border: 2px solid var(--lampung-gold);
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-gold:hover {
            background-color: transparent;
            color: var(--lampung-gold);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }

        /* Features Section */
        .features-section {
            padding: 80px 0;
        }

        .feature-card {
            background-color: #ffffff;
            border: none;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--lampung-dark);
            background-color: #f0f0f0;
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px auto;
            display: block;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background-color: var(--lampung-dark);
            color: var(--lampung-gold);
        }

        .feature-card h3 {
            color: var(--lampung-dark);
            font-weight: 600;
        }

        /* Section Title Style */
        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-weight: 700;
            color: var(--lampung-dark);
        }

        .section-title::after {
            content: '';
            width: 80px;
            height: 4px;
            background: var(--lampung-gold);
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Footer */
        .footer {
            background-color: var(--lampung-dark);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

    </style>
</head>

<body>

    <!-- Header / Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-bus-front-fill"></i>
                    BUSTAT LAMPUNG
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="peta">Peta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tabel">Tabel Informasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <!-- SVG Siger Lampung -->
                <svg class="siger-icon" viewBox="0 0 512 288" xmlns="http://www.w3.org/2000/svg" fill="var(--lampung-gold)">
                    <path d="M256 0L192 128H64L0 256h128l64-64 64 64h128L448 128H320L256 0zM128 288h256v-32H128v32z"/>
                </svg>

                <h1>BUSTAT LAMPUNG</h1>
                <p>
                    Sistem Informasi Geografis Persebaran Terminal Bus di Provinsi Lampung.
                    Temukan lokasi dan informasi detail terminal dengan mudah.
                </p>
                <a href="peta" class="btn btn-gold">
                    <i class="bi bi-map-fill me-2"></i>Lihat Peta Persebaran
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <div class="section-title">
                    <h2>Fitur Utama</h2>
                </div>
                <div class="row g-4">
                    <!-- Feature Card 1 -->
                    <div class="col-md-4">
                        <div class="feature-card">
                            <i class="bi bi-map-fill feature-icon"></i>
                            <h3>Peta Interaktif</h3>
                            <p>Visualisasikan lokasi semua terminal bus di Lampung dalam peta yang responsif dan mudah digunakan.</p>
                        </div>
                    </div>
                    <!-- Feature Card 2 -->
                    <div class="col-md-4">
                        <div class="feature-card">
                            <i class="bi bi-search-heart feature-icon"></i>
                            <h3>Pencarian Cepat</h3>
                            <p>Cari terminal berdasarkan nama atau lokasi untuk mendapatkan informasi yang Anda butuhkan secara instan.</p>
                        </div>
                    </div>
                    <!-- Feature Card 3 -->
                    <div class="col-md-4">
                        <div class="feature-card">
                            <i class="bi bi-info-circle-fill feature-icon"></i>
                            <h3>Informasi Tabel</h3>
                            <p>Dapatkan detail mengenai terminal, termasuk tipe, alamat, dan jumlah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container">
            <p>&copy; 2024 Mukhlish Sulthon Nashrullah | All Rights Reserved</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\bustat-lampung\resources\views/beranda.blade.php ENDPATH**/ ?>