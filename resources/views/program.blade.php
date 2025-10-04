<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program - DlmF</title>
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
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.9)),
                url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1471&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 70vh;
            display: flex;
            align-items: center;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            top: -250px;
            right: -100px;
            animation: pulse 4s ease-in-out infinite;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -200px;
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
            text-align: center;
            color: white;
            opacity: 0;
            transform: translateY(50px);
            animation: slideInUp 1s ease 0.5s forwards;
            padding: 2rem 1rem;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .hero-title::before {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .hero-floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 1;
        }

        .floating-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 3rem;
            animation: float 6s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-icon:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 1s;
            font-size: 2.5rem;
        }

        .floating-icon:nth-child(3) {
            top: 40%;
            left: 80%;
            animation-delay: 2s;
            font-size: 2rem;
        }

        .floating-icon:nth-child(4) {
            top: 70%;
            left: 20%;
            animation-delay: 3s;
            font-size: 2.2rem;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Program Section */
        .program-section {
            padding: 120px 0;
            background: linear-gradient(to bottom, #F8F9FA 0%, #FFFFFF 100%);
        }

        .program-card {
            background: white;
            border-radius: 24px;
            margin-bottom: 100px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            opacity: 0;
            transform: translateY(50px);
            overflow: hidden;
            position: relative;
        }

        .program-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .program-card:hover::before {
            opacity: 1;
        }

        .program-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .program-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(124, 58, 237, 0.15);
        }

        .program-text-content {
            padding: 60px;
        }

        .program-badge {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(168, 85, 247, 0.1));
            color: var(--primary-color);
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .program-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .program-description {
            color: #6B7280;
            margin-bottom: 35px;
            line-height: 1.9;
            font-size: 1rem;
        }

        .btn-program {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 15px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
            transition: all 0.3s;
        }

        .btn-program:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
            color: white;
        }

        .program-image-wrapper {
            padding: 60px;
            position: relative;
        }

        .program-image {
            border-radius: 16px;
            width: 100%;
            height: 450px;
            object-fit: cover;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
            transition: all 0.4s;
        }

        .program-card:hover .program-image {
            transform: scale(1.05);
        }

        /* FAQ */
        .faq-section {
            padding: 100px 0;
            background: var(--light-gray);
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-subtitle {
            font-size: 1.15rem;
            color: #64748B;
            margin-bottom: 3rem;
        }

        .faq-item {
            background: white;
            border-radius: 16px;
            margin-bottom: 1.2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .faq-item:hover {
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.15);
            border-color: rgba(124, 58, 237, 0.2);
        }

        .faq-header {
            padding: 1.8rem 2rem;
            background: white;
            border: none;
            width: 100%;
            text-align: left;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-size: 1.05rem;
        }

        .faq-header i {
            color: var(--primary-color);
            font-size: 1.2rem;
            transition: transform 0.3s;
        }

        .faq-header.active i {
            transform: rotate(180deg);
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            color: #64748B;
            padding: 0 2rem;
        }

        .faq-content.open {
            max-height: 250px;
            padding: 0 2rem 1.8rem;
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
                font-size: 2.5rem;
            }

            .program-text-content,
            .program-image-wrapper {
                padding: 40px;
            }

            .program-title {
                font-size: 1.9rem;
            }

            .program-image {
                height: 350px;
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                background-attachment: scroll;
                min-height: 50vh;
                padding: 100px 0 60px;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .program-section {
                padding: 80px 0;
            }

            .program-card {
                margin-bottom: 60px;
            }

            .program-text-content,
            .program-image-wrapper {
                padding: 30px 20px;
            }

            .program-title {
                font-size: 1.5rem;
            }

            .program-image {
                height: 280px;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
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
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
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
        <div class="hero-floating-elements">
            <i class="bi bi-book floating-icon"></i>
            <i class="bi bi-chat-dots floating-icon"></i>
            <i class="bi bi-mortarboard floating-icon"></i>
            <i class="bi bi-globe floating-icon"></i>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Temukan Program Belajar yang Paling Cocok untuk anda</h1>
            </div>
        </div>
    </section>

    <!-- Programs -->
    <section class="program-section">
        <div class="container">
            <!-- Program 1 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-1">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Kelas Reguler</h2>
                        <p class="program-description">
                            Program kelas reguler bahasa Jerman ini dirancang untuk semua kalangan, termasuk bagi anda
                            yang benar-benar pemula. Jika belum pernah belajar bahasa Jerman sama sekali, anda bisa
                            langsung memulai dari level A1, yang memang dibuat khusus untuk pemula.
                        </p>
                        <a href="{{ url('/program/reguler') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
                <div class="col-lg-6 order-2">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80"
                            alt="Kelas Reguler" class="program-image">
                    </div>
                </div>
            </div>

            <!-- Program 2 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80"
                            alt="Private Gramatik" class="program-image">
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Kelas Private Gramatik</h2>
                        <p class="program-description">
                            Kelas Private Grammatik adalah versi personal dari kelas reguler. Materinya sama, mencakup
                            pembelajaran lengkap mulai dari level A1 hingga B1, sehingga tetap cocok juga untuk pemula
                            yang benar-benar baru belajar bahasa Jerman.
                        </p>
                        <a href="{{ url('/program/grammatik') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
            </div>

            <!-- Program 3 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-1">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Kelas Private Persiapan Ujian Goethe</h2>
                        <p class="program-description">
                            Kelas Private Persiapan Ujian dirancang khusus untuk membantu anda menghadapi ujian bahasa
                            Jerman dengan lebih percaya diri. Fokus pada empat skill utama: Lesen, Hören, Schreiben, dan
                            Sprechen.
                        </p>
                        <a href="{{ url('/program/prep-ex-goethe') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
                <div class="col-lg-6 order-2">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80"
                            alt="Persiapan Ujian" class="program-image">
                    </div>
                </div>
            </div>

            <!-- Program 4 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=800&q=80"
                            alt="Native Speaker" class="program-image">
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Sprachkurs mit Muttersprachler</h2>
                        <p class="program-description">
                            Kelas ini dirancang khusus buat anda yang ingin melatih kemampuan berbicara (Sprechen)
                            langsung dengan native speaker bahasa Jerman. Tingkatkan pronunciation dan fluency Anda.
                        </p>
                        <a href="{{ url('/program/muttersprachler') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
            </div>

            <!-- Program 5 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-1">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Kelas Private Kinder (Anak)</h2>
                        <p class="program-description">
                            Kelas Private Kinder dirancang khusus untuk anak-anak usia 8–12 tahun yang ingin mulai
                            belajar bahasa Jerman dengan cara yang menyenangkan dan sesuai usia mereka.
                        </p>
                        <a href="{{ url('/program/kinder') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
                <div class="col-lg-6 order-2">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80"
                            alt="Kelas Anak" class="program-image">
                    </div>
                </div>
            </div>

            <!-- Program 6 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?auto=format&fit=crop&w=800&q=80"
                            alt="FlexiLearn" class="program-image">
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Deutsch FlexiLearn</h2>
                        <p class="program-description">
                            Deutsch Flexilearn adalah Learning Management System (LMS) eksklusif dari Deutsch Lernen mit
                            Fara yang dirancang untuk anda yang ingin belajar bahasa Jerman secara fleksibel, kapan
                            saja, dan di mana saja.
                        </p>
                        <a href="{{ url('/program/flexilearn') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
            </div>

            <!-- Program 7 -->
            <div class="row align-items-center program-card">
                <div class="col-lg-6 order-1">
                    <div class="program-text-content">
                        <div class="program-badge">Program DlmF</div>
                        <h2 class="program-title">Netzwerk</h2>
                        <p class="program-description">
                            Netzwerk neu adalah edisi terbaru dari buku ajar tingkat dasar yang sukses digunakan secara
                            internasional. Metode pembelajaran yang proven dan teruji untuk hasil maksimal.
                        </p>
                        <a href="{{ url('/program/netzwerk') }}" class="btn-program">Lihat Detail Program</a>
                    </div>
                </div>
                <div class="col-lg-6 order-2">
                    <div class="program-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=800&q=80"
                            alt="Netzwerk" class="program-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
                        alt="FAQ" class="img-fluid rounded-4 shadow-lg">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Freunde Bertanya, MinFara Menjawab</h2>
                    <p class="section-subtitle">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
                    <div class="faq-list">
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Gimana cara mulai kursus di DlmF?
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="faq-content">
                                <p>Untuk memulai kursus, Anda hanya perlu mendaftar melalui website kami, memilih
                                    program yang sesuai dengan level Anda, dan melakukan pembayaran.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Lokasi DlmF itu ada dimana aja MinFar?
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="faq-content">
                                <p>DlmF memiliki cabang di Jakarta, Bandung, Surabaya, dan Yogyakarta. Kami juga
                                    menyediakan kelas online untuk siswa di seluruh Indonesia.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Berapa biaya kursus di DlmF?
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kelas online mulai dari Rp 750.000 dan kelas offline mulai dari Rp 1.250.000 per
                                    level, tergantung program yang dipilih.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Siap Mulai Belajar Bahasa Jerman?</h2>
            <p class="mb-4">Bergabunglah dengan ribuan siswa yang telah merasakan kemudahan belajar bahasa Jerman
                bersama kami</p>
            <a href="https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0"
                class="btn-cta"><i class="bi bi-whatsapp me-2"></i>WhatsApp MinFara</a>
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
        // Navbar scroll
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 5px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            }
        });

        // Animation observer
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.program-card').forEach(card => {
            observer.observe(card);
        });

        // FAQ toggle
        function toggleFaq(element) {
            const content = element.nextElementSibling;
            const isOpen = content.classList.contains('open');

            document.querySelectorAll('.faq-content').forEach(item => {
                if (item !== content) item.classList.remove('open');
            });
            document.querySelectorAll('.faq-header').forEach(header => {
                if (header !== element) header.classList.remove('active');
            });

            if (isOpen) {
                content.classList.remove('open');
                element.classList.remove('active');
            } else {
                content.classList.add('open');
                element.classList.add('active');
            }
        }
    </script>
</body>

</html>
