<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Kelas Private Persiapan Ujian - DlmF</title>
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

        /* Navigation */
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
            margin: 0 0.5rem;
            padding: 0.5rem 0.75rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
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
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
            background: radial-gradient(circle, rgba(124, 58, 237, 0.3) 0%, transparent 70%);
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

        .program-text p {
            margin-bottom: 1.5rem;
        }

        .highlight-box {
            background: rgba(124, 58, 237, 0.05);
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        .highlight-box strong {
            color: var(--primary-color);
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
            background-image: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        .program-img.small1 {
            background-image: url('https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        .program-img.small2 {
            background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        /* Module Section */
        .module-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .module-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .module-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary-color);
        }

        .module-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .module-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .module-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .module-description {
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Details Section */
        .details-section {
            padding: 5rem 0;
            background: white;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .detail-card {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.04), rgba(168, 85, 247, 0.04));
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .detail-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(124, 58, 237, 0.15);
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.08), rgba(168, 85, 247, 0.08));
        }

        .detail-icon {
            font-size: 3.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            display: inline-block;
            transition: transform 0.4s ease;
        }

        .detail-card:hover .detail-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .detail-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .detail-text {
            color: var(--text-dark);
            line-height: 1.7;
        }

        /* Pricing Section */
        .pricing-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            position: relative;
            overflow: hidden;
        }

        .pricing-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .pricing-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .pricing-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 4rem;
            opacity: 0.8;
            position: relative;
            z-index: 1;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .pricing-card {
            background: white;
            border-radius: 25px;
            padding: 3rem 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .pricing-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .pricing-card:hover::before {
            transform: scaleX(1);
        }

        .pricing-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 80px rgba(124, 58, 237, 0.2);
            border-color: var(--primary-color);
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid rgba(124, 58, 237, 0.1);
        }

        .pricing-type {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .pricing-per {
            font-size: 1rem;
            color: var(--text-dark);
            opacity: 0.7;
            font-weight: 500;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 0.5rem;
        }

        .pricing-features li {
            padding: 1rem 0;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .pricing-features li:hover {
            transform: translateX(5px);
            color: var(--primary-color);
        }

        .pricing-features i {
            color: var(--primary-color);
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .pricing-button {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 1.3rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .pricing-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .pricing-button:hover::before {
            left: 100%;
        }

        .pricing-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.4);
        }

        /* Benefits Section */
        .benefits-section {
            padding: 5rem 0;
            background: white;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .benefit-card {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.04), rgba(168, 85, 247, 0.04));
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .benefit-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(124, 58, 237, 0.15);
            border-color: var(--primary-color);
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.08), rgba(168, 85, 247, 0.08));
        }

        .benefit-icon {
            font-size: 3.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            display: inline-block;
            transition: transform 0.4s ease;
        }

        .benefit-card:hover .benefit-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .benefit-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .benefit-text {
            color: var(--text-dark);
            line-height: 1.7;
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

        /* Responsive */
        @media (max-width: 968px) {
            .program-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .program-images {
                order: -1;
                max-width: 500px;
                margin: 0 auto;
            }

            .module-cards,
            .benefits-grid,
            .details-grid {
                grid-template-columns: 1fr;
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

            .program-title,
            .pricing-title,
            .cta-title {
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

            .navbar-nav {
                margin: 1rem 0;
            }

            .navbar-nav .nav-link {
                margin: 0.5rem 0;
            }
        }

        @media (max-width: 576px) {
            .social-links {
                justify-content: center;
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
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </li> --}}
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
                <h1>Kelas Private Persiapan Ujian</h1>
                <p>Program intensif untuk mempersiapkan ujian sertifikasi bahasa Jerman dengan fokus pada kebutuhan
                    spesifik Anda. Tingkatkan kepercayaan diri dan kuasai strategi ujian yang efektif!</p>
            </div>
        </div>
    </section>

    <!-- Program Overview Section -->
    <section class="program-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="program-badge">Program Persiapan Ujian</span>
                    <h2 class="program-title">Tentang Kelas Private Persiapan Ujian</h2>
                </div>
            </div>
            <div class="program-content">
                <div class="program-text">
                    <p><strong>Kelas Private Persiapan Ujian</strong> dirancang khusus untuk membantu anda menghadapi
                        ujian bahasa Jerman dengan lebih percaya diri. Program ini fleksibel dan berfokus pada kebutuhan
                        peserta, sehingga anda bisa memilih modul mana yang ingin diperdalam.</p>

                    <div class="highlight-box">
                        <p><strong>Keunggulan:</strong> anda bisa mengambil satu atau beberapa modul sekaligus,
                            tergantung bagian mana yang ingin lebih anda kuasai. Pembelajaran disesuaikan langsung
                            dengan fokus latihan peserta.</p>
                    </div>

                    <p>Untuk hasil yang optimal, kami menyarankan mengikuti <strong>5 hingga 20 kali pertemuan</strong>.
                        Setiap sesi berdurasi maksimal <strong>90 menit per hari</strong>, sehingga tetap intensif tapi
                        efektif untuk dipahami.</p>

                    <p>Dengan pendekatan private yang personal, kelas ini membantu anda memperkuat keterampilan
                        spesifik, melatih strategi ujian, dan meningkatkan kepercayaan diri menjelang ujian sertifikasi
                        bahasa Jerman.</p>
                </div>
                <div class="program-images">
                    <div class="program-img large"></div>
                    <div class="program-img small1"></div>
                    <div class="program-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Module Section -->
    <section class="module-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">4 Modul Pilihan</span>
                <h2 class="program-title">Pilih Modul Sesuai Kebutuhan</h2>
                <p class="pricing-subtitle">Fokus pada keterampilan yang ingin anda tingkatkan untuk ujian</p>
            </div>

            <div class="module-cards">
                <div class="module-card">
                    <div class="module-icon">
                        <i class="bi bi-headphones"></i>
                    </div>
                    <h4 class="module-title">Hören (Listening)</h4>
                    <p class="module-description">
                        Latihan mendengarkan intensif untuk memahami berbagai aksen dan kecepatan berbicara dalam bahasa
                        Jerman. Tingkatkan kemampuan listening dengan berbagai topik dan konteks ujian.
                    </p>
                </div>

                <div class="module-card">
                    <div class="module-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <h4 class="module-title">Lesen (Reading)</h4>
                    <p class="module-description">
                        Latihan membaca dengan berbagai jenis teks ujian. Pahami strategi membaca cepat, identifikasi
                        informasi penting, dan kuasai teknik menjawab pertanyaan reading comprehension.
                    </p>
                </div>
                <div class="module-card">
                    <div class="module-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h4 class="module-title">Schreiben (Writing)</h4>
                    <p class="module-description">
                        Latihan menulis intensif dengan berbagai format yang keluar di ujian. Pelajari struktur
                        penulisan yang benar, kosakata yang tepat, dan teknik menulis efektif dalam waktu terbatas.
                    </p>
                </div>

                <div class="module-card">
                    <div class="module-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h4 class="module-title">Sprechen (Speaking)</h4>
                    <p class="module-description">
                        Latihan berbicara untuk menghadapi ujian oral. Tingkatkan kemampuan presentasi, diskusi, dan
                        respons spontan dengan feedback langsung dari tutor berpengalaman.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Details Section -->
    <section class="details-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Detail Program</span>
                <h2 class="program-title">Informasi Penting</h2>
                <p class="pricing-subtitle">Yang perlu anda ketahui tentang program ini</p>
            </div>

            <div class="details-grid">
                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="bi bi-calendar-range"></i>
                    </div>
                    <h4 class="detail-title">Jumlah Pertemuan</h4>
                    <p class="detail-text">Disarankan 5-20 kali pertemuan untuk hasil optimal, disesuaikan dengan target
                        dan kebutuhan persiapan ujianmu</p>
                </div>

                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4 class="detail-title">Durasi Sesi</h4>
                    <p class="detail-text">Maksimal 90 menit per hari untuk pembelajaran yang intensif namun tetap
                        efektif dan mudah dipahami</p>
                </div>

                <div class="detail-card">
                    <div class="detail-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h4 class="detail-title">Materi Pembelajaran</h4>
                    <p class="detail-text">Tidak ada modul cetak/digital, materi disesuaikan langsung dengan fokus
                        latihan dan kebutuhan ujian peserta</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <h3 class="pricing-title">Biaya Investasi</h3>
            <p class="pricing-subtitle">Sistem pembayaran per meeting dengan fleksibilitas penuh</p>

            <div class="pricing-grid">
                <!-- Online Private -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Online Private Class</h4>
                        <div class="pricing-price">Rp 195.000</div>
                        <div class="pricing-per">per meeting</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pembelajaran online 1-on-1</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pilih 1 atau lebih modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Durasi maksimal 90 menit/sesi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Fokus latihan soal ujian</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Strategi menjawab efektif</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Feedback langsung dari tutor</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Rekaman video pembelajaran</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Fleksibel dari mana saja</span>
                        </li>
                    </ul>

                    <button class="pricing-button">Daftar Sekarang</button>
                </div>
                <!-- Offline Private -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Offline Private Class</h4>
                        <div class="pricing-price">Rp 280.000</div>
                        <div class="pricing-per">per meeting</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pembelajaran tatap muka 1-on-1</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pilih 1 atau lebih modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Durasi maksimal 90 menit/sesi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Fokus latihan soal ujian</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Strategi menjawab efektif</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Feedback langsung dari tutor</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Simulasi ujian</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Evaluasi progress berkala</span>
                        </li>
                    </ul>

                    <button class="pricing-button">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Benefit</span>
                <h2 class="program-title">Mengapa Memilih Kelas Private Persiapan Ujian?</h2>
                <p class="pricing-subtitle">Pendekatan belajar yang terarah dan disesuaikan dengan standar ujian Goethe untuk hasil maksimal.</p>
            </div>

            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h4 class="benefit-title">Fokus Spesifik</h4>
                    <p class="benefit-text">Pilih modul sesuai kebutuhan ujianmu. Belajar hanya pada skill yang benar-benar perlu kamu kuasai.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <h4 class="benefit-title">Pembelajaran Personal</h4>
                    <p class="benefit-text">Sesi 1-on-1 bersama tutor berpengalaman yang memantau progres dan membantu mengatasi kesulitan belajar secara langsung.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h4 class="benefit-title">Materi Fleksibel</h4>
                    <p class="benefit-text">Materi disesuaikan dengan tipe soal ujian yang akan kamu hadapi. Tanpa modul baku, hanya latihan yang relevan dan terarah.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <h4 class="benefit-title">Strategi Ujian</h4>
                    <p class="benefit-text">Pelajari teknik menjawab soal dengan efektif, mengatur waktu, dan menghadapi berbagai format ujian dengan percaya diri.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h4 class="benefit-title">Progress Terukur</h4>
                    <p class="benefit-text">Dapatkan evaluasi berkala dan simulasi ujian untuk memantau perkembangan serta kesiapan menghadapi ujian sebenarnya.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="benefit-title">Tingkat Kepercayaan Diri</h4>
                    <p class="benefit-text">Latihan intensif dan bimbingan personal membantu kamu menghadapi ujian dengan tenang dan yakin pada kemampuanmu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Siap Menghadapi Ujian Goethe?</h2>
            <p class="mb-4">Konsultasikan kebutuhanmu bersama tim kami.</p>
            <a href="https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+Kelas+Private+Persiapan+Ujian+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0"
                class="btn-cta"><i class="bi bi-whatsapp me-2"></i>WhatsApp MinFara</a>
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
                                href="https://wa.me/6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0">+62
                                896 4789 7616</a>
                        </span>
                    </div>
                    <div class="contact-info">
                        <i class="bi bi-envelope-fill"></i>
                        <span><a class="text-decoration-none" style="color: rgba(255, 255, 255, 0.7);"
                                href="{{ url('mailto:info@mitfara.com') }}">info@mitfara.com</a>
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">Follow Us</h5>
                    <div class="social-links mb-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i>
                        </a>
                        <a href="{{ url('https://www.instagram.com/deutschlernen.mit.fara/') }}" target="_blank"
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
                    <div class="col-md-6 text-md-start text-center mb-2 mb-md-0">
                        <span>© 2025 Deutsch Lernen mit Fara. All Rights Reserved</span>
                    </div>
                    <div class="col-md-6 text-md-end text-center">
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

            // Image hover effects
            const images = document.querySelectorAll('.program-img');
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

            // Button click handlers for pricing cards
            const pricingButtons = document.querySelectorAll('.pricing-button');
            pricingButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const whatsappUrl = "https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+Kelas+Private+Persiapan+Ujian+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0";
                    window.open(whatsappUrl, '_blank');
                });
            });

            // Add animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe cards for animation
            const cards = document.querySelectorAll('.module-card, .benefit-card, .pricing-card, .detail-card');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</body>

</html>
