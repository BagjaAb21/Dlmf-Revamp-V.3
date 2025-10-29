<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deutsch FlexiLearn - DlmF</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #7C3AED;
            --secondary-color: #A855F7;
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
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.1);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            padding: 0.5rem 0.75rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.9)),
                url('https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 75vh;
            display: flex;
            align-items: center;
            padding: 140px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            top: -300px;
            right: -150px;
            animation: pulse 6s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 10px 24px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 35px;
            line-height: 1.8;
        }

        .hero-features {
            display: flex;
            gap: 30px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .hero-feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
        }

        .hero-feature-item i {
            font-size: 1.5rem;
            color: #7C3AED;
        }

        .about-section {
            padding: 100px 0;
            background: white;
        }

        .section-badge {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(168, 85, 247, 0.1));
            color: var(--primary-color);
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 2rem;
            line-height: 1.3;
        }

        .section-text {
            font-size: 1rem;
            color: #64748B;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .feature-card {
            background: var(--light-gray);
            padding: 30px;
            border-radius: 16px;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.15);
            border-color: rgba(124, 58, 237, 0.3);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .feature-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 10px;
        }

        .feature-desc {
            color: #64748B;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .pricing-section {
            padding: 100px 0;
            background: linear-gradient(to bottom, #F8F9FA 0%, #FFFFFF 100%);
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .pricing-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .pricing-tab {
            background: white;
            padding: 12px 30px;
            border-radius: 30px;
            border: 2px solid #E2E8F0;
            cursor: pointer;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s;
        }

        .pricing-tab.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-color: var(--primary-color);
        }

        .pricing-grid {
            display: none;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .pricing-grid.active {
            display: grid;
        }

        .pricing-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            border: 3px solid transparent;
            position: relative;
        }

        .pricing-card.popular {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .pricing-card.popular::before {
            content: 'PALING POPULER';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(124, 58, 237, 0.2);
        }

        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }

        .pricing-duration {
            font-size: 0.9rem;
            color: var(--primary-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 25px;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        .pricing-features li {
            padding: 12px 0;
            color: #64748B;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pricing-features li i {
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .btn-pricing {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 15px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-pricing:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
        }

        .benefits-section {
            padding: 100px 0;
            background: white;
        }

        .benefit-item {
            display: flex;
            gap: 25px;
            margin-bottom: 35px;
            align-items: start;
        }

        .benefit-number {
            min-width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
        }

        .benefit-content h4 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 5px;
        }

        .benefit-content p {
            color: #64748B;
            line-height: 1.8;
        }

        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -250px;
            right: -100px;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .cta-section p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .btn-cta {
            background: white;
            color: var(--primary-color);
            padding: 18px 45px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
            transition: all 0.3s;
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--primary-color);
        }

        .footer {
            background: var(--dark-blue);
            color: white;
            padding: 80px 0 30px;
        }

        .footer-brand {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: white;
        }

        .contact-info {
            display: flex;
            margin-bottom: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .contact-info i {
            margin-right: 12px;
            color: var(--primary-color);
            width: 20px;
            flex-shrink: 0;
            margin-top: 4px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 50px;
            color: rgba(255, 255, 255, 0.7);
        }

        .social-links {
            display: flex;
            gap: 1.2rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(124, 58, 237, 0.15);
            border-radius: 12px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 1.3rem;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                background-attachment: scroll;
                min-height: 60vh;
                padding: 120px 0 80px;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .hero-features {
                flex-direction: column;
                gap: 15px;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .pricing-tabs {
                flex-direction: column;
                align-items: stretch;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}" style="width: 200px; height: auto;"
                    alt="Logo-Mitfara-Panjang">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/program') }}">Program</a></li>
                            <li><a class="dropdown-item" href="{{ url('/product') }}">Produk</a></li>
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> --}}
                        </ul>
                    </li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge">
                        <i class="bi bi-laptop me-2"></i>LEARNING MANAGEMENT SYSTEM
                    </div>
                    <h1 class="hero-title">Deutsch FlexiLearn</h1>
                    <p class="hero-subtitle">
                        Nikmati kebebasan belajar bahasa Jerman kapan saja dan dari mana saja, dengan sistem yang
                        menyesuaikan kebutuhan dan ritme belajarmu.
                    </p>
                    <div class="hero-features">
                        <div class="hero-feature-item">
                            <i class="bi bi-clock-history"></i>
                            <span>Akses Fleksibel</span>
                        </div>
                        <div class="hero-feature-item">
                            <i class="bi bi-play-circle"></i>
                            <span>Akses Video Pembelajaran 24/7</span>
                        </div>
                        <div class="hero-feature-item">
                            <i class="bi bi-journal-check"></i>
                            <span>Evaluasi & Quiz</span>
                        </div>
                        <div class="hero-feature-item">
                            <i class="bi bi-award"></i>
                            <span>Sertifikat</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?auto=format&fit=crop&w=800&q=80"
                        alt="FlexiLearn" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="h-100">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80"
                            alt="Learning Platform" class="img-fluid rounded-4 shadow-lg w-100 h-100"
                            style="object-fit: cover; object-position: center;">
                    </div>
                </div>
                <div class="col-lg-5" style="margin-left: 30px;">
                    <div class="section-badge">Tentang Program</div>
                    <h2 class="section-title">Belajar Bahasa Jerman dengan Cara yang Lebih Fleksibel</h2>
                    <p class="section-text" style="text-align: justify;">
                        <strong>Deutsch Flexilearn</strong> adalah Learning Management System (LMS) eksklusif dari
                        Deutsch Lernen mit Fara yang dirancang untuk kamu yang ingin belajar bahasa Jerman secara
                        fleksibel, kapan saja, dan di mana saja.
                    </p>
                    <p class="section-text" style="text-align: justify;">
                        Program ini cocok untuk kamu yang punya jadwal padat namun ingin produktif belajar Bahasa
                        Jerman. Deutsch FlexiLearn akan tersedia dalam <strong>level A1 hingga B2</strong>. Lengkap
                        dengan modul, latihan
                        soal, dan video pembelajaran yang bisa diakses kapan saja dan di mana saja.
                    </p>
                    <p class="section-text" style="text-align: justify;">
                        Sistem belajarnya asinkronus, jadi kamu bisa belajar mandiri sesuai ritme masing-masing. Setelah
                        berhasil menyelesaikan semua materi dan latihan, kamu akan mendapatkan <strong>sertifikat
                            penyelesaian course</strong> sebagai bukti pencapaian.
                    </p>
                </div>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <h4 class="feature-title">Modul Eksklusif</h4>
                    <p class="feature-desc">Materi pembelajaran terstruktur untuk level A1-B2, disusun secara sistematis
                        dengan penjelasan yang mudah dipahami.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-camera-video"></i>
                    </div>
                    <h4 class="feature-title">Video Pembelajaran</h4>
                    <p class="feature-desc">Video interaktif dan berkualitas tinggi yang membantu kamu memahami konsep
                        bahasa Jerman dengan lebih jelas.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <h4 class="feature-title">Latihan Soal</h4>
                    <p class="feature-desc">Ragam latihan yang dirancang untuk menguji pemahaman dan melatih kemampuan
                        bahasa Jerman secara konsisten.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <h4 class="feature-title">Sertifikat</h4>
                    <p class="feature-desc">Dapatkan sertifikat penyelesaian sebagai bentuk pengakuan atas pencapaian
                        dan kemajuan belajarmu./p>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section">
        <div class="container">
            <div class="pricing-header">
                <div class="section-badge">Pilihan Paket</div>
                <h2 class="section-title">Pilih Sesuai Kebutuhanmu</h2>
                <p class="section-text">Beragam paket belajar dengan harga terjangkau dan fleksibilitas tinggi.</p>
            </div>

            <div class="pricing-tabs">
                <div class="pricing-tab active" onclick="switchTab('monthly')">
                    <i class="bi bi-calendar me-2"></i>Paket Bulanan
                </div>
                <div class="pricing-tab" onclick="switchTab('lifetime')">
                    <i class="bi bi-infinity me-2"></i>Paket Lifetime
                </div>
            </div>
            <!-- Paket Monthly -->
            <div class="pricing-grid active" id="monthly">
                <!-- 149k/bln -->
                <div class="pricing-card">
                    <div class="pricing-duration">2 Bulan</div>
                    <div class="pricing-price">Rp 149.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses 2 bulan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Level A1</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 10 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing" onclick="pilihPaket('2 Bulan', 'Rp 149.000')">Pilih Paket</button>
                </div>
                <!-- 169k/bln -->
                <div class="pricing-card">
                    <div class="pricing-duration">6 Bulan</div>
                    <div class="pricing-price">Rp 169.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses 2 bulan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Level A1</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 10 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing" onclick="pilihPaket('6 Bulan', 'Rp 169.000')">Pilih Paket</button>
                </div>
                <!-- 189k/bln -->
                <div class="pricing-card">
                    <div class="pricing-duration">12 Bulan</div>
                    <div class="pricing-price">Rp 189.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses 2 bulan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Level A1</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 10 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing" onclick="pilihPaket('12 Bulan', 'Rp 189.000')">Pilih Paket</button>
                </div>
            </div>

            <!-- Paket Lifetime -->
            <div class="pricing-grid" id="lifetime">
                <!-- 199k/lifetime -->
                <div class="pricing-card">
                    <div class="pricing-duration">Lifetime Basic</div>
                    <div class="pricing-price">Rp 199.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses seumur hidup</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing" onclick="pilihPaket('Lifetime Basic', 'Rp 199.000')">Pilih
                        Paket</button>
                </div>
                <!-- 299k/lifetime -->
                <div class="pricing-card">
                    <div class="pricing-duration">Lifetime + 10 Digital Product</div>
                    <div class="pricing-price">Rp 299.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses seumur hidup</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 10 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing"
                        onclick="pilihPaket('Lifetime + 10 Digital Product', 'Rp 299.000')">Pilih Paket</button>
                </div>
                <!-- 399k/lifetime -->
                <div class="pricing-card">
                    <div class="pricing-duration">Lifetime + 20 Digital Product</div>
                    <div class="pricing-price">Rp 399.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses seumur hidup</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 20 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing"
                        onclick="pilihPaket('Lifetime + 20 Digital Product', 'Rp 399.000')">Pilih Paket</button>
                </div>
                <!-- 599k/lifetime -->
                <div class="pricing-card popular" style="margin-top: 1rem;">
                    <div class="pricing-duration">Lifetime + 20 Digital Product + Private Session (1x)</div>
                    <div class="pricing-price">Rp 599.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses seumur hidup</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 20 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Private Session 1x</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing"
                        onclick="pilihPaket('Lifetime + 20 Digital Product + Private Session (1x)', 'Rp 599.000')">Pilih
                        Paket</button>
                </div>
                <!-- 699k/lifetime -->
                <div class="pricing-card">
                    <div class="pricing-duration">Lifetime + 20 Digital Product + Private Session (2x)</div>
                    <div class="pricing-price">Rp 699.000</div>
                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Akses seumur hidup</li>
                        <li><i class="bi bi-check-circle-fill"></i> Materi Lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Video pembelajaran</li>
                        <li><i class="bi bi-check-circle-fill"></i> Latihan soal</li>
                        <li><i class="bi bi-check-circle-fill"></i> 20 Digital Product</li>
                        <li><i class="bi bi-check-circle-fill"></i> Private Session 2x</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sertifikat</li>
                    </ul>
                    <button class="btn-pricing"
                        onclick="pilihPaket('Lifetime + 20 Digital Product + Private Session (2x)', 'Rp 699.000')">Pilih
                        Paket</button>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="benefits-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="section-badge">Keunggulan</div>
                    <h2 class="section-title">Mengapa Memilih Deutsch FlexiLearn?</h2>

                    <div class="benefit-item">
                        <div class="benefit-number">1</div>
                        <div class="benefit-content">
                            <h4>Fleksibilitas Waktu</h4>
                            <p>Belajar kapan saja sesuai jadwalmu tanpa terikat waktu tertentu. Cocok untuk kamu yang
                                sibuk dengan pekerjaan atau kuliah.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-number">2</div>
                        <div class="benefit-content">
                            <h4>Belajar Mandiri</h4>
                            <p>Sistem asinkronus memungkinkan kamu belajar sesuai kecepatan dan ritme sendiri tanpa
                                tekanan.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-number">3</div>
                        <div class="benefit-content">
                            <h4>Materi Terstruktur</h4>
                            <p>Kurikulum yang dirancang sistematis setiap level dengan modul yang mudah dipahami.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-number">4</div>
                        <div class="benefit-content">
                            <h4>Harga Terjangkau</h4>
                            <p>Berbagai pilihan paket mulai dari bulanan hingga lifetime dengan harga yang kompetitif.
                            </p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-number">5</div>
                        <div class="benefit-content">
                            <h4>Opsi Private Session</h4>
                            <p>Untuk paket tertentu, kamu bisa mendapat pendampingan langsung dengan tutor untuk
                                membahas materi yang belum dipahami.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80"
                        alt="Online Learning" class="img-fluid rounded-4 shadow-lg mb-4">
                    <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=800&q=80"
                        alt="Study Flexible" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Siap Belajar Bahasa Jerman dengan Fleksibel?</h2>
            <p class="mb-4">Konsultasikan kebutuhanmu dengan tim kami.</p>
            <a href="https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+Deutsch+FlexiLearn.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0"
                class="btn-cta"><i class="bi bi-whatsapp me-2"></i>Hubungi MinFara</a>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="mb-3">
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
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/program') }}">Program</a></li>
                        {{-- <li><a href="{{ url('/blog') }}">Blog</a></li> --}}
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
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
                                href="https://wa.me/6289647897616">+62 896 4789 7616</a></span>
                    </div>
                    <div class="contact-info">
                        <i class="bi bi-envelope-fill"></i>
                        <span><a class="text-decoration-none" style="color: rgba(255, 255, 255, 0.7);"
                                href="mailto:info@mitfara.com">info@mitfara.com</a></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Follow Us</h5>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/deutschlernen.mit.fara/" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    <p class="footer-description mt-3">
                        Ikuti media sosial kami untuk tips belajar bahasa Jerman dan update program terbaru.
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6 text-md-start text-center">
                        <span>© 2025 Deutsch Lernen mit Fara. All Rights Reserved</span>
                    </div>
                    <div class="col-md-6 text-md-end text-center mt-3 mt-md-0">
                        <a href="#" class="me-3 text-white text-decoration-none">Terms</a>
                        <a href="#" class="me-3 text-white text-decoration-none">Privacy</a>
                        <a href="#" class="text-white text-decoration-none">Legal</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 5px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            }
        });

        function switchTab(tab) {
            document.querySelectorAll('.pricing-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.pricing-grid').forEach(g => g.classList.remove('active'));

            event.target.closest('.pricing-tab').classList.add('active');
            document.getElementById(tab).classList.add('active');
        }
        function pilihPaket(namaPaket, harga) {
            const nomorWA = '6289647897616';
            const pesan = `Halo MinFara, saya tertarik untuk mendaftar *Deutsch FlexiLearn*.%0A%0A*Paket yang dipilih:* ${namaPaket} %0A*Harga:* ${harga}%0A%0AMohon informasi lebih lanjut untuk proses pendaftaran. Terima kasih!`;

            const urlWA = `https://api.whatsapp.com/send?phone=${nomorWA}&text=${pesan}`;
            window.open(urlWA, '_blank');
        }

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
    </script>
</body>

</html>
