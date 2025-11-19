<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netzwerk Neu - DlmF</title>
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

        /* Navbar */
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

        /* Hero */
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(15, 23, 42, 0.95)),
                url('https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=1471&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 85vh;
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
            animation: pulse 4s ease-in-out infinite;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -250px;
            left: -100px;
            animation: pulse 5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .hero-badge {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.3), rgba(168, 85, 247, 0.3));
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-title {
            font-size: 3.8rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 30px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
            line-height: 1.8;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Introduction Section */
        .intro-section {
            padding: 100px 0;
            background: white;
        }

        .intro-content {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .section-badge {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(168, 85, 247, 0.1));
            color: var(--primary-color);
            padding: 10px 25px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .section-description {
            font-size: 1.15rem;
            color: #6B7280;
            line-height: 1.9;
            margin-bottom: 20px;
        }

        /* Package Section - Split Design */
        .package-section {
            padding: 100px 0;
            background: linear-gradient(to bottom, #F8F9FA 0%, #FFFFFF 100%);
        }

        .package-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .package-split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        .package-box {
            background: white;
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            transition: all 0.4s;
        }

        .package-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .package-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(124, 58, 237, 0.15);
        }

        .package-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .package-box h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 20px;
        }

        .package-box p {
            color: #6B7280;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .package-box ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .package-box ul li {
            padding: 10px 0;
            padding-left: 30px;
            position: relative;
            color: #6B7280;
        }

        .package-box ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.2rem;
        }

        /* Features Grid */
        .features-section {
            padding: 100px 0;
            background: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            margin-top: 60px;
        }

        .feature-block {
            position: relative;
            padding-left: 100px;
        }

        .feature-icon-wrapper {
            position: absolute;
            left: 0;
            top: 0;
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
        }

        .feature-icon-wrapper i {
            font-size: 2rem;
            color: white;
        }

        .feature-block h4 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 15px;
        }

        .feature-block p {
            color: #6B7280;
            line-height: 1.8;
        }

        /* Levels Section - Horizontal Cards */
        .levels-section {
            padding: 100px 0;
            background: linear-gradient(135deg, white);
            position: relative;
            overflow: hidden;
        }

        .levels-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -150px;
        }

        .levels-header {
            text-align: center;
            color: var(--dark-blue);
            margin-bottom: 60px;
            position: relative;
            z-index: 1;
        }

        .levels-header h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .levels-header p {
            font-size: 1.15rem;
            color: var(--text-dark);
        }

        .levels-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            position: relative;
            z-index: 1;
        }

        .level-item {
            background: white;
            border-radius: 25px;
            padding: 45px 35px;
            text-align: center;
            transition: all 0.4s;
            cursor: pointer;
        }

        .level-item:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
        }

        .level-badge {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            display: block;
        }

        .level-item h4 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 15px;
        }

        .level-item p {
            color: #6B7280;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* CTA */
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

        .btn-cta-shopee {
            background: linear-gradient(135deg, #EE4D2D, #FF6340);
            color: white;
        }

        .btn-cta-shopee:hover {
            background: linear-gradient(135deg, #D43D1D, #EE5330);
            color: white;
        }

        .d-flex.gap-3 {
            gap: 1rem !important;
        }

        /* Footer */
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

        /* Responsive */
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.8rem;
            }

            .section-title {
                font-size: 2.3rem;
            }

            .package-split,
            .features-grid,
            .levels-container {
                grid-template-columns: 1fr;
            }

            .feature-block {
                padding-left: 90px;
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
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2.2rem;
            }

            .package-box,
            .feature-block {
                padding: 30px 25px;
            }

            .feature-block {
                padding-left: 0;
                padding-top: 90px;
            }

            .feature-icon-wrapper {
                left: 50%;
                transform: translateX(-50%);
            }

            .feature-block h4,
            .feature-block p {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
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
                            <!-- <li><a class="dropdown-item" href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">Buku Ajar Internasional</div>
                <h1 class="hero-title">Netzwerk Neu</h1>
                <p class="hero-subtitle">Buku ajar bahasa Jerman standar internasional yang mengantarkan kamu dari
                    pemula hingga mahir dengan metode pembelajaran modern dan interaktif</p>
            </div>
        </div>
    </section>

    <!-- Introduction -->
    <section class="intro-section">
        <div class="container">
            <div class="intro-content">
                <div class="section-badge">Tentang Netzwerk Neu</div>
                <h2 class="section-title">Buku Ajar Terbaik untuk Belajar <br> Bahasa Jerman</h2>
                <p class="section-description">
                    Netzwerk neu adalah edisi terbaru dari buku ajar tingkat dasar yang sukses digunakan secara
                    internasional. Buku ini mengantarkan pelajar remaja maupun dewasa secara tepat menuju level A1, A2,
                    dan B1, serta mempersiapkan mereka untuk menghadapi seluruh ujian yang relevan.
                </p>
                <p class="section-description">
                    Dengan pendekatan yang dekat dengan dunia nyata para pembelajar, Netzwerk neu menghadirkan
                    pengalaman belajar modern yang interaktif, dilengkapi dengan berbagai materi digital untuk mendukung
                    proses belajar-mengajar yang lebih efektif.
                </p>
            </div>
        </div>
    </section>

    <!-- Package Section -->
    <section class="package-section">
        <div class="container">
            <div class="package-header">
                <div class="section-badge">Isi Paket Lengkap</div>
                <h2 class="section-title">Yang Kamu Dapatkan</h2>
            </div>

            <div class="package-split">
                <div class="package-box">
                    <div class="package-number">1</div>
                    <h3>Kursbuch (Buku Kursus)</h3>
                    <p>Berisi materi utama, dialog, kosakata, tata bahasa, serta latihan komunikasi sehari-hari yang
                        dirancang untuk membangun kemampuan bahasa Jerman kamu secara komprehensif dan terstruktur.</p>
                    <ul>
                        <li>Materi pembelajaran sistematis dan mudah dipahami</li>
                        <li>Dialog autentik dari kehidupan nyata di Jerman</li>
                        <li>Kosakata praktis untuk komunikasi sehari-hari</li>
                        <li>Penjelasan tata bahasa yang jelas dan aplikatif</li>
                    </ul>
                </div>

                <div class="package-box">
                    <div class="package-number">2</div>
                    <h3>Übungsbuch (Buku Latihan)</h3>
                    <p>Dilengkapi dengan berbagai latihan tambahan untuk memperdalam pemahaman, termasuk listening,
                        reading, writing, dan speaking. Setiap latihan dirancang untuk memperkuat materi yang telah
                        dipelajari di Kursbuch.</p>
                    <ul>
                        <li>Latihan listening dengan audio autentik</li>
                        <li>Soal reading comprehension yang beragam</li>
                        <li>Latihan writing untuk meningkatkan kemampuan menulis</li>
                        <li>Speaking exercises untuk melatih pronunciation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-badge">Kelebihan Netzwerk Neu</div>
                <h2 class="section-title">Mengapa Memilih Netzwerk Neu?</h2>
            </div>

            <div class="features-grid">
                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <h4>Standar Goethe-Institut & GER (CEFR)</h4>
                    <p>Netzwerk neu mengikuti standar Gemeinsamer Europäischer Referenzrahmen (GER) atau Common European
                        Framework of Reference (CEFR) yang diakui secara internasional. Sertifikat kamu akan diakui di
                        seluruh Eropa dan dunia.</p>
                </div>

                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-headphones"></i>
                    </div>
                    <h4>Audio & Video Autentik Online</h4>
                    <p>Dilengkapi dengan materi audio dan video autentik yang bisa diakses online kapan saja. Materi
                        multimedia ini membantu meningkatkan kemampuan listening dan memberikan exposure terhadap bahasa
                        Jerman yang natural.</p>
                </div>

                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4>Pendekatan Interaktif & Komunikatif</h4>
                    <p>Metode pembelajaran yang interaktif dan komunikatif membuat proses belajar lebih menyenangkan dan
                        efektif. Kamu akan lebih banyak berlatih berbicara, menulis, dan berinteraksi dalam bahasa
                        Jerman sejak awal.</p>
                </div>

                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <h4>Materi Relevan dengan Kehidupan Sehari-hari</h4>
                    <p>Semua materi dirancang relevan dengan kehidupan sehari-hari dan budaya Jerman. Kamu akan belajar
                        bahasa Jerman yang benar-benar digunakan dalam situasi nyata, sehingga lebih mudah
                        diaplikasikan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Levels Section -->
    <section class="levels-section">
        <div class="container">
            <div class="levels-header">
                <h2>Level yang Tersedia</h2>
                <p>Mulai dari level dasar hingga lanjutan, sesuaikan dengan kebutuhan belajarmu.</p>
            </div>

            <div class="levels-container">
                <div class="level-item">
                    <span class="level-badge">A1</span>
                    <h4>Tingkat Pemula</h4>
                    <p>Level dasar untuk pemula yang baru memulai belajar bahasa Jerman. Cocok untuk yang belum pernah
                        belajar sama sekali.</p>
                </div>

                <div class="level-item">
                    <span class="level-badge">A2</span>
                    <h4>Tingkat Dasar</h4>
                    <p>Level lanjutan pemula dengan vocabulary dan grammar yang lebih kompleks untuk percakapan
                        sehari-hari.</p>
                </div>

                <div class="level-item">
                    <span class="level-badge">B1</span>
                    <h4>Tingkat Menengah</h4>
                    <p>Level menengah yang mempersiapkan kamu untuk komunikasi mandiri dan ujian sertifikasi
                        internasional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Dapatkan Netzwerk Neu Sekarang!</h2>
            <p class="mb-4">Langkah pertama menuju penguasaan bahasa Jerman yang efektif dan terarah.</p>

            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="https://vt.tokopedia.com/t/ZSH7hyT5qooLn-CksX4/" target="_blank" class="btn-cta">
                    <i class="bi bi-tiktok me-2"></i>TikTok Shop
                </a>
                <a href="https://id.shp.ee/ZufqCVd" target="_blank" class="btn-cta">
                    <i class="bi bi-cart-fill me-2"></i>Shopee
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
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
        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 5px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            }
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Animate sections on scroll
        document.querySelectorAll('.package-box, .feature-block, .level-item').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'all 0.6s ease';
            observer.observe(element);
        });
    </script>
</body>

</html>
