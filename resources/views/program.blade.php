<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program - Deutsch Lernen mit Fara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            margin: 0;
            overflow-x: hidden;
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
            transition: all 0.3s ease;
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
            padding: 0.5rem 0.75rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
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

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
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
            background: rgba(30, 41, 59, 0.8);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            opacity: 0;
            transform: translateY(50px);
            animation: slideInUp 1s ease 0.5s forwards;
            padding: 2rem 1rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Program Section */
        .program-section {
            padding: 100px 0;
            background: var(--light-gray);
        }

        .program-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
            padding: 40px;
            margin-bottom: 50px;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(50px);
            position: relative;
            overflow: hidden;
        }

        .program-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .program-badge {
            background: var(--primary-color);
            color: white;
            padding: 6px 16px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }

        .program-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .program-description {
            color: var(--text-dark);
            margin-bottom: 30px;
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .btn-program {
            background: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-program:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
        }

        /* Dashboard Mockup Styles */
        .program-mockup {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background: white;
            width: 100%;
            max-width: 100%;
        }

        .program-mockup:hover {
            transform: scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .mockup-container {
            width: 100%;
            background: var(--dark-blue);
            border-radius: 15px;
            overflow: hidden;
        }

        .mockup-header {
            background: #2D3748;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #4A5568;
            min-height: 50px;
        }

        .mockup-dots {
            display: flex;
            gap: 8px;
        }

        .mockup-dots span {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: block;
        }

        .mockup-dots span:nth-child(1) { background: #EF4444; }
        .mockup-dots span:nth-child(2) { background: #F59E0B; }
        .mockup-dots span:nth-child(3) { background: #10B981; }

        .mockup-title {
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .mockup-actions {
            display: flex;
            gap: 10px;
            color: #9CA3AF;
        }

        .mockup-content {
            display: flex;
            height: 300px;
            position: relative;
        }

        .mockup-sidebar {
            width: 200px;
            background: #1A202C;
            padding: 20px 0;
            border-right: 1px solid #2D3748;
            flex-shrink: 0;
        }

        .sidebar-item {
            padding: 12px 20px;
            color: #CBD5E0;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
        }

        .sidebar-item:hover {
            background: #2D3748;
            color: white;
        }

        .sidebar-item.active {
            background: var(--primary-color);
            color: white;
        }

        .mockup-main {
            flex: 1;
            padding: 20px;
            background: #1E293B;
            min-width: 0;
        }

        .main-header {
            margin-bottom: 20px;
        }

        .main-header h3 {
            color: white;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .progress-card {
            background: #2D3748;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .progress-bar-mockup {
            background: #4A5568;
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .progress-fill {
            background: var(--primary-color);
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .progress-card span {
            color: #CBD5E0;
            font-size: 12px;
        }

        .lesson-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
        }

        .lesson-card {
            background: #2D3748;
            padding: 15px 10px;
            border-radius: 8px;
            text-align: center;
            transition: all 0.2s ease;
            cursor: pointer;
            min-width: 100px;
        }

        .lesson-card:hover {
            background: #374151;
            transform: translateY(-2px);
        }

        .lesson-icon {
            font-size: 20px;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .lesson-card h4 {
            color: white;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .lesson-card p {
            color: #9CA3AF;
            font-size: 10px;
            margin: 0;
        }

        /* FAQ Section */
        .faq-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #64748B;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.1);
        }

        .faq-header {
            padding: 1.5rem;
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
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .faq-header:hover {
            background: #f8fafc;
        }

        .faq-header i {
            transition: transform 0.3s ease;
        }

        .faq-header.active i {
            transform: rotate(180deg);
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
            color: #64748B;
            padding: 0 1.5rem;
        }

        .faq-content.open {
            max-height: 200px;
            padding: 0 1.5rem 1.5rem;
        }

        .faq-content p {
            margin: 0;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: white;
            text-align: center;
        }

        .cta-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .btn-cta {
            background: var(--primary-color);
            color: white;
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-cta:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.3);
        }

        /* Footer */
        .footer {
            background: var(--dark-blue);
            color: white;
            padding: 60px 0 30px;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .footer-contact {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--accent-color);
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: var(--accent-color);
            padding-left: 10px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 40px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 1199.98px) {
            .hero-title {
                font-size: 3rem;
            }

            .program-title {
                font-size: 1.8rem;
            }

            .program-card {
                padding: 35px;
            }

            .mockup-sidebar {
                width: 180px;
            }

            .sidebar-item {
                font-size: 13px;
                padding: 10px 15px;
            }

            .main-header h3 {
                font-size: 16px;
            }
        }

        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.8rem;
            }

            .program-title {
                font-size: 1.7rem;
            }

            .program-card {
                padding: 30px;
                margin-bottom: 40px;
            }

            .program-description {
                font-size: 0.9rem;
            }

            .mockup-content {
                height: 280px;
            }

            .mockup-sidebar {
                width: 160px;
            }

            .sidebar-item {
                font-size: 12px;
                padding: 8px 12px;
                gap: 8px;
            }

            .lesson-grid {
                gap: 8px;
            }

            .lesson-card {
                padding: 12px 8px;
            }

            .lesson-icon {
                font-size: 18px;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 767.98px) {
            body {
                font-size: 14px;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .hero-section {
                background-attachment: scroll;
                min-height: 80vh;
                padding: 100px 0 50px;
            }

            .hero-title {
                font-size: 2.2rem;
                margin-bottom: 1rem;
            }

            .hero-content {
                padding: 1rem;
            }

            .program-section {
                padding: 60px 0;
            }

            .program-card {
                padding: 25px 20px;
                margin-bottom: 30px;
            }

            .program-title {
                font-size: 1.4rem;
                margin-bottom: 15px;
            }

            .program-description {
                font-size: 0.85rem;
                margin-bottom: 20px;
            }

            .mockup-content {
                height: 250px;
                flex-direction: column;
            }

            .mockup-sidebar {
                width: 100%;
                height: 60px;
                padding: 10px 0;
                display: flex;
                overflow-x: auto;
                border-right: none;
                border-bottom: 1px solid #2D3748;
            }

            .sidebar-item {
                white-space: nowrap;
                min-width: auto;
                flex-shrink: 0;
                padding: 8px 15px;
                font-size: 11px;
            }

            .mockup-main {
                height: 190px;
                padding: 15px;
            }

            .main-header h3 {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .progress-card {
                padding: 10px;
                margin-bottom: 15px;
            }

            .lesson-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 6px;
            }

            .lesson-card {
                padding: 8px 6px;
            }

            .lesson-icon {
                font-size: 16px;
                margin-bottom: 6px;
            }

            .lesson-card h4 {
                font-size: 10px;
            }

            .lesson-card p {
                font-size: 8px;
            }

            .section-title {
                font-size: 1.8rem;
                margin-bottom: 0.75rem;
            }

            .section-subtitle {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .faq-section {
                padding: 3rem 0;
            }

            .faq-header {
                padding: 1rem;
                font-size: 0.9rem;
            }

            .faq-content {
                padding: 0 1rem;
                font-size: 0.85rem;
            }

            .faq-content.open {
                padding: 0 1rem 1rem;
            }

            .cta-section {
                padding: 50px 0;
            }

            .cta-title {
                font-size: 1.7rem;
                margin-bottom: 15px;
            }

            .btn-cta {
                padding: 12px 30px;
                font-size: 0.9rem;
            }

            .footer {
                padding: 40px 0 20px;
            }

            .footer-brand {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 575.98px) {
            .hero-title {
                font-size: 1.9rem;
                line-height: 1.3;
            }

            .program-card {
                padding: 20px 15px;
            }

            .program-title {
                font-size: 1.3rem;
            }

            .program-description {
                font-size: 0.8rem;
            }

            .btn-program {
                padding: 10px 25px;
                font-size: 0.85rem;
            }

            .mockup-header {
                padding: 10px 15px;
            }

            .mockup-title {
                font-size: 12px;
            }

            .mockup-content {
                height: 220px;
            }

            .sidebar-item {
                padding: 6px 12px;
                font-size: 10px;
            }

            .mockup-main {
                height: 160px;
                padding: 12px;
            }

            .main-header h3 {
                font-size: 13px;
            }

            .progress-card {
                padding: 8px;
            }

            .lesson-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 4px;
            }

            .lesson-card {
                padding: 6px 4px;
            }

            .lesson-icon {
                font-size: 14px;
                margin-bottom: 4px;
            }

            .lesson-card h4 {
                font-size: 9px;
            }

            .lesson-card p {
                font-size: 7px;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .faq-header {
                font-size: 0.85rem;
            }

            .cta-title {
                font-size: 1.5rem;
            }

            .btn-cta {
                padding: 10px 25px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 479.98px) {
            .container {
                padding-left: 10px;
                padding-right: 10px;
            }

            .hero-title {
                font-size: 1.7rem;
            }

            .program-card {
                padding: 15px 10px;
            }

            .program-title {
                font-size: 1.2rem;
            }

            .mockup-content {
                height: 200px;
            }

            .mockup-main {
                height: 140px;
                padding: 10px;
            }

            .main-header h3 {
                font-size: 12px;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .cta-title {
                font-size: 1.3rem;
            }
        }

        /* Landscape orientation fixes for mobile */
        @media (max-width: 767.98px) and (orientation: landscape) {
            .hero-section {
                min-height: 100vh;
            }

            .mockup-content {
                height: 200px;
            }

            .mockup-main {
                height: 140px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="bi bi-translate me-2"></i>
                Deutsch lernen mit Fara
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="dropdown-item" href="{{ url('/aus-bildung') }}">Aus Bildung</a></li>
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk Digital</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
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
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="hero-content">
                        <h1 class="hero-title">Temukan Program Belajar yang Paling Cocok untuk Kamu</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section id="program" class="program-section">
        <div class="container">
            <!-- Program 1: Super Intensif Regular Offline -->
            <div class="row align-items-center program-card" data-aos="fade-up">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div class="program-badge">Super Intensif</div>
                    <h2 class="program-title">Super Intensif Regular Offline</h2>
                    <p class="program-description">
                        Program pembelajaran bahasa Jerman secara offline dengan metode yang intensif dan terstruktur.
                        Cocok untuk kamu yang ingin belajar dengan interaksi langsung bersama instruktur berpengalaman
                        dan sesama peserta dalam suasana kelas yang kondusif. Program ini dirancang untuk memberikan
                        pengalaman belajar yang mendalam dengan fokus pada praktik speaking dan listening secara langsung.
                    </p>
                    <a href="#" class="btn-program">Daftar Sekarang</a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="program-mockup">
                        <div class="mockup-container">
                            <div class="mockup-header">
                                <div class="mockup-dots">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="mockup-title">Dashboard</div>
                                <div class="mockup-actions">
                                    <i class="bi bi-dash"></i>
                                    <i class="bi bi-square"></i>
                                    <i class="bi bi-x"></i>
                                </div>
                            </div>
                            <div class="mockup-content">
                                <div class="mockup-sidebar">
                                    <div class="sidebar-item active">
                                        <i class="bi bi-house-door"></i>
                                        <span>Dashboard</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-book"></i>
                                        <span>Lessons</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-trophy"></i>
                                        <span>Progress</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-people"></i>
                                        <span>Community</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-gear"></i>
                                        <span>Settings</span>
                                    </div>
                                </div>
                                <div class="mockup-main">
                                    <div class="main-header">
                                        <h3>Welcome back, Student!</h3>
                                        <div class="progress-card">
                                            <div class="progress-bar-mockup">
                                                <div class="progress-fill" style="width: 65%"></div>
                                            </div>
                                            <span>65% Complete</span>
                                        </div>
                                    </div>
                                    <div class="lesson-grid">
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-play-circle"></i>
                                            </div>
                                            <h4>Grundlagen</h4>
                                            <p>Basic German</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-book"></i>
                                            </div>
                                            <h4>Grammatik</h4>
                                            <p>Grammar Rules</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-chat-dots"></i>
                                            </div>
                                            <h4>Sprechen</h4>
                                            <p>Speaking Practice</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Program 2: Super Intensif Regular Online -->
            <div class="row align-items-center program-card" data-aos="fade-up">
                <div class="col-lg-6 col-md-12 order-lg-2 mb-4 mb-lg-0">
                    <div class="program-badge">Super Intensif</div>
                    <h2 class="program-title">Super Intensif Regular Online</h2>
                    <p class="program-description">
                        Belajar bahasa Jerman secara online dengan fleksibilitas waktu dan tempat. Program ini dirancang
                        dengan teknologi pembelajaran modern dan interaktif, memungkinkan kamu belajar dari mana saja
                        dengan kualitas yang sama seperti pembelajaran offline. Dilengkapi dengan live session, recorded
                        materials, dan interactive assignments untuk memastikan progress belajar yang optimal.
                    </p>
                    <a href="#" class="btn-program">Mulai Belajar</a>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-1">
                    <div class="program-mockup">
                        <div class="mockup-container">
                            <div class="mockup-header">
                                <div class="mockup-dots">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="mockup-title">Online Platform</div>
                                <div class="mockup-actions">
                                    <i class="bi bi-dash"></i>
                                    <i class="bi bi-square"></i>
                                    <i class="bi bi-x"></i>
                                </div>
                            </div>
                            <div class="mockup-content">
                                <div class="mockup-sidebar">
                                    <div class="sidebar-item active">
                                        <i class="bi bi-house-door"></i>
                                        <span>Dashboard</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-camera-video"></i>
                                        <span>Live Class</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-collection-play"></i>
                                        <span>Recordings</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-chat-square-dots"></i>
                                        <span>Discussion</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-file-earmark-text"></i>
                                        <span>Materials</span>
                                    </div>
                                </div>
                                <div class="mockup-main">
                                    <div class="main-header">
                                        <h3>Online Learning Hub</h3>
                                        <div class="progress-card">
                                            <div class="progress-bar-mockup">
                                                <div class="progress-fill" style="width: 80%"></div>
                                            </div>
                                            <span>80% Complete</span>
                                        </div>
                                    </div>
                                    <div class="lesson-grid">
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-camera-video"></i>
                                            </div>
                                            <h4>Live Session</h4>
                                            <p>Interactive Class</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-download"></i>
                                            </div>
                                            <h4>Materials</h4>
                                            <p>Download Resources</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <h4>Community</h4>
                                            <p>Student Forum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Program 3: Kelas Private Gramatik -->
            <div class="row align-items-center program-card" data-aos="fade-up">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div class="program-badge">Program Spesial</div>
                    <h2 class="program-title">Kelas Private Gramatik</h2>
                    <p class="program-description">
                        Program khusus untuk memperdalam pemahaman tata bahasa Jerman dengan pendekatan personal.
                        Cocok untuk kamu yang ingin fokus pada aspek gramatik dengan bimbingan intensif one-on-one
                        dari instruktur ahli. Materi disesuaikan dengan kebutuhan spesifik dan tingkat kemampuan
                        individual untuk hasil belajar yang maksimal dalam waktu yang relatif singkat.
                    </p>
                    <a href="#" class="btn-program">Konsultasi Gratis</a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="program-mockup">
                        <div class="mockup-container">
                            <div class="mockup-header">
                                <div class="mockup-dots">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="mockup-title">Grammar Private</div>
                                <div class="mockup-actions">
                                    <i class="bi bi-dash"></i>
                                    <i class="bi bi-square"></i>
                                    <i class="bi bi-x"></i>
                                </div>
                            </div>
                            <div class="mockup-content">
                                <div class="mockup-sidebar">
                                    <div class="sidebar-item active">
                                        <i class="bi bi-house-door"></i>
                                        <span>Dashboard</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-book"></i>
                                        <span>Grammar</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Exercises</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-person-check"></i>
                                        <span>Tutor</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-calendar-check"></i>
                                        <span>Schedule</span>
                                    </div>
                                </div>
                                <div class="mockup-main">
                                    <div class="main-header">
                                        <h3>Private Grammar Class</h3>
                                        <div class="progress-card">
                                            <div class="progress-bar-mockup">
                                                <div class="progress-fill" style="width: 45%"></div>
                                            </div>
                                            <span>45% Complete</span>
                                        </div>
                                    </div>
                                    <div class="lesson-grid">
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-alphabet"></i>
                                            </div>
                                            <h4>Cases</h4>
                                            <p>Nominativ, Akkusativ</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-card-text"></i>
                                            </div>
                                            <h4>Articles</h4>
                                            <p>Der, Die, Das</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </div>
                                            <h4>Verbs</h4>
                                            <p>Conjugation</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Program 4: Super Intensif Regular Online (Alternative) -->
            <div class="row align-items-center program-card" data-aos="fade-up">
                <div class="col-lg-6 col-md-12 order-lg-2 mb-4 mb-lg-0">
                    <div class="program-badge">Super Intensif</div>
                    <h2 class="program-title">Super Intensif Regular Online</h2>
                    <p class="program-description">
                        Varian lanjutan dari program online dengan fitur-fitur premium dan dukungan pembelajaran yang
                        lebih komprehensif. Dilengkapi dengan AI learning assistant dan community support untuk
                        pengalaman belajar yang optimal. Program ini cocok untuk learners yang ingin mendapatkan
                        experience belajar yang lebih advanced dengan teknologi terdepan dan support system yang lengkap.
                    </p>
                    <a href="#" class="btn-program">Bergabung Sekarang</a>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-1">
                    <div class="program-mockup">
                        <div class="mockup-container">
                            <div class="mockup-header">
                                <div class="mockup-dots">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="mockup-title">Advanced Online</div>
                                <div class="mockup-actions">
                                    <i class="bi bi-dash"></i>
                                    <i class="bi bi-square"></i>
                                    <i class="bi bi-x"></i>
                                </div>
                            </div>
                            <div class="mockup-content">
                                <div class="mockup-sidebar">
                                    <div class="sidebar-item active">
                                        <i class="bi bi-house-door"></i>
                                        <span>Dashboard</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-robot"></i>
                                        <span>AI Assistant</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-graph-up"></i>
                                        <span>Analytics</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-shield-check"></i>
                                        <span>Premium Support</span>
                                    </div>
                                    <div class="sidebar-item">
                                        <i class="bi bi-trophy"></i>
                                        <span>Achievements</span>
                                    </div>
                                </div>
                                <div class="mockup-main">
                                    <div class="main-header">
                                        <h3>AI-Powered Learning</h3>
                                        <div class="progress-card">
                                            <div class="progress-bar-mockup">
                                                <div class="progress-fill" style="width: 92%"></div>
                                            </div>
                                            <span>92% Complete</span>
                                        </div>
                                    </div>
                                    <div class="lesson-grid">
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-cpu"></i>
                                            </div>
                                            <h4>AI Coach</h4>
                                            <p>Personal Assistant</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-bar-chart"></i>
                                            </div>
                                            <h4>Analytics</h4>
                                            <p>Progress Tracking</p>
                                        </div>
                                        <div class="lesson-card">
                                            <div class="lesson-icon">
                                                <i class="bi bi-headset"></i>
                                            </div>
                                            <h4>24/7 Support</h4>
                                            <p>Premium Help</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                        alt="FAQ Image" class="img-fluid rounded w-70">
                </div>
                <div class="col-lg-6 col-md-12">
                    <h2 class="section-title text-start">Freunde Bertanya, MinFara Menjawab</h2>
                    <p class="section-subtitle text-start">Temukan jawaban untuk pertanyaan yang sering diajukan tentang
                        program kursus bahasa Jerman kami</p>

                    <div class="faq-list mt-4">
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)" type="button">
                                Gimana cara mulai kursus di DlmF?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Untuk memulai kursus, Anda hanya perlu mendaftar melalui website kami, memilih
                                    program yang sesuai dengan level Anda, dan melakukan pembayaran. Setelah itu, Anda
                                    langsung bisa mengakses materi pembelajaran.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)" type="button">
                                Lokasi DlmF itu ada dimana aja MinFar?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>DlmF memiliki cabang di Jakarta, Bandung, Surabaya, dan Yogyakarta. Kami juga
                                    menyediakan kelas online untuk siswa di seluruh Indonesia.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)" type="button">
                                Berapa di DlmF online atau offline ya, MinFar?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kami menyediakan kedua opsi. Kelas online mulai dari Rp 750.000 dan kelas offline
                                    mulai dari Rp 1.250.000 per level, tergantung program yang dipilih.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)" type="button">
                                Butuh request tutor negara aja, MinFar?
                                <i class="bi bi-chevron-down ms-auto"></i>
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
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <h2 class="cta-title">Siap Mulai Belajar Bahasa Jerman?</h2>
                    <a href="#" class="btn-cta">Mulai Perjalananmu Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-brand">MinFara</div>
                    <p class="footer-description">
                        Platform pembelajaran bahasa Jerman terpercaya dengan metode modern dan instruktur berpengalaman.
                        Wujudkan impianmu untuk menguasai bahasa Jerman bersama kami.
                    </p>
                    <div class="footer-contact">
                        <i class="bi bi-telephone me-2"></i>+62 812 3456 7890
                    </div>
                    <div class="footer-contact">
                        <i class="bi bi-envelope me-2"></i>hello@minfara.com
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6 mb-4">
                    <h5 class="footer-title text-white">Quick Link</h5>
                    <a href="{{ url('/') }}" class="footer-link">Beranda</a>
                    <a href="{{ url('/program') }}" class="footer-link">Program</a>
                    <a href="{{ url('/about') }}" class="footer-link">About Us</a>
                    <a href="{{ url('/blog') }}" class="footer-link">Blog</a>
                    {{-- <a href="#" class="footer-link">Contact</a> --}}
                </div>

                <div class="col-lg-3 col-md-6 col-6 mb-4">
                    <h5 class="footer-title text-white">Saat ini Tersedia</h5>
                    <a href="#" class="footer-link">Super Intensif Offline</a>
                    <a href="#" class="footer-link">Super Intensif Online</a>
                    <a href="#" class="footer-link">Kelas Private</a>
                    <a href="#" class="footer-link">Kelas Gramatik</a>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title text-white">Follow Us</h5>
                    <div class="d-flex gap-3 mb-3">
                        <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-linkedin"></i></a>
                    </div>
                    <p class="footer-description">
                        Ikuti media sosial kami untuk tips belajar bahasa Jerman dan update program terbaru.
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                        <p class="mb-0">&copy; 2024 MinFara. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <a href="#" class="footer-link me-3 d-inline">Terms</a>
                        <a href="#" class="footer-link me-3 d-inline">Privacy</a>
                        <a href="#" class="footer-link d-inline">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 5px 30px rgba(0, 0, 0, 0.2)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        });

        // Smooth scrolling for anchor links
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');

                    // Add stagger effect for multiple cards
                    const cards = document.querySelectorAll('.program-card');
                    cards.forEach((card, index) => {
                        if (card === entry.target) {
                            setTimeout(() => {
                                card.style.animation = `slideInUp 0.6s ease ${index * 0.2}s forwards`;
                            }, 100);
                        }
                    });
                }
            });
        }, observerOptions);

        // Observe all program cards
        document.querySelectorAll('.program-card').forEach(card => {
            observer.observe(card);
        });

        // Add hover effects to program cards
        document.querySelectorAll('.program-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                if (window.innerWidth > 768) {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                    this.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                }
            });

            card.addEventListener('mouseleave', function() {
                if (window.innerWidth > 768) {
                    this.style.transform = 'translateY(0) scale(1)';
                }
            });
        });

        // Add loading animation
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';

            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });

        // Add interactive button effects
        document.querySelectorAll('.btn-program, .btn-cta, .btn-login').forEach(button => {
            button.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                }

                let ripple = document.createElement('span');
                let rect = this.getBoundingClientRect();
                let size = Math.max(rect.width, rect.height);
                let x = e.clientX - rect.left - size / 2;
                let y = e.clientY - rect.top - size / 2;

                ripple.style.position = 'absolute';
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.background = 'rgba(255, 255, 255, 0.3)';
                ripple.style.borderRadius = '50%';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.pointerEvents = 'none';

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // FAQ Toggle Function with Animation
        function toggleFaq(element) {
            const content = element.nextElementSibling;
            const icon = element.querySelector('i');
            const isOpen = content.classList.contains('open');

            // Close all other FAQ items
            document.querySelectorAll('.faq-content').forEach(item => {
                if (item !== content) {
                    item.classList.remove('open');
                }
            });
            document.querySelectorAll('.faq-header').forEach(header => {
                if (header !== element) {
                    header.classList.remove('active');
                    header.querySelector('i').style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current FAQ item
            if (isOpen) {
                content.classList.remove('open');
                element.classList.remove('active');
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.classList.add('open');
                element.classList.add('active');
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Handle window resize for responsive adjustments
        window.addEventListener('resize', function() {
            // Reset any hover effects on resize
            document.querySelectorAll('.program-card').forEach(card => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Touch device optimization
        if ('ontouchstart' in window) {
            document.body.classList.add('touch-device');

            // Disable hover effects on touch devices
            const hoverElements = document.querySelectorAll('.program-card, .btn-program, .btn-cta');
            hoverElements.forEach(element => {
                element.addEventListener('touchstart', function() {
                    this.classList.add('touch-active');
                });

                element.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.classList.remove('touch-active');
                    }, 300);
                });
            });
        }
    </script>
</body>
</html>
