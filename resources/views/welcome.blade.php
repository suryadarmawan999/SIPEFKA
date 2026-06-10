<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Pengaduan Fasilitas Kampus - Telkom University</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                Sistem Pengaduan Fasilitas Kampus
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            <i class="bi bi-star me-1"></i>Fitur
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            <i class="bi bi-info-circle me-1"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-navbar-primary" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="landing-hero" style="padding: 7rem 0 4rem;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title" style="font-size: 3rem; margin-bottom: 1.25rem;">Sistem Pengaduan Fasilitas Kampus</h1>
                    <p class="hero-subtitle" style="font-size: 1rem; margin-bottom: 2rem;">
                        Platform terintegrasi untuk melaporkan dan mengelola pengaduan fasilitas kampus secara efisien dan transparan.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('register') }}" class="btn btn-hero btn-hero-primary" style="padding: 0.875rem 2rem; font-size: 1rem;">
                            <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-hero btn-hero-outline" style="padding: 0.875rem 2rem; font-size: 1rem;">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <div class="position-relative">
                        <div class="hero-image-wrapper">
                            <img src="{{ asset('images/telkom-rektorat.jpg') }}" alt="Campus Building" class="img-fluid rounded-4 shadow-custom" style="max-height: 350px; width: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section" style="padding: 4rem 0;">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-2" style="color: #55565B; font-size: 2rem;">Fitur Unggulan</h2>
                <p class="text-muted" style="font-size: 1rem;">Platform lengkap untuk mengelola pengaduan fasilitas kampus</p>
            </div>
            
            <div class="row mb-4">
                <div class="col-12">
                    <img src="{{ asset('images/campus-facility.jpg') }}" alt="Campus Facility" class="img-fluid rounded-4 shadow-custom" style="max-height: 280px; width: 100%; object-fit: cover;">
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="feature-card" style="padding: 2rem 1.75rem;">
                        <div class="feature-icon" style="width: 70px; height: 70px; font-size: 2rem; margin-bottom: 1.25rem;">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 1.375rem; margin-bottom: 0.875rem;">Pengaduan Terstruktur</h3>
                        <p class="feature-description" style="font-size: 0.875rem;">
                            Buat pengaduan dengan mudah melalui formulir yang terstruktur, lengkap dengan foto dan detail lokasi.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card" style="padding: 2rem 1.75rem;">
                        <div class="feature-icon" style="width: 70px; height: 70px; font-size: 2rem; margin-bottom: 1.25rem;">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 1.375rem; margin-bottom: 0.875rem;">Monitoring Real-time</h3>
                        <p class="feature-description" style="font-size: 0.875rem;">
                            Pantau status pengaduan secara real-time dari awal hingga selesai ditangani.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card" style="padding: 2rem 1.75rem;">
                        <div class="feature-icon" style="width: 70px; height: 70px; font-size: 2rem; margin-bottom: 1.25rem;">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 1.375rem; margin-bottom: 0.875rem;">Laporan & Analitik</h3>
                        <p class="feature-description" style="font-size: 0.875rem;">
                            Akses laporan lengkap dan analitik untuk evaluasi pengelolaan fasilitas kampus.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card" style="padding: 2rem 1.75rem;">
                        <div class="feature-icon" style="width: 70px; height: 70px; font-size: 2rem; margin-bottom: 1.25rem;">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 1.375rem; margin-bottom: 0.875rem;">Keamanan Data</h3>
                        <p class="feature-description" style="font-size: 0.875rem;">
                            Data pengaduan terlindungi dengan sistem keamanan berbasis role dan autentikasi.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card" style="padding: 2rem 1.75rem;">
                        <div class="feature-icon" style="width: 70px; height: 70px; font-size: 2rem; margin-bottom: 1.25rem;">
                            <i class="bi bi-file-pdf"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 1.375rem; margin-bottom: 0.875rem;">Export Laporan</h3>
                        <p class="feature-description" style="font-size: 0.875rem;">
                            Export laporan dalam format PDF dan Excel untuk dokumentasi dan analisis.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card" style="padding: 2rem 1.75rem;">
                        <div class="feature-icon" style="width: 70px; height: 70px; font-size: 2rem; margin-bottom: 1.25rem;">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 1.375rem; margin-bottom: 0.875rem;">Responsif</h3>
                        <p class="feature-description" style="font-size: 0.875rem;">
                            Akses platform dari berbagai perangkat dengan desain yang responsif dan modern.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-4" style="background: #F8F9FA;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3" style="color: #55565B; font-size: 2rem;">Tentang Sistem</h2>
                    <p class="text-muted mb-3" style="font-size: 1rem; line-height: 1.7;">
                        Sistem Pengaduan Fasilitas Kampus merupakan platform berbasis web yang dikembangkan untuk 
                        memudahkan sivitas akademika dalam melaporkan kerusakan atau masalah pada fasilitas kampus. 
                        Sistem ini dirancang dengan teknologi modern untuk memberikan pengalaman pengguna yang optimal.
                    </p>
                    <div class="d-flex gap-4">
                        <div>
                            <div class="fw-bold text-primary-custom" style="font-size: 1.75rem;">5+</div>
                            <div class="text-muted" style="font-size: 0.875rem;">Modul Utama</div>
                        </div>
                        <div>
                            <div class="fw-bold text-primary-custom" style="font-size: 1.75rem;">100%</div>
                            <div class="text-muted" style="font-size: 0.875rem;">Terintegrasi</div>
                        </div>
                        <div>
                            <div class="fw-bold text-primary-custom" style="font-size: 1.75rem;">24/7</div>
                            <div class="text-muted" style="font-size: 0.875rem;">Tersedia</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <div class="position-relative overflow-hidden rounded-4" style="box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
                        <img src="{{ asset('images/tult.jpg') }}" alt="University Campus" class="img-fluid w-100" style="height: 320px; object-fit: cover; display: block;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-4" style="background: linear-gradient(135deg, #B6252A 0%, #ED1E28 100%);">
        <div class="container text-center text-white">
            <h2 class="fw-bold mb-2" style="font-size: 2rem;">Siap Memulai?</h2>
            <p class="mb-3" style="font-size: 1rem; opacity: 0.95;">
                Bergabunglah dengan kami untuk mendukung kualitas fasilitas kampus yang lebih baik
            </p>
            <a href="{{ route('register') }}" class="btn btn-hero btn-hero-primary me-2" style="padding: 0.875rem 2rem; font-size: 1rem;">
                <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
            </a>
            <a href="{{ route('login') }}" class="btn btn-hero btn-hero-outline" style="padding: 0.875rem 2rem; font-size: 1rem;">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Akun
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-3 bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0 text-muted">
                        Sistem Pengaduan Fasilitas Kampus - Telkom University
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-muted">
                        &copy; {{ date('Y') }} All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const navbarCollapse = document.getElementById('navbarNav');
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                            toggle: false
                        });
                        bsCollapse.hide();
                    }
                }
            });
        });

        // Active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.navbar-landing .nav-link[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>
