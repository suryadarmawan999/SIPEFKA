<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar - Sistem Pengaduan Fasilitas Kampus</title>
    
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
    <style>
        body {
            background: linear-gradient(135deg, #F8F9FA 0%, #FFFFFF 100%);
            min-height: 100vh;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            padding-top: 100px;
            padding-bottom: 50px;
        }
        .auth-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
        }
        .auth-card-header {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            color: var(--white);
            padding: 1.5rem;
            text-align: center;
        }
        .auth-card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .auth-card-header p {
            margin: 0.25rem 0 0;
            opacity: 0.9;
            font-size: 0.875rem;
        }
        .auth-card-body {
            padding: 1.75rem;
        }
        .auth-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: var(--white);
            box-shadow: 0 8px 24px rgba(182, 37, 42, 0.3);
        }
    </style>
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
                        <a class="nav-link" href="/#features">
                            <i class="bi bi-star me-1"></i>Fitur
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about">
                            <i class="bi bi-info-circle me-1"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-navbar-primary active" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Auth Container -->
    <div class="auth-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6 mt-3">
                    <div class="auth-card">
                        <div class="auth-card-header">
                            <div class="auth-icon">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <h2>Daftar Akun Baru</h2>
                            <p>Bergabunglah dengan kami sekarang</p>
                        </div>
                        <div class="auth-card-body">
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="name" class="form-label">
                                            <i class="bi bi-person me-1"></i>Nama Lengkap
                                        </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-2">
                                        <label for="email" class="form-label">
                                            <i class="bi bi-envelope me-1"></i>Email
                                        </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-2">
                                        <label for="role" class="form-label">
                                            <i class="bi bi-person-badge me-1"></i>Role
                                        </label>
                                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                            <option value="">Pilih Role</option>
                                            <option value="Mahasiswa" {{ old('role') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                            <option value="Dosen" {{ old('role') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-2">
                                        <label for="nim_nip" class="form-label">
                                            <i class="bi bi-card-text me-1"></i>NIM/NIP
                                        </label>
                                        <input type="text" class="form-control @error('nim_nip') is-invalid @enderror" id="nim_nip" name="nim_nip" value="{{ old('nim_nip') }}" placeholder="Masukkan NIM/NIP" required>
                                        @error('nim_nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-2">
                                        <label for="password" class="form-label">
                                            <i class="bi bi-lock me-1"></i>Password
                                        </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 8 karakter" required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            <i class="bi bi-lock-fill me-1"></i>Konfirmasi Password
                                        </label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                                </button>
                            </form>
                            
                            <div class="text-center mt-3">
                                <p class="text-muted mb-0">
                                    Sudah punya akun? 
                                    <a href="{{ route('login') }}" class="text-primary-custom fw-semibold text-decoration-none">
                                        Masuk di sini
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3 bg-white border-top mt-auto">
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
    </script>
</body>
</html>
