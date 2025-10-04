<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprachkurs mit Muttersprachler - DlmF</title>
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

        .hero-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.9)), url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
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
            background-image: url('https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        .program-img.small1 {
            background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        .program-img.small2 {
            background-image: url('https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        .features-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary-color);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .feature-description {
            color: var(--text-dark);
            line-height: 1.6;
        }

        .benefits-section {
            padding: 5rem 0;
            background: white;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .benefit-item {
            display: flex;
            align-items: start;
            gap: 1.5rem;
            padding: 1.5rem;
            background: rgba(124, 58, 237, 0.03);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            background: rgba(124, 58, 237, 0.08);
            transform: translateX(10px);
        }

        .benefit-icon {
            font-size: 2rem;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .benefit-content h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 0.5rem;
        }

        .benefit-content p {
            color: var(--text-dark);
            margin: 0;
            line-height: 1.6;
        }

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
            gap: 2.5rem;
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
            margin-bottom: 1.5rem;
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

        .pricing-detail {
            font-size: 0.95rem;
            color: var(--text-dark);
            opacity: 0.7;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 2.5rem;
        }

        .pricing-features li {
            padding: 1rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .pricing-features li:hover {
            transform: translateX(5px);
            color: var(--primary-color);
        }

        .pricing-features i {
            color: var(--primary-color);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .pricing-button {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 1.2rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 1rem;
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

            .pricing-grid {
                grid-template-columns: 1fr;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
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
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Sprachkurs mit Muttersprachler</h1>
                <p>Tingkatkan kemampuan berbicara bahasa Jerman Anda secara intensif dengan bimbingan langsung dari
                    native speaker dalam format one-on-one</p>
            </div>
        </div>
    </section>

    <section class="program-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="program-badge">Sprachkurs mit Muttersprachler</span>
                    <h2 class="program-title">Tentang Sprachkurs mit Muttersprachler</h2>
                </div>
            </div>
            <div class="program-content">
                <div class="program-text">
                    <p>Kelas ini dirancang khusus buat anda yang ingin melatih kemampuan berbicara (<em>Sprechen</em>)
                        langsung dengan <strong>native speaker bahasa Jerman</strong>. Karena sifatnya
                        <strong>private</strong>, pembelajaran dilakukan <strong>one-on-one</strong>, sehingga fokus
                        sepenuhnya pada perkembanganmu.</p>
                    <div class="highlight-box">
                        <p><strong>Jumlah pertemuan bisa fleksibel sesuai kebutuhan</strong>. Setiap sesi berlangsung
                            selama <strong>60 menit</strong>.</p>
                    </div>
                    <p>Format ini memastikan anda punya cukup waktu untuk berlatih percakapan sekaligus mendapat koreksi
                        langsung dari pengajar native speaker.</p>
                    <p>Dalam kelas ini, pengantar yang digunakan adalah <strong>bahasa Jerman</strong>. Metode ini
                        membantu anda terbiasa berpikir langsung dalam bahasa Jerman, sekaligus meningkatkan kepercayaan
                        diri dalam percakapan sehari-hari.</p>
                </div>
                <div class="program-images">
                    <div class="program-img large"></div>
                    <div class="program-img small1"></div>
                    <div class="program-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Keunggulan Kelas</span>
                <h2 class="program-title">Mengapa Memilih Sprachkurs mit Muttersprachler?</h2>
                <p class="pricing-subtitle">Pembelajaran intensif dengan pendekatan personal yang disesuaikan dengan
                    kebutuhanmu</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person-video3"></i>
                    </div>
                    <h4 class="feature-title">Native Speaker</h4>
                    <p class="feature-description">Belajar langsung dari native speaker Jerman untuk mendapatkan
                        pelafalan dan penggunaan bahasa yang autentik</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <h4 class="feature-title">One-on-One Session</h4>
                    <p class="feature-description">Pembelajaran privat yang fokus 100% pada perkembangan kemampuan
                        berbicara Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h4 class="feature-title">Fleksibel</h4>
                    <p class="feature-description">Jumlah pertemuan dapat disesuaikan dengan kebutuhan dan target
                        pembelajaran Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-chat-left-quote"></i>
                    </div>
                    <h4 class="feature-title">Praktik Percakapan</h4>
                    <p class="feature-description">Fokus pada kemampuan berbicara dengan praktik percakapan intensif
                        dalam setiap sesi</p>
                </div>
            </div>
        </div>
    </section>

    <section class="benefits-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Cocok Untuk</span>
                <h2 class="program-title">Sprachkurs mit Muttersprachler Sangat Cocok untuk:</h2>
            </div>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Melatih Percakapan Sehari-hari</h4>
                        <p>Berlatih berbicara dengan native speaker dalam konteks percakapan sehari-hari yang praktis
                            dan aplikatif</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Meningkatkan Kefasihan & Pelafalan</h4>
                        <p>Tingkatkan kecepatan dan ketepatan berbicara dengan koreksi langsung dari native speaker</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Menambah Rasa Percaya Diri</h4>
                        <p>Persiapan optimal sebelum menghadapi ujian bahasa atau wawancara penting dalam bahasa Jerman
                        </p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="bi bi-translate"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Pembelajaran Full Immersion</h4>
                        <p>Pengantar 100% dalam bahasa Jerman membantu Anda terbiasa berpikir langsung dalam bahasa
                            Jerman dengan lebih natural dan cepat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section">
        <div class="container">
            <h3 class="pricing-title">Biaya Sprachkurs mit Muttersprachler</h3>
            <p class="pricing-subtitle">Investasi per pertemuan dengan native speaker untuk kemampuan berbicara yang
                lebih baik</p>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Offline Class</h4>
                        <div class="pricing-price">Rp 419.000</div>
                        <div class="pricing-detail">Per meeting (60 menit)</div>
                    </div>
                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sesi one-on-one dengan native speaker</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Durasi 60 menit per pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pengantar 100% bahasa Jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Praktik percakapan intensif</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Koreksi pelafalan langsung</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Materi disesuaikan kebutuhan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Jumlah pertemuan fleksibel</span>
                        </li>
                    </ul>
                    <button class="pricing-button">Daftar Offline Class</button>
                </div>
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Online Class</h4>
                        <div class="pricing-price">Rp 399.000</div>
                        <div class="pricing-detail">Per meeting (60 menit)</div>
                    </div>
                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sesi one-on-one dengan native speaker</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Durasi 60 menit per pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Pengantar 100% bahasa Jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Praktik percakapan intensif</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Koreksi pelafalan langsung</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Materi disesuaikan kebutuhan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Belajar dari mana saja</span>
                        </li>
                    </ul>
                    <button class="pricing-button">Daftar Online Class</button>
                </div>
            </div>
            <div class="text-center mt-5">
                <p class="text-muted"><i class="bi bi-info-circle me-2"></i>Jumlah pertemuan dapat disesuaikan dengan
                    kebutuhan dan target pembelajaran Anda</p>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Siap Meningkatkan Kemampuan Berbicara Bahasa Jerman Anda?</h2>
            <p class="mb-4">Dengan pendekatan privat dan bimbingan langsung dari native speaker, Sprachkurs mit
                Muttersprachler memastikan perkembangan kemampuan berbicara bahasa Jerman Anda lebih cepat dan efektif.
                Cocok untuk persiapan ujian, wawancara, atau sekadar meningkatkan kepercayaan diri dalam berkomunikasi.
            </p>
            <a href="https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+Sprachkurs+mit+Muttersprachler+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0"
                class="btn-cta"><i class="bi bi-whatsapp me-2"></i>WhatsApp MinFara</a>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/img/logo/logo-Transparant3.png') }}" style="width: 180px;"
                            alt="Logo-Mitfara-Bulat">
                    </div>
                    <h2 class="footer-brand"><b>Deutsch Lernen Mit Fara</b></h2>
                    <p class="footer-description">Platform pembelajaran bahasa Jerman terpercaya dengan metode
                        pembelajaran yang efektif dan menyenangkan.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="footer-title">Quick Link</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/program') }}">Program</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
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
                    <div class="social-links mb-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="{{ url('https://www.instagram.com/deutschlernen.mit.fara/') }}" target="_blank"
                            class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    <p class="footer-description">Ikuti media sosial kami untuk tips belajar bahasa Jerman dan update
                        program terbaru.</p>
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

            const pricingButtons = document.querySelectorAll('.pricing-button');
            pricingButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const whatsappUrl = "https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+Sprachkurs+mit+Muttersprachler+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0";
                    window.open(whatsappUrl, '_blank');
                });
            });

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

            const cards = document.querySelectorAll('.feature-card, .benefit-item, .pricing-card');
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
