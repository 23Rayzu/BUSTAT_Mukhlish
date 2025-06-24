<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'BUSTAT LAMPUNG'); ?></title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    
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

    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <div class="app-wrapper">
        <!-- Header / Navbar -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <i class="bi bi-bus-front-fill"></i>
                        BUSTAT LAMPUNG
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                
                                <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(url('/')); ?>">Beranda</a>
                            </li>
                            <li class="nav-item">
                                
                                <a class="nav-link <?php echo e(request()->is('peta*') ? 'active' : ''); ?>" href="<?php echo e(url('/peta')); ?>">Peta</a>
                            </li>
                            <li class="nav-item">
                                 
                                <a class="nav-link <?php echo e(request()->is('tabel*') ? 'active' : ''); ?>" href="<?php echo e(url('/tabel')); ?>">Tabel Informasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Konten Halaman Dinamis -->
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container">
                <p class="mb-0">&copy; <?php echo e(date('Y')); ?> Mukhlish Sulthon Nashrullah | All Rights Reserved</p>
            </div>
        </footer>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\bustat-lampung\resources\views/layouts/app.blade.php ENDPATH**/ ?>