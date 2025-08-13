<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au Pair - DlmF</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-bulet.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7C3AED;
            --secondary-color: #A855F7;
            --accent-color: #FDE047;
            --dark-blue: #1E293B;
            --light-gray: #F8FAFC;
            --text-dark: #334155;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Navigation */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-nav {
            margin-left: auto;
            margin-right: 2rem;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 1rem;
            padding: 0.5rem 0 !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-color);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 0.6rem 1.8rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(124, 58, 237, 0.8)), url('https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 10rem 0 6rem;
            margin-top: 70px;
            text-align: center;
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
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(124, 58, 237, 0.6));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Program Section */
        .program-section {
            padding: 5rem 0;
            background: white;
        }

        .program-badge {
            display: inline-block;
            background: rgba(124, 58, 237, 0.1);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .program-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 2rem;
        }

        .program-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .program-text {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .program-images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 200px 150px;
            gap: 1rem;
        }

        .program-img {
            border-radius: 15px;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .program-img:hover {
            transform: scale(1.05);
        }

        .program-img.large {
            grid-column: 1 / 3;
            grid-row: 1;
            background-image: url('https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        .program-img.small1 {
            background-image: url('https://images.unsplash.com/photo-1609220136736-443140cffec6?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        .program-img.small2 {
            background-image: url('https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        /* Mission Section */
        .mission-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .mission-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .mission-text h3 {
            font-size: 2rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 2rem;
        }

        .mission-text p {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .mission-images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 180px 120px;
            gap: 1rem;
        }

        .mission-img {
            border-radius: 15px;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .mission-img:hover {
            transform: scale(1.05);
        }

        .mission-img.large {
            grid-column: 1 / 3;
            grid-row: 1;
            background-image: url('https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        .mission-img.small1 {
            background-image: url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        .mission-img.small2 {
            background-image: url('https://images.unsplash.com/photo-1544717297-fa95b6ee9643?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        /* Stats Section */
        .stats-section {
            padding: 4rem 0;
            background: white;
        }

        .stats-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 3rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 3rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .stat-item {
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .stat-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-color);
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        /* FAQ Section */
        .faq-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .faq-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .faq-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 400px;
            background: url('https://images.unsplash.com/photo-1609220136736-443140cffec6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80') center/cover;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .faq-text h3 {
            font-size: 2rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 2rem;
        }

        .faq-item {
            background: white;
            border-radius: 10px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .faq-question {
            padding: 1.2rem;
            background: white;
            border: none;
            width: 100%;
            text-align: left;
            font-weight: 600;
            color: var(--dark-blue);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: rgba(124, 58, 237, 0.05);
        }

        .faq-question.active {
            background: rgba(124, 58, 237, 0.1);
            color: var(--primary-color);
        }

        .faq-answer {
            padding: 0 1.2rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
        }

        .faq-answer.active {
            max-height: 200px;
            padding: 0 1.2rem 1.2rem;
        }

        .faq-answer p {
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-question.active .faq-icon {
            transform: rotate(180deg);
        }

        /* CTA Section */
        .cta-section {
            padding: 5rem 0;
            background: var(--light-gray);
            color: var(--text-dark);
            text-align: center;
        }

        .cta-content h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .cta-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            background: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
        }

        .cta-button:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
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
            align-items: center;
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

        /* Responsive */
        @media (max-width: 968px) {
            .program-content,
            .mission-content,
            .faq-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .program-images,
            .mission-images {
                order: -1;
                max-width: 500px;
                margin: 0 auto;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .program-title {
                font-size: 2rem;
            }

            .program-images {
                grid-template-columns: 1fr;
                grid-template-rows: 200px 150px 150px;
            }

            .program-img.large {
                grid-column: 1;
                grid-row: 1;
            }

            .mission-images {
                grid-template-columns: 1fr;
                grid-template-rows: 180px 120px 120px;
            }

            .mission-img.large {
                grid-column: 1;
                grid-row: 1;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .navbar-nav {
                margin: 1rem 0;
            }

            .navbar-nav .nav-link {
                margin: 0.5rem 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('asset/img/logo/logo-panjang.png') }}" style="width: 180px;" alt="Logo-Mitfara-Panjang">
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
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Empowering Indonesian youth to explore Germany through the Au Pair experience</h1>
            </div>
        </div>
    </section>

    <!-- Program Overview Section -->
    <section class="program-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="program-badge">Program Dent</span>
                    <h2 class="program-title">Au Pair</h2>
                </div>
            </div>
            <div class="program-content">
                <div class="program-text">
                    <p>Program Au Pair membuka kesempatan bagi anak muda Indonesia untuk tinggal bersama keluarga angkat di Jerman selama satu tahun penuh. Selain mengenal budaya dan kehidupan baru, peserta juga akan memperdalam kemampuan Bahasa Jerman secara langsung di lingkungan penduduk asli.</p>
                </div>
                <div class="program-images">
                    <div class="program-img large"></div>
                    <div class="program-img small1"></div>
                    <div class="program-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-content">
                <div class="mission-text">
                    <h3>Our mission</h3>
                    <p>Kami percaya bahwa pengalaman hidup budaya adalah sarana yang paling baik untuk belajar secara akurat dan profesional. Melalui program Au Pair, kami memberikan peluang Indonesia memperoleh kesempatan di tingkat dunia negara untuk yang memperkenalkan kegiatan Jerman, memperluas kreatif, dan memperkuat karakter terbentuk kelas untuk internasional.</p>

                    <p>Program lokal kepala pemimpin pengalaman manajemen kelas atau juga berpenampilan dengan bantuan, mendorong lembaga baru, dan membangun jalinan internasional.</p>

                    <p>Kami mendampingi setiap peserta mulai dari proses pendaftaran, pelatihan bahasa, pengurusan visa, hingga tau di negeri hakim. Dengan pendidikan yang bermatang dan profesional, kami helir sebagai mitra pertamanan yang baik memerlukan untuk tingkat pelajaran.</p>
                </div>
                <div class="mission-images">
                    <div class="mission-img large"></div>
                    <div class="mission-img small1"></div>
                    <div class="mission-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <h3 class="stats-title">The Numbers</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">6-12</span>
                    <span class="stat-label">Bulan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Host Families Europe</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Keluarga Host</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Pendampingan Visa & Keberangkatan</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="faq-content">
                <div class="faq-image"></div>
                <div class="faq-text">
                    <h3>Freunde Bertanya, MinFara Menjawab</h3>

                    <div class="faq-item">
                        <button class="faq-question">
                            Darf Au pair als MinFara?
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Tentu saja program yang kami tawarkan dan bertugas dalam persiapan bahasa Jerman, sampai aplikasi 🙂</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            Lokasi Dent/ Au pair dimana saja, MinFara?
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Program Au Pair tersedia di berbagai kota di Jerman, termasuk Berlin, Munich, Hamburg, dan kota-kota lainnya.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            Berapa at Dent/ ombre plus offline ya, MinFara?
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Program Au Pair memiliki durasi 6-12 bulan dengan berbagai pilihan paket sesuai kebutuhan Anda.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            Butuh request tutor rupiah yah, MinFara?
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Kami menyediakan layanan konsultasi dan pendampingan lengkap untuk program Au Pair dengan berbagai pilihan pembayaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Mulai Belajar Bahasa Jerman?</h3>
                <p>Wujudkan mimpi dan ratusan pengalaman dengan belajar yang memingat, efektif dari smartphone. Bergabunglah sekarang berikan-berikan kelas dan kelas!</p>
                <button class="cta-button">WhatsApp MinFara</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/img/logo/logo-bulet.png') }}" style="width: 180px;"
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Count-up animation for statistics
        function countUp(element, target, duration = 2000) {
            const start = 0;
            let current = start;
            const increment = target / (duration / 16);

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }

                // Format numbers based on content
                const text = element.textContent;
                if (text.includes('-')) {
                    element.textContent = text; // Keep range format
                } else if (text.includes('+')) {
                    element.textContent = Math.floor(current) + '+';
                } else if (text.includes('%')) {
                    element.textContent = Math.floor(current) + '%';
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;

                    if (element.classList.contains('stat-item')) {
                        element.classList.add('animate');

                        const numberElement = element.querySelector('.stat-number');
                        const originalText = numberElement.textContent;

                        setTimeout(() => {
                            if (originalText === '6-12') {
                                // Keep range format
                                return;
                            } else if (originalText === '500+') {
                                countUp(numberElement, 500);
                            } else if (originalText === '150+') {
                                countUp(numberElement, 150);
                            } else if (originalText === '100%') {
                                countUp(numberElement, 100);
                            }
                        }, 500);
                    }

                    observer.unobserve(element);
                }
            });
        }, observerOptions);

        // FAQ functionality
        document.addEventListener('DOMContentLoaded', () => {
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const faqItem = question.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const isActive = question.classList.contains('active');

                    // Close all other FAQ items
                    faqQuestions.forEach(q => {
                        q.classList.remove('active');
                        q.parentElement.querySelector('.faq-answer').classList.remove('active');
                    });

                    // Toggle current FAQ item
                    if (!isActive) {
                        question.classList.add('active');
                        answer.classList.add('active');
                    }
                });
            });

            // Observe stat items
            document.querySelectorAll('.stat-item').forEach(item => {
                observer.observe(item);
            });

            // Smooth scrolling for navigation links
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });

            // Add hover effects to images
            const images = document.querySelectorAll('.program-img, .mission-img');
            images.forEach(img => {
                img.addEventListener('mouseenter', () => {
                    img.style.transform = 'scale(1.05)';
                    img.style.boxShadow = '0 15px 40px rgba(0, 0, 0, 0.2)';
                });

                img.addEventListener('mouseleave', () => {
                    img.style.transform = 'scale(1)';
                    img.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.1)';
                });
            });

            // Add scroll effect to navbar
            window.addEventListener('scroll', () => {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.backdropFilter = 'blur(10px)';
                } else {
                    navbar.style.background = 'white';
                    navbar.style.backdropFilter = 'none';
                }
            });
        });
    </script>
</body>

</html>
