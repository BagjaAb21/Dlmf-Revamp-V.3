<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au Pair - DlmF</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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

        /* Header & Navigation - Perbaikan */
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
            /* Pastikan tinggi navbar otomatis */
            min-height: 70px;
            /* Tinggi minimum navbar */
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

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(124, 58, 237, 0.8)), url('{{ asset('asset/img/AuPair/3ed4771b-3151-4dc4-a91e-afe3f8dcf317.jpeg') }}');
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
            background-image: url('{{ asset('asset/img/AuPair/3ed4771b-3151-4dc4-a91e-afe3f8dcf317.jpeg') }}');
        }

        .program-img.small1 {
            background-image: url('{{ asset('asset/img/AuPair/IMG_9189.JPG') }}');
        }

        .program-img.small2 {
            background-image: url('{{ asset('asset/img/AuPair/IMG_9211.JPG') }}');
        }

        /* Assistance Program Section */
        .assistance-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .assistance-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .assistance-text h3 {
            font-size: 2rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 2rem;
        }

        .assistance-text p {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .assistance-images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 180px 120px;
            gap: 1rem;
        }

        .assistance-img {
            border-radius: 15px;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .assistance-img:hover {
            transform: scale(1.05);
        }

        .assistance-img.large {
            grid-column: 1 / 3;
            grid-row: 1;
            background-image: url('{{ asset('asset/img/AuPair/pexels-pixabay-160994.jpg') }}');
        }

        .assistance-img.small1 {
            background-image: url('{{ asset('asset/img/AuPair/pexels-emma-bauso-1183828-2253879.jpg') }}');
        }

        .assistance-img.small2 {
            background-image: url('{{ asset('asset/img/AuPair/pexels-pixabay-86456.jpg') }}');
        }

        /* Pricing Section */
        .pricing-section {
            padding: 5rem 0;
            background: white;
        }

        .pricing-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .pricing-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 4rem;
            opacity: 0.8;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .pricing-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-color);
        }

        .pricing-card.featured {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.02), rgba(168, 85, 247, 0.02));
        }

        .pricing-card.featured:hover {
            border-color: var(--secondary-color);
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .pricing-type {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 0.5rem;
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .pricing-description {
            color: var(--text-dark);
            opacity: 0.8;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .pricing-features li {
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .feature-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 100%;
            gap: 1rem;
        }

        .feature-name {
            flex: 1;
            line-height: 1.4;
        }

        .pricing-features .price {
            font-weight: 600;
            color: var(--primary-color);
            white-space: nowrap;
            flex-shrink: 0;
        }

        .feature-icon {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .pricing-button {
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .pricing-button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
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

        /* Responsive */
        @media (max-width: 968px) {

            .program-content,
            .assistance-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .program-images,
            .assistance-images {
                order: -1;
                max-width: 500px;
                margin: 0 auto;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
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

            .assistance-images {
                grid-template-columns: 1fr;
                grid-template-rows: 180px 120px 120px;
            }

            .assistance-img.large {
                grid-column: 1;
                grid-row: 1;
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
                            <li><a class="dropdown-item" href="{{ url('/product') }}">Produk</a></li>
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> --}}
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
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Program Pendampingan Persiapan Au Pair</h1>
                <p>Dengan dukungan mentor berpengalaman, program ini memastikan setiap peserta siap menjalani proses keberangkatan dengan percaya diri dan profesional.</p>
            </div>
        </div>
    </section>

    <!-- Program Overview Section -->
    <section class="program-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="program-badge">Program Au Pair</span>
                    <h2 class="program-title">Apa itu Au Pair?</h2>
                </div>
            </div>
            <div class="program-content">
                <div class="program-text">
                    <p><strong>Au Pair</strong> adalah sebuah program internasional di mana anak muda (usia 18–27 tahun)
                        tinggal bersama keluarga angkat (<em>Gastfamilie</em>) di Jerman untuk membantu mengurus anak
                        dan pekerjaan ringan rumah tangga. Sebagai gantinya, peserta mendapatkan fasilitas seperti
                        tempat tinggal, uang saku bulanan, serta kesempatan mendalami budaya dan bahasa Jerman secara
                        langsung.</p>

                    <p>Program ini sangat populer bagi mereka yang ingin mendapatkan pengalaman budaya, sekaligus
                        menjadi pintu awal sebelum melanjutkan studi atau karier di Jerman.</p>
                </div>
                <div class="program-images">
                    <div class="program-img large"></div>
                    <div class="program-img small1"></div>
                    <div class="program-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Assistance Program Section -->
    <section class="assistance-section">
        <div class="container">
            <div class="assistance-content">
                <div class="assistance-text">
                    <h3>Program Pendampingan Persiapan Au Pair</h3>
                    <p>Mengikuti program Au Pair bukan hanya soal mencari keluarga angkat, tetapi juga membutuhkan
                        persiapan matang. Mulai dari dokumen, bahasa, hingga wawancara. Karena itu, Deutsch Lernen mit
                        Fara menghadirkan <strong>program pendampingan persiapan Au Pair ke Jerman</strong>.</p>

                    <p>Melalui program ini, kamu akan dibantu mulai dari <strong>pencarian keluarga angkat
                            (Gastfamilie)</strong>, pembuatan dokumen seperti <strong>motivation letter</strong>, hingga
                        <strong>latihan wawancara</strong> dengan keluarga maupun pihak kedutaan Jerman.
                    </p>

                    <p>Tujuannya agar prosesmu lebih terarah, lancar, dan peluang keberhasilan lebih besar.</p>
                </div>
                <div class="assistance-images">
                    <div class="assistance-img large"></div>
                    <div class="assistance-img small1"></div>
                    <div class="assistance-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <h3 class="pricing-title">Pricelist Program Pendampingan Persiapan Au Pair</h3>
            <p class="pricing-subtitle">Pilih paket yang sesuai dengan kebutuhan kamu</p>

            <div class="pricing-grid">
                <!-- Ala Carte Package -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Ala Carte</h4>
                        <p class="pricing-description">Pilih sesuai kebutuhan</p>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <div class="feature-content">
                                <span class="feature-name">Pencarian Gastfamilie</span>
                                <span class="price">Rp 6.000.000</span>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <div class="feature-content">
                                <span class="feature-name">Konsultasi dengan Alumni Au Pair Kami</span>
                                <span class="price">Rp 600.000/sesi</span>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <div class="feature-content">
                                <span class="feature-name">Pembuatan Motivation Letter</span>
                                <span class="price">Rp 1.250.000</span>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <div class="feature-content">
                                <span class="feature-name">Penerjemahan Motivation Letter</span>
                                <span class="price">Rp 750.000</span>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <div class="feature-content">
                                <span class="feature-name">Pembuatan Termin di Kedutaan Jerman</span>
                                <span class="price">Rp 1.250.000</span>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <div class="feature-content">
                                <span class="feature-name">Latihan Wawancara (dengan GF & Kedutaan)</span>
                                <span class="price">Rp 1.250.000</span>
                            </div>
                        </li>
                    </ul>

                    <button class="pricing-button">Konsultasi Sekarang</button>
                </div>

                <!-- All-in Package -->
                <div class="pricing-card featured">
                    <div class="pricing-header">
                        <h4 class="pricing-type">All-in Package</h4>
                        <div class="pricing-price">Rp 10.000.000</div>
                        <p class="pricing-description">Dapatkan semua layanan dengan harga spesial</p>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <span>Pencarian Gastfamilie</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <span>Konsultasi dengan Alumni Au Pair Kami</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <span>Pembuatan Motivation Letter</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <span>Penerjemahan Motivation Letter</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <span>Pembuatan Termin di Kedutaan Jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle feature-icon"></i>
                            <span>Latihan Wawancara (dengan GF & Kedutaan)</span>
                        </li>
                    </ul>

                    <button class="pricing-button">Pilih All-in Package</button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h3>Siap Menjadi Au Pair?</h3>
                <p>Dengan pendampingan yang tepat, perjalananmu menuju Jerman bukan lagi sekadar impian. Bersama kami, setiap langkah jadi lebih mudah, terarah, dan pasti.</p>
                <button class="cta-button"><a class="text-white text-decoration-none"
                        href="https://wa.me/6289647897616?text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+program+Au+Pair+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+pendampingan+yang+ditawarkan."
                        target="_blank"><i class="bi bi-whatsapp me-2"></i>WhatsApp MinFara</a></button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/img/logo/logo-Transparant3.png') }}" style="width: 180px;"
                            alt="Logo Deutsch Lernen mit Fara - Kursus Bahasa Jerman Terpercaya" loading="lazy"
                            title="DlmF - Deutsch Lernen mit Fara">
                    </div>
                    <h2 class="footer-brand"><strong>Deutsch Lernen Mit Fara</strong></h2>
                    <p class="footer-description">
                        Platform pembelajaran bahasa Jerman terpercaya dengan metode pembelajaran yang efektif dan
                        menyenangkan. Tersedia kursus online dan offline dari level A1 hingga B2 dengan tutor
                        bersertifikasi.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h3 class="footer-title">Quick Link</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/program') }}">Program Kursus</a></li>
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h3 class="footer-title">Hubungi Kami</h3>
                    <address class="footer-contact">
                        <div class="contact-info">
                            <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                            <span>Jalan Terusan Sari Asih No. 76, Sarijadi, Sukasari, Bandung, Jawa Barat</span>
                        </div>
                        <div class="contact-info">
                            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                            <span>
                                <a class="text-decoration-none" style="color: rgba(255, 255, 255, 0.7);"
                                    href="https://wa.me/6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0"
                                    aria-label="Telepon ke nomor DlmF +62 896 4789 7616">
                                    +62 896 4789 7616
                                </a>
                            </span>
                        </div>
                        <div class="contact-info">
                            <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                            <span>
                                <a class="text-decoration-none" style="color: rgba(255, 255, 255, 0.7);"
                                    href="mailto:info@mitfara.com" aria-label="Email ke info@mitfara.com">
                                    info@mitfara.com
                                </a>
                            </span>
                        </div>
                    </address>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h3 class="footer-title">Ikuti Kami</h3>
                    <div class="d-flex gap-3 social-links mb-1" role="navigation" aria-label="Social media links">
                        <a href="https://www.tiktok.com/@deutschlernen.mit.fara?_t=zs-90kuixyjueq&_r=1" target="_blank" rel="noopener noreferrer" class="text-white" aria-label="TikTok Deutsch Lernen mit Fara">
                            <i class="bi bi-tiktok" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/deutschlernen.mit.fara?igsh=bWxhaHA3em5wN200" target="_blank"
                            rel="noopener noreferrer" class="text-white" aria-label="Instagram Deutsch Lernen mit Fara">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://youtube.com/@deutschlernenmitfara?si=otDhT7t6g76yT57E" target="_blank"
                            rel="noopener noreferrer" class="text-white" aria-label="YouTube Deutsch Lernen mit Fara">
                            <i class="bi bi-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="https://wa.me/62859106869302" target="_blank" rel="noopener noreferrer"
                            class="text-white" aria-label="WhatsApp Deutsch Lernen mit Fara">
                            <i class="bi bi-whatsapp" aria-hidden="true"></i>
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
        // Smooth scrolling for navigation links
        document.addEventListener('DOMContentLoaded', () => {
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
            const images = document.querySelectorAll('.program-img, .assistance-img');
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

            // Pricing card hover effects
            const pricingCards = document.querySelectorAll('.pricing-card');
            pricingCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-10px)';
                    card.style.boxShadow = '0 25px 60px rgba(0, 0, 0, 0.15)';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                    card.style.boxShadow = '0 15px 40px rgba(0, 0, 0, 0.1)';
                });
            });

            // Button click handlers
            const pricingButtons = document.querySelectorAll('.pricing-button');
            pricingButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const whatsappUrl = "https://wa.me/6289647897616?text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+program+Au+Pair+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+pendampingan+yang+ditawarkan.";
                    window.open(whatsappUrl, '_blank');
                });
            });
        });
    </script>
</body>

</html>
