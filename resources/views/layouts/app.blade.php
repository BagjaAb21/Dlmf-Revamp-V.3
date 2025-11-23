<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Deutsch Lernen mit Fara')</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <meta name="description" content="@yield('description', 'Belajar bahasa Jerman dengan cara yang menyenangkan dan efektif bersama Deutsch Lernen mit Fara.')">
    <meta name="keywords" content="@yield('keywords', 'Bahasa Jerman, Kursus Bahasa Jerman, Deutsch Lernen mit Fara')">

    <!-- Bootstrap CSS CDN - taruh SEBELUM vite -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Header & Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.1);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            height: auto;
            min-height: 70px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-1px);
        }

        /* Footer */
        .footer {
            background: var(--dark-blue);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
            display: inline-block;
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: white;
        }

        .contact-info {
            display: flex;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .contact-info i {
            margin-right: 10px;
            color: var(--primary-color);
            width: 20px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            line-height: 1.8;
            text-align: justify;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(124, 58, 237, 0.1);
            border-radius: 8px;
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 576px){
            .social-links {
                justify-content: center;
            }
        }

        .text-white-50:hover {
            color: var(--accent-color) !important;
            transition: color 0.3s ease;
        }
    </style>

    @stack('styles')
</head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"
                aria-label="Deutsch Lernen mit Fara - Kursus Bahasa Jerman">
                <img src="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}" style="width: 200px; height: auto;"
                    alt="Logo Deutsch Lernen mit Fara - Kursus Bahasa Jerman Premium"
                    title="DlmF - Kursus Bahasa Jerman Terpercaya">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" aria-current="page">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/program') }}">Program</a></li>
                            <li><a class="dropdown-item" href="{{ url('/product') }}">Produk</a></li>
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/img/logo/logo-Transparant3.png') }}" style="width: 180px;"
                            alt="Logo-Mitfara-Bulat">
                    </div>
                    <h2 class="footer-brand"><b>Deutsch Lernen Mit Fara</b></h2>
                    <p class="footer-description">
                        Platform pembelajaran bahasa Jerman terpercaya dengan metode pembelajaran yang efektif dan
                        menyenangkan.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Quick Link</h5>
                    <ul class="footer-links">
                        {{-- <li><a href="#">Course</a></li> --}}
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/program') }}">Program</a></li>
                        {{-- <li><a href="{{ url('/blog') }}">Blog</a></li> --}}
                        {{-- <li><a href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> --}}
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                        {{-- <li><a href="#">Career</a></li>
                        <li><a href="#">Legalitas</a></li> --}}

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Get In Touch</h5>
                    <div class="contact-info">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Jalan Terusan Sari Asih No. 76, Sarijadi, Sukasari, Bandung, Jawa Barat</span>
                    </div>
                    <div class="contact-info">
                        <i class="bi bi-telephone-fill"></i>
                        <span><a class="text-decoration-none" style="color: rgba(255, 255, 255, 0.7);"
                                href="https://wa.me/6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0">+62
                                896 4789 7616</a>
                        </span>
                    </div>
                    <div class="contact-info">
                        <i class="bi bi-envelope-fill"></i>
                        <span><a class="text-decoration-none" style="color: rgba(255, 255, 255, 0.7);"
                                href="mailto:info@mitfara.com">info@mitfara.com</a>
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Follow Us</h5>
                    <div class="d-flex gap-3 social-links mb-1">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i>
                        </a>
                        <a href="#" class="text-white"><i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                    <p class="footer-description">
                        Ikuti media sosial kami untuk tips belajar bahasa Jerman dan update program terbaru.
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <span>© 2025 Deutsch Lernen mit Fara. All Rights Reserved</span>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#" class="me-3 text-white text-decoration-none">Terms</a>
                        <a href="#" class="me-3 text-white text-decoration-none">Privacy</a>
                        <a href="#" class="text-white text-decoration-none">Legal</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @stack('scripts')

    <script>
        // Navbar background on scroll
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>
