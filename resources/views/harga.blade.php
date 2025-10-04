<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga - DlmF</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #7C3AED;
            --secondary-color: #A855F7;
            --accent-color: #FDE047;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-blue: #1E293B;
            --light-gray: #F8FAFC;
            --text-dark: #334155;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.1);
            padding: 0.75rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-flag {
            display: flex;
            flex-direction: column;
            width: 24px;
            height: 36px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .flag-stripe {
            height: 12px;
            width: 100%;
        }

        .flag-black {
            background-color: #000000;
        }

        .flag-red {
            background-color: #DD0000;
        }

        .flag-yellow {
            background-color: #FFCE00;
        }

        .logo-flag::before {
            content: '★';
            position: absolute;
            left: -8px;
            top: -3px;
            color: #FFD700;
            font-size: 10px;
            z-index: 1;
        }

        .logo-flag::after {
            content: '★';
            position: absolute;
            left: -8px;
            top: 8px;
            color: #FF6B6B;
            font-size: 8px;
            z-index: 1;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .logo-title,
        .logo-subtitle {
            font-size: 1.4rem;
            font-weight: 700;
            color: #4a90a4;
            margin-bottom: -2px;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 15px;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.75rem 0;
            font-size: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28124, 58, 237, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .dropdown-menu {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(124, 58, 237, 0.1);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.1);
        }

        .dropdown-item {
            color: var(--text-dark) !important;
            transition: all 0.3s ease;
            padding: 0.75rem 1.5rem;
        }

        .dropdown-item:hover {
            background: rgba(124, 58, 237, 0.1);
            color: var(--primary-color) !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.02)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.4;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .text-gradient {
            background: linear-gradient(45deg, var(--accent-color), #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Programs Section */
        .programs-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--light-gray) 0%, #e2e8f0 100%);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .program-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(124, 58, 237, 0.1);
            position: relative;
            overflow: hidden;
        }

        .program-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .program-card:hover::before {
            transform: scaleX(1);
        }

        .program-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(124, 58, 237, 0.2);
        }

        .program-type {
            display: block;
            font-size: 1.3rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 1rem;
        }

        .program-price-container {
            margin-bottom: 0.5rem;
        }

        .program-price-old {
            font-size: 1.2rem;
            font-weight: 500;
            color: #94a3b8;
            text-decoration: line-through;
            margin-bottom: 0.2rem;
            display: block;
        }

        .program-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--danger-color);
            margin-bottom: 0.5rem;
        }

        .program-duration {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .program-description {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            text-align: justify;
        }

        .benefits-title {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            color: #64748b;
        }

        .benefit-item i {
            color: var(--success-color);
            margin-right: 10px;
            margin-top: 3px;
            font-size: 0.8rem;
        }

        .btn-program {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: auto;
        }

        .btn-program:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
            color: white;
        }

        /* FAQ Section */
        .faq-section {
            padding: 100px 0;
            background: white;
        }

        .faq-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .faq-item:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.15);
        }

        .faq-header {
            width: 100%;
            background: none;
            border: none;
            padding: 1.5rem;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--text-dark);
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .faq-header:hover {
            background: rgba(124, 58, 237, 0.05);
        }

        .faq-icon {
            transition: transform 0.3s ease;
            color: var(--primary-color);
            font-size: 0.9rem;
            margin-left: 15px;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-content {
            display: none;
            padding: 0 1.5rem 1.5rem;
            color: #64748b;
            line-height: 1.6;
            animation: fadeIn 0.3s ease;
        }

        .faq-content.show {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 80px 0;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }

        .btn-cta {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px white;
            color: white;
            text-decoration: none;
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

        @media (max-width: 576px) {
            .social-links {
                justify-content: center;
            }
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom: none;
        }

        .modal-title {
            font-weight: 700;
        }

        .btn-close {
            filter: invert(1);
        }

        .price-detail {
            padding: 2rem;
        }

        .price-breakdown {
            background: var(--light-gray);
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            padding: 0.5rem 0;
        }

        .price-item:not(:last-child) {
            border-bottom: 1px solid #e2e8f0;
        }

        .price-total {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            border-top: 2px solid var(--primary-color);
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .whatsapp-buttons {
            display: flex;
            gap: 1rem;
            flex-direction: column;
        }

        .btn-whatsapp {
            background: #25D366;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-whatsapp:hover {
            background: #128C7E;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
        }

        /* Floating Elements */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .floating-whatsapp {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            text-decoration: none;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(37, 211, 102, 0.4);
            animation: float 3s ease-in-out infinite;
            transition: all 0.3s ease;
        }

        .floating-whatsapp:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.6);
            color: white;
            text-decoration: none;
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: none;
            z-index: 1000;
            border: none;
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3);
            transition: all 0.3s ease;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.4rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .program-card {
                margin-bottom: 2rem;
            }

            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                margin-top: 1rem;
                padding: 1rem;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(124, 58, 237, 0.1);
            }

            .floating-whatsapp {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        .slide-up {
            transform: translateY(50px);
            opacity: 0;
            animation: slideUp 0.8s ease forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}" style="width: 200px; height: auto;"
                    alt="Logo-Mitfara-Panjang">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/program') }}">Program</a></li>
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> --}}
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Produk Digital</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="hero-content">
                        <h1 class="hero-title fade-in">
                            Belajar Bahasa Jerman Jadi<br>
                            <span class="text-gradient">Lebih Mudah & Terjangkau</span>
                        </h1>
                        <p class="hero-subtitle fade-in">
                            Bergabunglah dengan ribuan siswa yang telah berhasil menguasai bahasa Jerman bersama kami
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="program" class="programs-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Program Kursus Bahasa Jerman di DlmF</h2>
                    <p class="section-subtitle">
                        Dari pemula hingga mahir, kami memiliki program yang tepat untuk kebutuhan pembelajaran Anda
                        dengan harga terjangkau
                    </p>
                </div>
            </div>

            <!-- Programs Row -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="program-card">
                        <div class="program-type">Super Intensif Reguler Offline</div>
                        <div class="program-price-container">
                            <span class="program-price-old">Rp2.000.000</span>
                            <div class="program-price">Rp1.750.000</div>
                        </div>
                        <div class="program-duration">20x Pertemuan</div>
                        <p class="program-description">
                            Belajar langsung di kelas dengan suasana interaktif. Cocok untuk anda yang ingin cepat
                            memahami Bahasa Jerman secara menyeluruh dengan bimbingan tatap muka.
                        </p>

                        <div class="benefits-title">Benefit:</div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>8x Simulasi Ujian GOETHE</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat Keikutsertaan</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Video Pembelajaran</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Konsultasi dengan Tutor di Luar Jam Pembelajaran</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> E-Book Modul Lengkap</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Konsultasi Program yang ingin diikuti di Jerman</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Rapot Akhir Pembelajaran</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Terdapat pilihan Level A1, A2, B1</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Jadwal Fleksibel Pagi, Sore, Malam</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Kelas eksklusif berisi hanya 3 hingga 8 siswa</span>
                        </div>

                        <button class="btn btn-program mt-auto"
                            onclick="showPricingModal('Super Intensif Reguler Offline', 'Rp1.750.000')">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="program-card">
                        <div class="program-type">Kelas Private Gramatik</div>
                        <div class="program-price-container">
                            <span class="program-price-old">Rp150.000</span>
                            <div class="program-price">Rp100.000</div>
                        </div>
                        <div class="program-duration">1x Pertemuan</div>
                        <p class="program-description">
                            Kelas Private Grammatik sangat cocok bagi anda yang ingin mendalami grammatik tertentu.
                            Waktu dan kuantitas kelas dapat disesuaikan dengan kebutuhanmu.
                        </p>

                        <div class="benefits-title">Benefit:</div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>8x Simulasi Ujian GOETHE</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat Keikutsertaan</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Video Pembelajaran</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Konsultasi dengan Tutor di Luar Jam Pembelajaran</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> E-Book Modul Lengkap</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Konsultasi Program yang ingin diikuti di Jerman</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Gratis</b> Rapot Akhir Pembelajaran</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Terdapat pilihan Level A1, A2, B1</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Jadwal Fleksibel Pagi, Sore, Malam</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Kelas eksklusif berisi hanya 1 s.d 2 Siswa</b></span>
                        </div>
                        <button class="btn btn-program mt-auto"
                            onclick="showPricingModal('Program Au Pair', 'Rp100.000')">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="program-card">
                        <div class="program-type">Super Intensif Regular Online</div>
                        <div class="program-price-container">
                            <span class="program-price-old">Rp1.700.000</span>
                            <div class="program-price">Rp1.250.000</div>
                        </div>
                        <div class="program-duration">20x Pertemuan</div>
                        <p class="program-description">
                            Belajar dari mana saja dengan metode intensif. Dirancang untuk anda yang ingin fasih Bahasa
                            Jerman secara efektif melalui sesi live online yang terarah.
                        </p>

                        <div class="benefits-title">Benefit:</div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Latihan Mendengar</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Latihan Membaca</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Latihan Menulis</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Latihan Berbicara</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Video Practice 1 & 2 Dirose</span>
                        </div>

                        <button class="btn btn-program mt-auto"
                            onclick="showPricingModal('Super Intensif Regular Online', 'Rp1.250.000')">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="program-card">
                        <div class="program-type">Kelas Persiapan Ujian</div>
                        <div class="program-price-container">
                            <span class="program-price-old">Rp125.000</span>
                            <div class="program-price">Rp100.000</div>
                        </div>
                        <div class="program-duration">1x Pertemuan</div>
                        <p class="program-description">
                            Kelas Persiapan Ujian sangat cocok bagi anda yang sedang menyiapkan ujian sertifikasi Bahasa
                            Jerman. Waktu dan kuantitas kelas dapat disesuaikan dengan kebutuhanmu. Dalam kelas
                            persiapan ujian ini, fokusnya akan membahas soal-soal lesen, hören, schreiben dan sprechen.
                        </p>

                        <div class="benefits-title">Benefit:</div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Lesen (Membaca)</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Schreiben (Menulis)</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Latihan soal dan kuis</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Hören (Mendengar)</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sprechen (Berbicara)</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span><b>Kelas Private 1 s.d. 2 Siswa</b></span>
                        </div>

                        <button class="btn btn-program mt-auto"
                            onclick="showPricingModal('Course Bahasa Jerman', 'Rp100.000')">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="program-card">
                        <div class="program-type">Au Pair</div>
                        <div class="program-price-container">
                            <span class="program-price-old">Rp12.000.000</span>
                            <div class="program-price">Rp10.000.000</div>
                        </div>
                        <div class="program-duration">1x Pertemuan</div>
                        <p class="program-description">
                            Au Pair secara singkat adalah program pertukaran budaya antar negara. Au Pair memberikan
                            kesempatan bagi anak muda yang berusia 18 hingga 26 tahun untuk mengenal budaya dan
                            memperdalam bahasa Jerman secara langsung bersama keluarga asuh di Jerman dengan durasi
                            kontraknya rata-rata setahun.
                        </p>

                        <div class="benefits-title">Benefit:</div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Biaya kursus level A1</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Biaya konsultasi terkait program</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Biaya pencarian keluarga di negara tujuan</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Biaya latihan interview</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Biaya pengurusan VISA</span>
                        </div>

                        <button class="btn btn-program mt-auto" onclick="showPricingModal('Au Pair', 'Rp10.000.000')">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>

                {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="program-card">
                        <div class="program-type">Course Bahasa Jerman</div>
                        <div class="program-price-container">
                            <span class="program-price-old">Rp200.000</span>
                            <div class="program-price">Rp150.000</div>
                        </div>
                        <div class="program-duration">30 Hari</div>
                        <p class="program-description">
                            Belajar Bahasa Jerman jadi lebih mudah dengan sistem Learning Management System (LMS) DlmF.
                            Akses materi kapan saja dan di mana saja, sesuai ritmemu. Fleksibel, terstruktur, dan cocok
                            untuk anda yang ingin belajar mandiri.
                        </p>

                        <div class="benefits-title">Benefit:</div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Akses belajar 24/7 melalui platform LMS DlmF</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Bisa diakses dari mana saja, cukup koneksi internet</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Materi lengkap: video, modul PDF, dan latihan soal</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Cocok untuk pemula maupun pengulangan materi tertentu</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Biaya terjangkau, bisa langganan bulanan</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Support teknis dan akademik melalui chat/email</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Progress belajar tercatat otomatis di sistem</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Kurikulum disusun oleh tutor berpengalaman</span>
                        </div>
                        <div class="benefit-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Dapat digunakan sebagai persiapan ujian resmi seperti Goethe</span>
                        </div>

                        <button class="btn btn-program mt-auto"
                            onclick="showPricingModal('Intensive German Bootcamp', 'Rp150.000')">
                            Daftar Sekarang
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                        alt="FAQ Image" class="img-fluid rounded"
                        style="border-radius: 20px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title text-start mb-3">
                        Freunde Bertanya, MinFara Menjawab
                    </h2>
                    <p class="section-subtitle text-start mb-4">
                        Temukan jawaban untuk pertanyaan yang sering diajukan tentang program kursus bahasa Jerman kami
                    </p>
                    <div class="faq-list mt-4">
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                <span>Gimana cara mulai kursus di DlmF?</span>
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-content">
                                <p>Untuk memulai kursus, Anda hanya perlu mendaftar melalui website kami, memilih
                                    program yang sesuai dengan level Anda, dan melakukan pembayaran. Setelah itu, Anda
                                    langsung bisa mengakses materi pembelajaran.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                <span>Lokasi DlmF itu ada dimana aja MinFar?</span>
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-content">
                                <p>DlmF memiliki cabang di Jakarta, Bandung, Surabaya, dan Yogyakarta. Kami juga
                                    menyediakan kelas online untuk siswa di seluruh Indonesia.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                <span>Berapa di DlmF online atau offline ya, MinFar?</span>
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kami menyediakan kedua opsi. Kelas online mulai dari Rp 750.000 dan kelas offline
                                    mulai dari Rp 1.250.000 per level, tergantung program yang dipilih.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                <span>Butuh request tutor negara aja, MinFar?</span>
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </button>
                            <div class="faq-content">
                                <p>Ya, kami bisa mengatur request khusus untuk tutor dari negara tertentu. Silakan
                                    hubungi customer service kami untuk pengaturan lebih lanjut.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="cta-title">Siap Mulai Belajar Bahasa Jerman?</h2>
                    <p class="cta-subtitle">
                        Bergabunglah dengan ribuan siswa yang telah merasakan kemudahan belajar bahasa Jerman bersama
                        kami
                    </p>
                    <button class="btn btn-cta" onclick="showWhatsAppModal()">
                        <i class="bi bi-whatsapp me-2"></i>
                        WhatsApp MinFara
                    </button>
                </div>
            </div>
        </div>
    </section>

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
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        {{-- <li><a href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> --}}
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
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
                        <a href="https://www.instagram.com/deutschlernen.mit.fara/" target="_blank"
                            class="text-white"><i class="bi bi-instagram"></i>
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

    <!-- Pricing Modal -->
    <div class="modal fade" id="pricingModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Detail Harga Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="price-detail">
                        <div class="price-breakdown" id="priceBreakdown">
                            <div class="price-item">
                                <span>Biaya Program</span>
                                <span class="fw-bold" id="programPrice">-</span>
                            </div>
                            <div class="price-item">
                                <span>Materi Pembelajaran</span>
                                <span class="fw-bold">Termasuk</span>
                            </div>
                            <div class="price-item">
                                <span>Sertifikat</span>
                                <span class="fw-bold">Termasuk</span>
                            </div>
                            <div class="price-item price-total">
                                <span>Total Harga</span>
                                <span id="totalPrice">-</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="whatsapp-buttons">
                                <a href="https://wa.me/6289675765648?text=Halo,%20saya%20tertarik%20untuk%20mendaftar%20program%20"
                                    target="_blank" class="btn-whatsapp" id="whatsappButton1">
                                    <i class="bi bi-whatsapp me-2"></i>
                                    Daftar WhatsApp MinFara 1
                                </a>
                                <a href="https://wa.me/6289647897616?text=Halo,%20saya%20tertarik%20untuk%20mendaftar%20program%20"
                                    target="_blank" class="btn-whatsapp" id="whatsappButton2">
                                    <i class="bi bi-whatsapp me-2"></i>
                                    Daftar WhatsApp MinFara 2
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Modal -->
    <div class="modal fade" id="whatsappModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-whatsapp text-success me-2"></i>
                        Hubungi Kami
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-4">Silakan pilih cara untuk menghubungi kami:</p>
                    <div class="d-grid gap-3">
                        <a href="https://wa.me/6289675765648?text=Halo,%20saya%20tertarik%20untuk%20bergabung%20dengan%20program%20belajar%20bahasa%20Jerman"
                            class="btn btn-success btn-lg" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>
                            WhatsApp MinFara 1: +62 896 7576 5648
                        </a>
                        <a href="https://wa.me/6289647897616?text=Halo,%20saya%20tertarik%20untuk%20bergabung%20dengan%20program%20belajar%20bahasa%20Jerman"
                            class="btn btn-success btn-lg" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>
                            WhatsApp MinFara 2: +62 896 4789 7616
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.backdropFilter = 'blur(20px)';
                navbar.style.boxShadow = '0 2px 20px rgba(124, 58, 237, 0.1)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // FAQ toggle function
        function toggleFaq(element) {
            const faqItem = element.closest('.faq-item');
            const faqContent = faqItem.querySelector('.faq-content');
            const icon = element.querySelector('.faq-icon');

            // Close all other FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                    const otherContent = item.querySelector('.faq-content');
                    const otherIcon = item.querySelector('.faq-icon');
                    otherContent.classList.remove('show');
                    otherContent.style.display = 'none';
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current FAQ item
            if (faqItem.classList.contains('active')) {
                faqItem.classList.remove('active');
                faqContent.classList.remove('show');
                faqContent.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            } else {
                faqItem.classList.add('active');
                faqContent.style.display = 'block';
                faqContent.classList.add('show');
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Show pricing modal
        function showPricingModal(programName, totalPrice) {
            const modal = new bootstrap.Modal(document.getElementById('pricingModal'));
            const modalTitle = document.getElementById('modalTitle');
            const programPriceEl = document.getElementById('programPrice');
            const totalPriceEl = document.getElementById('totalPrice');
            const whatsappButton1 = document.getElementById('whatsappButton1');
            const whatsappButton2 = document.getElementById('whatsappButton2');

            modalTitle.textContent = `Detail Harga - ${programName}`;
            programPriceEl.textContent = totalPrice;
            totalPriceEl.textContent = totalPrice;

            // Update WhatsApp links
            const message = `Halo,%20saya%20tertarik%20untuk%20mendaftar%20program%20${encodeURIComponent(programName)}`;
            whatsappButton1.href = `https://wa.me/6289675765648?text=${message}`;
            whatsappButton2.href = `https://wa.me/6289647897616?text=${message}`;

            modal.show();
        }

        // Show WhatsApp modal
        function showWhatsAppModal() {
            const modal = new bootstrap.Modal(document.getElementById('whatsappModal'));
            modal.show();
        }

        // Back to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide back to top button
        window.addEventListener('scroll', function () {
            const backToTopButton = document.querySelector('.back-to-top');
            if (backToTopButton) {
                if (window.scrollY > 300) {
                    backToTopButton.style.display = 'block';
                    backToTopButton.style.opacity = '1';
                } else {
                    backToTopButton.style.display = 'none';
                    backToTopButton.style.opacity = '0';
                }
            }
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function () {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });

        // Initialize animations on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Fade in animations
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                }, index * 200);
            });
        });

        // Add loading animation to buttons
        document.querySelectorAll('.btn-program').forEach(btn => {
            btn.addEventListener('click', function (e) {
                // Don't prevent default if it's the modal trigger
                if (this.getAttribute('onclick')) {
                    return;
                }

                const originalText = this.innerHTML;
                this.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Loading...';
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1000);
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe program cards
        document.querySelectorAll('.program-card').forEach(card => {
            observer.observe(card);
        });

        // Error handling
        window.addEventListener('error', function (e) {
            console.log('Error caught:', e.error);
        });
    </script>
</body>

</html>
