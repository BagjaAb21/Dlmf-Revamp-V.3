<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Deutsch Lernen mit Fara')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #7C3AED;
            --secondary-color: #A855F7;
            --accent-color: #FDE047;
            --dark-blue: #1E293B;
            --light-gray: #F8FAFC;
            --text-dark: #334155;
        }

        .navbar-dark.bg-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
        }

        .nav-link.active {
            color: var(--accent-color) !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
            transition: color 0.3s ease;
        }

        .btn-light {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
        }

        footer.bg-dark {
            background: var(--dark-blue) !important;
        }

        .social-links a:hover {
            color: var(--accent-color) !important;
            transition: color 0.3s ease;
        }

        .text-white-50:hover {
            color: var(--accent-color) !important;
            transition: color 0.3s ease;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-translate me-2"></i>
                Deutsch Lernen mit Fara
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('teachers.index') ? 'active' : '' }}" href="{{ route('teachers.index') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-light btn-sm" href="/admin-minfara">
                            <i class="bi bi-lock"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Deutsch Lernen mit Fara</h5>
                    <p>Portal belajar bahasa Jerman No. 1 di Indonesia</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white-50">Beranda</a></li>
                        <li><a href="{{ route('blog.index') }}" class="text-white-50">Blog</a></li>
                        <li><a href="{{ route('teachers.index') }}" class="text-white-50">Guru</a></li>
                        <li><a href="{{ route('about') }}" class="text-white-50">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p class="text-white-50">
                        <i class="bi bi-envelope me-2"></i> info@deutschlernen.id<br>
                        <i class="bi bi-phone me-2"></i> +62 812 3456 7890<br>
                        <i class="bi bi-geo-alt me-2"></i> Jakarta, Indonesia
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Deutsch Lernen mit Fara. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @stack('scripts')
</body>
</html>
