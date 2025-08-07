<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Deutsch Lernen mit Fara</title>
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
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-4: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --gradient-5: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --gradient-6: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
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

        .navbar-brand i {
            font-size: 1.8rem;
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
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 8rem 0 4rem;
            margin-top: 70px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
            top: -50%;
            left: -50%;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-images {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            max-width: 400px;
            padding: 2rem 0;
        }

        .hero-img {
            width: 100%;
            height: 150px;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            animation: floatImg 3s ease-in-out infinite;
            background-size: cover;
            background-position: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .hero-img:nth-child(1) {
            background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            animation-delay: 0s;
        }

        .hero-img:nth-child(2) {
            background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            animation-delay: 0.5s;
        }

        .hero-img:nth-child(3) {
            background-image: url('https://images.unsplash.com/photo-1543269664-647b6d91ec1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            animation-delay: 1s;
        }

        .hero-img:nth-child(4) {
            background-image: url('https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            animation-delay: 1.5s;
        }

        @keyframes floatImg {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Stats Section */
        .stats-section {
            background: var(--primary-color);
            color: white;
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            opacity: 0.9;
        }

        .stat-item {
            text-align: center;
            position: relative;
            z-index: 2;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .stat-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            display: block;
            color: var(--accent-color);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-top: 0.5rem;
        }

        /* Content Sections */
        .content-section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: var(--dark-blue);
        }

        .vision-mission {
            background: var(--light-gray);
        }

        .vision-mission .row {
            align-items: center;
        }

        .mission-list {
            list-style: none;
            padding: 0;
        }

        .mission-list li {
            padding: 0.5rem 0;
            position: relative;
            padding-left: 2rem;
        }

        .mission-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .vision-images {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 80px;
            gap: 1rem;
            height: 350px;
        }

        .vision-img {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        .vision-img:hover {
            transform: scale(1.05);
        }

        .vision-img.large {
            grid-column: 1 / 3;
            grid-row: 1;
            background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
        }

        .vision-img.small1 {
            background-image: url('https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        .vision-img.small2 {
            background-image: url('https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        /* Values Section - Sesuai Gambar */
        .values-section {
            background: white;
            padding: 4rem 0;
        }

        .values-hero {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 3rem;
        }

        .values-hero img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .values-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 2rem;
        }

        .value-item {
            background: transparent;
            padding: 0;
            border: none;
            box-shadow: none;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .value-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .value-item:hover {
            transform: translateY(-2px);
        }

        .value-item h5 {
            color: var(--dark-blue);
            font-weight: bold;
            margin-bottom: 0.8rem;
            font-size: 1rem;
        }

        .value-item p {
            color: var(--text-dark);
            font-size: 0.9rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Journey Section - Layout sesuai gambar dengan animasi bergerak */
        .journey-section {
            background: white;
            padding: 4rem 0;
        }

        .journey-header {
            display: flex;
            align-items: flex-start;
            margin-bottom: 3rem;
        }

        .journey-content {
            flex: 1;
            padding-right: 2rem;
        }

        .journey-main-image {
            flex-shrink: 0;
            width: 300px;
            height: 200px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .journey-main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .journey-intro {
            font-size: 1rem;
            color: var(--text-dark);
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .journey-desc {
            font-size: 0.95rem;
            color: #6b7280;
            line-height: 1.6;
        }

        /* Journey Images Section */
        .journey-images-section {
            margin-bottom: 3rem;
        }

        .journey-images-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 280px 230px;
            gap: 1rem;
            max-width: 800px;
            max-height: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .journey-image-1 {
            grid-column: 1 / 3;
            grid-row: 1;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .journey-image-2,
        .journey-image-3 {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .journey-image-1 img,
        .journey-image-2 img,
        .journey-image-3 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .journey-image-1:hover img,
        .journey-image-2:hover img,
        .journey-image-3:hover img {
            transform: scale(1.05);
        }

        /* Timeline Cards Bergerak - Improved Seamless Loop */
        .journey-timeline-container {
            overflow: hidden;
            width: 100%;
            position: relative;
            background: var(--light-gray);
            padding: 2rem 0;
            border-radius: 20px;
        }

        .journey-timeline-track {
            display: flex;
            gap: 2rem;
            width: fit-content;
            animation: scrollTimeline 60s linear infinite;
            will-change: transform;
        }

        .journey-timeline-track:hover {
            animation-play-state: paused;
        }

        @keyframes scrollTimeline {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .timeline-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            min-width: 420px;
            max-width: 420px;
            flex-shrink: 0;
            border-left: 5px solid var(--primary-color);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .timeline-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.25);
            border-left: 5px solid var(--secondary-color);
        }

        .timeline-card .timeline-year {
            display: inline-block;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 1.2rem;
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4);
            letter-spacing: 0.5px;
        }

        .timeline-card .timeline-title {
            color: var(--dark-blue);
            font-weight: bold;
            margin-bottom: 1.2rem;
            font-size: 1.25rem;
            line-height: 1.3;
        }

        .timeline-card .timeline-description {
            color: var(--text-dark);
            font-size: 0.95rem;
            line-height: 1.7;
            margin: 0;
        }

        /* Responsive untuk Journey Section */
        @media (max-width: 768px) {
            .journey-header {
                flex-direction: column;
                gap: 2rem;
            }

            .journey-content {
                padding-right: 0;
            }

            .journey-main-image {
                width: 100%;
                height: 200px;
            }

            .journey-images-container {
                grid-template-columns: 1fr;
                grid-template-rows: 200px 150px 150px;
                max-width: 100%;
            }

            .journey-image-1 {
                grid-column: 1;
                grid-row: 1;
            }

            .timeline-card {
                min-width: 320px;
                max-width: 320px;
                padding: 2rem;
            }

            .timeline-card .timeline-title {
                font-size: 1.1rem;
            }

            .timeline-card .timeline-description {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .timeline-card {
                min-width: 280px;
                max-width: 280px;
                padding: 1.8rem;
            }

            .timeline-card .timeline-title {
                font-size: 1rem;
            }

            .timeline-card .timeline-description {
                font-size: 0.85rem;
            }

            .journey-timeline-track {
                animation: scrollTimelineMobile 50s linear infinite;
            }

            @keyframes scrollTimelineMobile {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }
        }

        /* Teachers Section */
        .teachers-section {
            text-align: center;
        }

        .teachers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .teacher-card {
            text-align: center;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.5s ease;
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .teacher-card.animate {
            opacity: 1;
            transform: scale(1);
        }

        .teacher-card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(124, 58, 237, 0.2);
        }

        .teacher-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.3);
            transition: all 0.3s ease;
            background-size: cover;
            background-position: center;
            background-color: var(--light-gray);
        }

        .teacher-img:hover {
            box-shadow: 0 15px 35px rgba(124, 58, 237, 0.5);
            transform: scale(1.05);
        }

        .teacher-name {
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .teacher-level {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            padding: 0.2rem 0.8rem;
            background: rgba(124, 58, 237, 0.1);
            border-radius: 15px;
            display: inline-block;
        }

        .teacher-description {
            color: #6b7280;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .teacher-experience {
            color: var(--secondary-color);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .section-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 0;
        }

        /* Contact Section */
        .contact-section {
            background: var(--dark-blue);
            color: white;
            text-align: center;
        }

        .contact-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .contact-method {
            padding: 1.5rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .contact-method.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.4);
            transition: all 0.3s ease;
        }

        .contact-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.6);
        }

        /* Footer */
        .footer {
            background: #0f172a;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand h5 {
            color: white;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .footer-brand .brand-subtitle {
            color: #94a3b8;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .footer-brand .contact-info {
            color: #94a3b8;
            font-size: 0.9rem;
            line-height: 1.8;
        }

        .footer-brand .contact-info i {
            color: var(--primary-color);
            margin-right: 0.5rem;
            width: 16px;
        }

        .footer-section h5 {
            color: white;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            padding: 0.4rem 0;
        }

        .footer-section ul li a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .footer-section ul li a:hover {
            color: var(--primary-color);
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            line-height: 1.8;
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

        .footer-bottom {
            border-top: 1px solid #334155;
            padding-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-bottom .copyright {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .footer-bottom .legal-links {
            display: flex;
            gap: 2rem;
        }

        .footer-bottom .legal-links a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom .legal-links a:hover {
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 6rem 0 3rem;
                margin-top: 60px;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-images {
                grid-template-columns: 1fr;
                max-width: 300px;
                margin: 2rem auto 0;
                padding: 1rem 0;
            }

            .stat-number {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .values-content {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

            .journey-header {
                flex-direction: column;
                gap: 2rem;
            }

            .journey-content {
                padding-right: 0;
            }

            .journey-main-image {
                width: 100%;
                height: 200px;
            }

            .journey-timeline {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .journey-images-container {
                grid-template-columns: 1fr;
                grid-template-rows: 200px 150px 150px;
                margin-bottom: 2rem;
            }

            .journey-image-1 {
                grid-column: 1;
                grid-row: 1;
            }

            .teachers-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-methods {
                grid-template-columns: 1fr;
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

            .vision-images {
                grid-template-columns: 1fr;
                grid-template-rows: 200px 150px 150px;
            }

            .vision-img.large {
                grid-column: 1;
                grid-row: 1;
            }
        }

        @media (max-width: 576px) {
            .teachers-grid {
                grid-template-columns: 1fr;
            }

            .teacher-img {
                width: 100px;
                height: 100px;
            }

            .hero-img {
                height: 120px;
            }

            .social-links {
                justify-content: center;
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
                        <a class="nav-link active" href="{{ url('/about') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-4">Dari Indonesia Menuju Jerman, Bersama DlmF</h1>
                        <p class="lead mb-4">
                            Kami adalah platform pembelajaran bahasa Jerman terdepan yang membantu ribuan siswa
                            Indonesia meraih
                            impian mereka untuk belajar, bekerja, atau tinggal di Jerman. Dengan metode pembelajaran
                            yang efektif dan
                            guru-guru berpengalaman, kami memberikan solusi terbaik untuk menguasai bahasa Jerman dengan
                            cepat dan
                            mudah.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="hero-images">
                        <div class="hero-img"></div>
                        <div class="hero-img"></div>
                        <div class="hero-img"></div>
                        <div class="hero-img"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">5576</span>
                        <span class="stat-label">Siswa</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">300</span>
                        <span class="stat-label">Lulusan</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">50</span>
                        <span class="stat-label">Jam Belajar</span>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">98</span>
                        <span class="stat-label">Kepuasan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="content-section vision-mission">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">Visi Kami</h2>
                    <p class="mb-4">
                        Menjadi platform pembelajaran bahasa Jerman terdepan di Indonesia yang menyediakan pendidikan
                        berkualitas tinggi dan terjangkau untuk semua kalangan, sehingga setiap individu dapat meraih
                        impian mereka untuk belajar, bekerja, atau tinggal di Jerman.
                    </p>

                    <h3 class="h4 mb-3">Misi Kami</h3>
                    <ul class="mission-list">
                        <li>Menyediakan materi pembelajaran bahasa Jerman yang komprehensif dan mudah dipahami</li>
                        <li>Menghadirkan guru-guru berpengalaman dan bersertifikat internasional</li>
                        <li>Membantu siswa mencapai target pembelajaran bahasa Jerman mereka dengan efektif</li>
                        <li>Memberikan layanan pendidikan yang terjangkau dan berkualitas tinggi</li>
                        <li>Membangun komunitas pembelajar bahasa Jerman yang solid dan saling mendukung</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="vision-images">
                        <div class="vision-img large"></div>
                        <div class="vision-img small1"></div>
                        <div class="vision-img small2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section - Layout sesuai gambar -->
    <section class="values-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title">Nilai Kami</h2>
                <p class="section-subtitle">Kami Percaya, Nilai Baik Melahirkan Pembelajaran yang Bermakna</p>
            </div>

            <!-- Values Hero Image -->
            <div class="values-hero">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="Students together" class="rounded-4">
            </div>

            <!-- Values Content Grid 3x2 -->
            <div class="values-content">
                <div class="value-item" data-delay="0">
                    <h5>Fun Learning</h5>
                    <p>Kami percaya bahwa proses belajar yang menyenangkan akan memudahkan pemahaman. Di DlmF, setiap
                        kelas dirancang interaktif agar siswa betah dan aktif belajar.</p>
                </div>

                <div class="value-item" data-delay="200">
                    <h5>Integrity</h5>
                    <p>Kami menjunjung tinggi transparansi dan etika. Semua pengajaran dan layanan kami dilakukan dengan
                        tanggung jawab dan niat tulus untuk membantu siswa berkembang.</p>
                </div>

                <div class="value-item" data-delay="400">
                    <h5>Excellence</h5>
                    <p>Kami terus mendorong diri untuk memberikan hasil terbaik dari kualitas pengajaran, materi, hingga
                        layanan siswa karena kami ingin setiap siswa sukses dengan fondasi yang kuat.</p>
                </div>

                <div class="value-item" data-delay="600">
                    <h5>Empowerment</h5>
                    <p>Kami hadir untuk memberdayakan siswa agar percaya diri dalam belajar dan mengambil keputusan
                        penting untuk masa depan mereka, baik di dalam maupun luar negeri.</p>
                </div>

                <div class="value-item" data-delay="800">
                    <h5>Growth</h5>
                    <p>Kami mendorong pertumbuhan berkelanjutan baik secara akademis, pribadi, maupun profesional.
                        Setiap proses belajar adalah langkah menuju versi terbaik dari siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Section - Layout sesuai gambar dengan card bergerak -->
    <section class="journey-section">
        <div class="container">
            <!-- Journey Header -->
            <div class="journey-header">
                <div class="journey-content">
                    <h2 class="section-title">Perjalanan Kami</h2>
                    <p class="journey-intro">
                        Dalam lima tahun perjalanannya, DlmF terus berkembang dengan menghadirkan berbagai layanan
                        baru serta memperkuat kualitas pengajaran melalui pengajar tersertifikasi. Kami percaya bahwa
                        langkah-
                        langkah kecil yang dilakukan secara konsisten dapat menciptakan perubahan besar dalam dunia
                        pendidikan.
                    </p>
                    <p class="journey-desc">
                        Perjalanan kami dimulai dari hal-hal sederhana yang terus tumbuh seiring waktu. Berikut adalah
                        tonggak
                        yang menandai perkembangan DlmF.
                    </p>
                </div>
                <div class="journey-main-image">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Two women learning together">
                </div>
            </div>

            <!-- Journey Images Grid -->
            <div class="journey-images-section">
                <div class="journey-images-container">
                    <div class="journey-image-1">
                        <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Beach sunset learning">
                    </div>
                    <div class="journey-image-2">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Meeting discussion">
                    </div>
                    <div class="journey-image-3">
                        <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Volleyball team">
                    </div>
                </div>
            </div>

            <!-- Journey Timeline Cards - Bergerak horizontal -->
            <div class="journey-timeline-container">
                <div class="journey-timeline-track">
                    <div class="timeline-card" data-year="2020">
                        <div class="timeline-year">2020</div>
                        <h5 class="timeline-title">Lahirnya Deutsch lernen mit Fara</h5>
                        <p class="timeline-description">Deutsch lernen mit Fara (DlmF) resmi didirikan dengan semangat
                            untuk membantu generasi muda Indonesia yang bermimpi kuliah di Jerman yang menjanjikan,
                            praktis, dan efektif dengan dukungan dari generasi muda Indonesia masa kini.</p>
                    </div>

                    <div class="timeline-card" data-year="2021">
                        <div class="timeline-year">2021</div>
                        <h5 class="timeline-title">Tahun Pertama dan Awal Komunitas Belajar</h5>
                        <p class="timeline-description">Memasuki tahun pertamanya, DlmF mulai mengembangkan kelas online
                            dari level A1, A2, serta membangun komunitas pembelajar Bahasa Jerman yang solid dan
                            suportif. Pendekatan belajar yang komunikatif dan kontekstual menjadi ciri khas, menjadikan
                            proses belajar terasa lebih hidup.</p>
                    </div>

                    <div class="timeline-card" data-year="2022">
                        <div class="timeline-year">2022</div>
                        <h5 class="timeline-title">Ekspansi Digital dan Jangkauan Nasional</h5>
                        <p class="timeline-description">DlmF mulai mengembangkan kehadirannya secara digital melalui
                            platform pembelajaran dan penyebaran konten edukatif di media sosial. Peserta dari berbagai
                            daerah di Indonesia mulai bergabung, dan kurikulum berbasis CEFR diperkenalkan untuk
                            mendukung standar pembelajaran internasional.</p>
                    </div>

                    <div class="timeline-card" data-year="2023">
                        <div class="timeline-year">2023</div>
                        <h5 class="timeline-title">Legalitas, Diversifikasi, dan Kolaborasi Strategis</h5>
                        <p class="timeline-description">Tahun ini menjadi tonggak penting dengan pendirian badan hukum
                            sebagai landasan PT Fara Kreatif Sejahtera. DlmF juga mulai membuka kelas online dari level
                            B1 dan diversifikasi layanan, sekaligus memperluas kerja sama dengan mitra pendidikan dan
                            konsultan studi ke Jerman. Kurikulum A1-B1 disusun secara sistematis, didukung sistem
                            evaluasi internal yang lebih matang.</p>
                    </div>

                    <div class="timeline-card" data-year="2025">
                        <div class="timeline-year">2025</div>
                        <h5 class="timeline-title">Kantor Baru dan Langkah Menuju Akreditasi</h5>
                        <p class="timeline-description">DlmF resmi membuka kantor fisik pertamanya di Jalan Trengguli
                            Sari Asih No. 76, Bandung. Tahun ini juga menandai langkah strategis dan menuju akreditasi
                            sebagai lembaga pendidikan non-formal, sekaligus pengembangan platform pembelajaran digital
                            mandiri untuk memperkuat daya saing nasional dan internasional.</p>
                    </div>

                    <!-- Duplicate cards for infinite loop -->
                    <div class="timeline-card" data-year="2020">
                        <div class="timeline-year">2020</div>
                        <h5 class="timeline-title">Lahirnya Deutsch lernen mit Fara</h5>
                        <p class="timeline-description">Deutsch lernen mit Fara (DlmF) resmi didirikan dengan semangat
                            untuk membantu generasi muda Indonesia yang bermimpi kuliah di Jerman yang menjanjikan,
                            praktis, dan efektif dengan dukungan dari generasi muda Indonesia masa kini.</p>
                    </div>

                    <div class="timeline-card" data-year="2021">
                        <div class="timeline-year">2021</div>
                        <h5 class="timeline-title">Tahun Pertama dan Awal Komunitas Belajar</h5>
                        <p class="timeline-description">Memasuki tahun pertamanya, DlmF mulai mengembangkan kelas online
                            dari level A1, A2, serta membangun komunitas pembelajar Bahasa Jerman yang solid dan
                            suportif. Pendekatan belajar yang komunikatif dan kontekstual menjadi ciri khas, menjadikan
                            proses belajar terasa lebih hidup.</p>
                    </div>

                    <div class="timeline-card" data-year="2022">
                        <div class="timeline-year">2022</div>
                        <h5 class="timeline-title">Ekspansi Digital dan Jangkauan Nasional</h5>
                        <p class="timeline-description">DlmF mulai mengembangkan kehadirannya secara digital melalui
                            platform pembelajaran dan penyebaran konten edukatif di media sosial. Peserta dari berbagai
                            daerah di Indonesia mulai bergabung, dan kurikulum berbasis CEFR diperkenalkan untuk
                            mendukung standar pembelajaran internasional.</p>
                    </div>

                    <div class="timeline-card" data-year="2023">
                        <div class="timeline-year">2023</div>
                        <h5 class="timeline-title">Legalitas, Diversifikasi, dan Kolaborasi Strategis</h5>
                        <p class="timeline-description">Tahun ini menjadi tonggak penting dengan pendirian badan hukum
                            sebagai landasan PT Fara Kreatif Sejahtera. DlmF juga mulai membuka kelas online dari level
                            B1 dan diversifikasi layanan, sekaligus memperluas kerja sama dengan mitra pendidikan dan
                            konsultan studi ke Jerman. Kurikulum A1-B1 disusun secara sistematis, didukung sistem
                            evaluasi internal yang lebih matang.</p>
                    </div>

                    <div class="timeline-card" data-year="2025">
                        <div class="timeline-year">2025</div>
                        <h5 class="timeline-title">Kantor Baru dan Langkah Menuju Akreditasi</h5>
                        <p class="timeline-description">DlmF resmi membuka kantor fisik pertamanya di Jalan Trengguli
                            Sari Asih No. 76, Bandung. Tahun ini juga menandai langkah strategis dan menuju akreditasi
                            sebagai lembaga pendidikan non-formal, sekaligus pengembangan platform pembelajaran digital
                            mandiri untuk memperkuat daya saing nasional dan internasional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="content-section teachers-section">
        <div class="container">
            <h2 class="section-title">Kenalan dengan Tutor Hebat Kami</h2>
            <p class="section-subtitle">Tim pengajar kami terdiri dari native speaker dan tutor berpengalaman yang siap
                membantu perjalanan belajar Anda</p>

            <div class="teachers-grid">
                <div class="teacher-card" data-delay="0">
                    <div class="teacher-img"
                        style="background-image: url('https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                    </div>
                    <div class="teacher-name">Frau Caca</div>
                    <div class="teacher-level">Level B1</div>
                    <div class="teacher-description">Sastra Jerman Universitas Padjadjaran</div>
                    <div class="teacher-experience">2 Tahun Pengalaman</div>
                </div>

                <div class="teacher-card" data-delay="200">
                    <div class="teacher-img"
                        style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7bf874e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                    </div>
                    <div class="teacher-name">Frau Fila</div>
                    <div class="teacher-level">Level A1</div>
                    <div class="teacher-description">Sertifikasi GOETHE A2</div>
                    <div class="teacher-experience">1.5 Tahun Pengalaman</div>
                </div>

                <div class="teacher-card" data-delay="400">
                    <div class="teacher-img"
                        style="background-image: url('https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                    </div>
                    <div class="teacher-name">Frau Azizah</div>
                    <div class="teacher-level">Level B2</div>
                    <div class="teacher-description">Native Speaker dari Jerman</div>
                    <div class="teacher-experience">3 Tahun Pengalaman</div>
                </div>

                <div class="teacher-card" data-delay="600">
                    <div class="teacher-img"
                        style="background-image: url('https://images.unsplash.com/photo-1544005313-94dc1d8a9d30?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80')">
                    </div>
                    <div class="teacher-name">Frau Rara</div>
                    <div class="teacher-level">Level B2</div>
                    <div class="teacher-description">Lulusan Deutschkurs München</div>
                    <div class="teacher-experience">2.5 Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="content-section contact-section">
        <div class="container">
            <h2 class="section-title text-white">Yuk, Terhubung dengan Kami!</h2>
            <p class="lead mb-5">Punya pertanyaan atau ingin bergabung? Jangan ragu untuk menghubungi kami kapan saja
            </p>

            <div class="contact-methods">
                <div class="contact-method" data-delay="0">
                    <div class="contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5>Email</h5>
                    <p>info@deutschlernen.id</p>
                </div>

                <div class="contact-method" data-delay="200">
                    <div class="contact-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5>Phone</h5>
                    <p>+62 896 7576 5648</p>
                </div>

                <div class="contact-method" data-delay="400">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5>Location</h5>
                    <p>Semarang, Jawa Tengah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/img/logo/logo-bulet.png') }}" style="width: 180px;" alt="Logo-Mitfara-Bulat">
                    </div>
                    <h2 class="mb-3"><b>Deutsch Lernen Mit Fara</b></h2>
                    <div class="contact-info">
                        <p><i class="bi bi-geo-alt-fill"></i> Jalan Trengguli Sari Asri No. 79, Semarang, Semarang, Jawa
                            Tengah, Indonesia</p>
                        <p><i class="bi bi-telephone-fill"></i> +62 896 7576 5648</p>
                    </div>
                </div>

                <div class="footer-section">
                    <h5>Quick Link</h5>
                    <ul class="footer-links">
                        {{-- <li><a href="#">Course</a></li> --}}
                        <li><a href="{{ url('/program') }}">Program</a></li>
                        <li><a href="{{ url('/aus-bildung') }}">Aus Bildung</a></li>
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        {{-- <li><a href="#">Career</a></li>
                        <li><a href="#">Legalitas</a></li> --}}
                    </ul>
                </div>

                <div class="footer-section">
                    <h5>Get in Touch</h5>
                    <div class="social-links">
                        <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" title="TikTok"><i class="bi bi-tiktok"></i></a>
                    </div>
                    <p class="footer-description">
                        Ikuti media sosial kami untuk tips belajar bahasa Jerman dan update program terbaru.
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; 2025 PT Fara Kreatif Sejahtera. All Right Reserved</p>
                </div>
                <div class="legal-links">
                    <a href="#">Terms</a>
                    <a href="#">Privacy</a>
                    <a href="#">Legal</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Count-up animation for statistics
        function countUp(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }

                // Format numbers based on value
                if (target >= 1000) {
                    element.textContent = Math.floor(current).toLocaleString() + '+';
                } else if (target >= 100) {
                    element.textContent = Math.floor(current) + '+';
                } else if (target >= 50 && element.parentElement.querySelector('.stat-label').textContent === 'Jam Belajar') {
                    element.textContent = Math.floor(current) + 'K+';
                } else {
                    element.textContent = Math.floor(current) + '%';
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

                    // Stats animation
                    if (element.classList.contains('stat-item')) {
                        element.classList.add('animate');
                        const numberElement = element.querySelector('.stat-number');
                        const labelElement = element.querySelector('.stat-label');
                        const targetText = numberElement.textContent;
                        let targetNumber = parseInt(targetText.replace(/[^0-9]/g, ''));

                        // Adjust target numbers based on labels
                        if (labelElement.textContent === 'Siswa') targetNumber = 5576;
                        else if (labelElement.textContent === 'Lulusan') targetNumber = 300;
                        else if (labelElement.textContent === 'Jam Belajar') targetNumber = 50;
                        else if (labelElement.textContent === 'Kepuasan') targetNumber = 98;

                        setTimeout(() => {
                            countUp(numberElement, targetNumber);
                        }, 500);
                    }

                    // Value items animation
                    if (element.classList.contains('value-item')) {
                        const delay = parseInt(element.dataset.delay) || 0;
                        setTimeout(() => {
                            element.classList.add('animate');
                        }, delay);
                    }

                    // Timeline cards hover effect (handled by CSS animation)
                    // No animation observer needed for timeline cards

                    // Teacher cards animation
                    if (element.classList.contains('teacher-card')) {
                        const delay = parseInt(element.dataset.delay) || 0;
                        setTimeout(() => {
                            element.classList.add('animate');
                        }, delay);
                    }

                    // Contact methods animation
                    if (element.classList.contains('contact-method')) {
                        const delay = parseInt(element.dataset.delay) || 0;
                        setTimeout(() => {
                            element.classList.add('animate');
                        }, delay);
                    }

                    observer.unobserve(element);
                }
            });
        }, observerOptions);

        // Observe elements when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            // Observe stat items
            document.querySelectorAll('.stat-item').forEach(item => {
                observer.observe(item);
            });

            // Observe value items
            document.querySelectorAll('.value-item').forEach(item => {
                observer.observe(item);
            });

            // Observe timeline cards (no longer needed for scroll animation)
            // Cards will automatically animate with CSS animation

            // Add pause/play animation on hover for timeline cards
            const timelineTrack = document.querySelector('.journey-timeline-track');
            const timelineCards = document.querySelectorAll('.timeline-card');

            if (timelineTrack) {
                timelineCards.forEach(card => {
                    card.addEventListener('mouseenter', () => {
                        timelineTrack.style.animationPlayState = 'paused';
                    });

                    card.addEventListener('mouseleave', () => {
                        timelineTrack.style.animationPlayState = 'running';
                    });
                });
            }

            // Observe contact methods
            document.querySelectorAll('.contact-method').forEach(method => {
                observer.observe(method);
            });

            // Observe teacher cards
            document.querySelectorAll('.teacher-card').forEach(card => {
                observer.observe(card);
            });

            // Add smooth hover effects
            const cards = document.querySelectorAll('.value-item, .teacher-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px) scale(1.01)';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0) scale(1)';
                });
            });
        });

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
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('.hero-section');
            const parallaxElements = document.querySelectorAll('.hero-img');

            if (heroSection && scrolled < heroSection.offsetHeight) {
                parallaxElements.forEach((element, index) => {
                    const speed = (index + 1) * 0.1;
                    element.style.transform = `translateY(${scrolled * speed}px)`;
                });
            }
        });

        // Add dynamic gradient backgrounds
        document.addEventListener('DOMContentLoaded', () => {
            const gradients = [
                'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                'linear-gradient(135deg, #a8edea 0%, #fed6e3 100%)'
            ];

            const valueCards = document.querySelectorAll('.value-item');
            valueCards.forEach((card, index) => {
                card.addEventListener('mouseenter', () => {
                    card.style.background = `linear-gradient(135deg, ${gradients[index % gradients.length]})`;
                    card.style.color = 'white';
                    card.style.padding = '1.5rem';
                    card.style.borderRadius = '15px';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.background = 'transparent';
                    card.style.color = '';
                    card.style.padding = '0';
                    card.style.borderRadius = '';
                });
            });
        });

        // Add typing effect for hero title
        document.addEventListener('DOMContentLoaded', () => {
            const heroTitle = document.querySelector('.hero-content h1');
            if (heroTitle) {
                const text = heroTitle.textContent;
                heroTitle.textContent = '';

                let i = 0;
                const typeWriter = () => {
                    if (i < text.length) {
                        heroTitle.textContent += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 50);
                    }
                };

                setTimeout(typeWriter, 1000);
            }
        });
    </script>
</body>

</html>
