<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeutschKit - DlmF</title>
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
                url('https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=1471&q=80');
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
            max-width: 900px;
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
            display: flex;
            align-items: flex-start;
            gap: 10px;
            text-align: justify;
        }

        .section-description i {
            flex-shrink: 0;
            font-size: 1.2rem;
        }

        .section-description span {
            flex: 1;
        }

        /* Category Section */
        .category-section {
            padding: 100px 0;
            background: linear-gradient(to bottom, #F8F9FA 0%, #FFFFFF 100%);
        }

        .category-header {
            text-align: center;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-bottom: 60px;
        }

        .category-box {
            background: white;
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
            transition: all 0.4s;
        }

        .category-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .category-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(124, 58, 237, 0.15);
        }

        .category-number {
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

        .category-box h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 20px;
        }

        .category-box p {
            color: #6B7280;
            line-height: 1.8;
            margin-bottom: 0;
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

        /* Levels Section */
        .levels-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #F8F9FA, #FFFFFF);
            position: relative;
            overflow: hidden;
        }

        .levels-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(124, 58, 237, 0.05);
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .level-item:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(124, 58, 237, 0.2);
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
            margin-bottom: 40px;
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
            margin: 0 10px 15px;
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--primary-color);
        }

        .cta-section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin: 30px 0 20px;
            position: relative;
            z-index: 1;
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

            .category-grid,
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
                font-size: 2rem;
            }

            .category-box,
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
                <div class="hero-badge">E-Book Interaktif</div>
                <h1 class="hero-title">DeutschKit</h1>
                <p class="hero-subtitle">E-book tematik yang dirancang untuk memperkaya pengetahuan kamu tentang
                    Wortschatz (kosakata) dan idiom dalam bahasa Jerman. Cocok untuk semua level pembelajar dari A1
                    hingga B1.</p>
            </div>
        </div>
    </section>

    <!-- Introduction -->
    <section class="intro-section">
        <div class="container">
            <div class="category-header">
                <div class="section-badge">
                    <i class="bi bi-book-fill me-2"></i>Tentang DeutschKit
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?auto=format&fit=crop&w=800&q=80"
                        alt="E-Book DeutschKit" class="img-fluid rounded-4 shadow-lg" style="border-radius: 30px;">
                </div>
                <div class="col-lg-6">
                    <div class="intro-content text-start">
                        <h2 class="section-title">Belajar Bahasa Jerman <br> Praktis & Menyenangkan</h2>
                        <p class="section-description">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            DeutschKit adalah eBook tematik yang dirancang untuk memperkaya pengetahuan kamu tentang
                            Wortschatz (kosakata) dan idiom dalam bahasa Jerman. Materinya dikemas dalam berbagai tema
                            sehari-hari, sehingga mudah dipahami dan langsung bisa dipraktikkan dalam percakapan.
                        </p>
                        <p class="section-description">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>
                            Cocok untuk semua pembelajar bahasa Jerman, mulai dari level A1 hingga B1, baik sebagai
                            pendamping kelas reguler maupun untuk belajar mandiri. DeutschKit tersedia dalam bentuk PDF,
                            yang akan dikirimkan setelah pembayaran. Dengan format digital, kamu bisa mengaksesnya kapan
                            saja dan di mana saja, sehingga belajar jadi lebih fleksibel.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="category-header">
                <div class="section-badge">Kategori Pembelajaran</div>
                <h2 class="section-title">Yang Kamu Dapatkan di DeutschKit</h2>
            </div>

            <div class="category-grid">
                <div class="category-box">
                    <div class="category-number">1</div>
                    <h3>Problem Solving</h3>
                    <p>Berisi kumpulan soal, kartu dialog, kosakata makanan, pakaian, transportasi, hingga Redemittel
                        Mini Dialog untuk latihan percakapan sehari-hari.</p>
                </div>

                <div class="category-box">
                    <div class="category-number">2</div>
                    <h3>Entertainment</h3>
                    <p>Kumpulan idiom bahasa Jerman (Teil 1 & Teil 2) agar percakapanmu terdengar lebih natural dan
                        autentik seperti native speaker.</p>
                </div>

                <div class="category-box">
                    <div class="category-number">3</div>
                    <h3>Extra Vocabulary</h3>
                    <p>Kosakata tambahan tematik: nama negara, kata benda seputar hobi, belanja, makanan, hingga 200
                        kata sifat & kata kerja lengkap dengan Wochenlernplan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-badge">Kelebihan DeutschKit</div>
                <h2 class="section-title">Mengapa Memilih DeutschKit?</h2>
            </div>

            <div class="features-grid">
                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                    </div>
                    <h4>Format PDF Praktis</h4>
                    <p>DeutschKit tersedia dalam format PDF yang mudah diakses di berbagai perangkat. Belajar kapan saja
                        dan di mana saja tanpa batasan, baik di smartphone, tablet, atau komputer.</p>
                </div>

                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-palette-fill"></i>
                    </div>
                    <h4>Desain Menarik & Interaktif</h4>
                    <p>E-book dengan desain visual yang menarik dan layout yang user-friendly membuat proses belajar
                        lebih menyenangkan dan tidak membosankan.</p>
                </div>

                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-chat-left-quote-fill"></i>
                    </div>
                    <h4>Materi Tematik Sehari-hari</h4>
                    <p>Semua materi dirancang berdasarkan tema kehidupan sehari-hari sehingga mudah dipahami dan
                        langsung bisa dipraktikkan dalam percakapan nyata.</p>
                </div>

                <div class="feature-block">
                    <div class="feature-icon-wrapper">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <h4>Cocok untuk Semua Level</h4>
                    <p>Materi yang komprehensif cocok untuk pembelajar level A1 hingga B1, baik sebagai pendamping kelas
                        reguler maupun untuk belajar mandiri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Levels Section -->
    <section class="levels-section">
        <div class="container">
            <div class="levels-header">
                <h2>Level yang Tersedia</h2>
                <p>DeutschKit dirancang untuk mendukung pembelajaran dari pemula hingga menengah.</p>
            </div>

            <div class="levels-container">
                <div class="level-item">
                    <span class="level-badge">A1</span>
                    <h4>Tingkat Pemula</h4>
                    <p>Kosakata dasar dan idiom sederhana untuk membangun fondasi bahasa Jerman yang kuat sejak awal.
                    </p>
                </div>

                <div class="level-item">
                    <span class="level-badge">A2</span>
                    <h4>Tingkat Dasar</h4>
                    <p>Vocabulary dan idiom yang lebih kompleks untuk meningkatkan kemampuan percakapan sehari-hari.</p>
                </div>

                <div class="level-item">
                    <span class="level-badge">B1</span>
                    <h4>Tingkat Menengah</h4>
                    <p>Kosakata lanjutan dan idiom autentik untuk komunikasi yang lebih natural dan percaya diri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Mulai Belajar dengan DeutschKit!</h2>
            <p>E-book interaktif dengan desain menarik dan format praktis untuk belajar bahasa Jerman di mana saja.</p>

            <h3 class="cta-section-title">Shopee</h3>
            <div>
                <a href="https://id.shp.ee/God2KwW" target="_blank" class="btn-cta">
                    <i class="bi bi-cart-fill me-2"></i>Satuan
                </a>
                <a href="https://id.shp.ee/zMcmfxA" target="_blank" class="btn-cta">
                    <i class="bi bi-bag-fill me-2"></i>Bundling
                </a>
            </div>

            <h3 class="cta-section-title">TikTok Shop</h3>
            <div>
                <a href="https://vt.tokopedia.com/t/ZSH7hf2CRCXPd-tz9tt/" target="_blank" class="btn-cta">
                    <i class="bi bi-tiktok me-2"></i>Satuan
                </a>
                <a href="https://vt.tokopedia.com/t/ZSH7hf2dhmcNq-fSknU/" target="_blank" class="btn-cta">
                    <i class="bi bi-tiktok me-2"></i>Bundling
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
                        <li><a href="{{ url('/product') }}">Produk</a></li>
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
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
                        <a href="https://wa.me/6289647897616"><i class="bi bi-whatsapp"></i></a>
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
        document.querySelectorAll('.category-box, .feature-block, .level-item').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'all 0.6s ease';
            observer.observe(element);
        });
    </script>
</body>

</html>
