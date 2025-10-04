<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - DlmF</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #7C3AED;
            --secondary-color: #A855F7;
            --accent-color: #FDE047;
            --dark-blue: #243046;
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
            padding-top: 90px;
            /* Tambahkan padding untuk fixed navbar */
        }

        /* Custom CSS untuk button outline dengan hover purple */
        .btn-outline-custom {
            color: #7C3AED;
            border-color: #7C3AED;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        /* Button custom */
        .btn-outline-custom:hover {
            background-color: #7C3AED;
            border-color: #7C3AED;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
        }

        .btn-outline-custom:focus,
        .btn-outline-custom.focus {
            box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.25);
            background-color: #7C3AED;
            border-color: #7C3AED;
            color: white;
        }

        .btn-outline-custom:active,
        .btn-outline-custom.active {
            background-color: #6D28D9;
            border-color: #6D28D9;
            color: white;
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

        /* Hero Section - Perbaikan */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 0 80px;
            /* Kurangi padding-top karena sudah ada padding di body */
            position: relative;
            overflow: hidden;
            margin-top: 0;
            /* Hapus margin-top jika ada */
        }

        /* Hero Animations */
        .hero-content {
            opacity: 0;
            transform: translateX(-50px);
            animation: slideInLeft 1s ease-out 0.3s forwards;
        }

        .hero-images {
            opacity: 0;
            transform: translateX(50px);
            animation: slideInRight 1s ease-out 0.6s forwards;
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-title {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out 0.8s forwards;
        }

        .hero-subtitle {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out 1s forwards;
            justify-content: justify;
        }

        .hero-buttons {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s ease-out 1.2s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .floating-card {
            animation: floatCard 3s ease-in-out infinite;
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            justify-content: justify;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 2px solid white;
            color: white;
        }

        .btn-hero-secondary a {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-hero-secondary a:hover {
            background: white;
            color: var(--primary-color);
        }

        .hero-images {
            position: relative;
            margin-top: 3rem;
        }

        .hero-image-main {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            body {
                padding-top: 80px;
            }

            .hero-section {
                padding: 50px 0 60px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 75px;
            }

            .navbar {
                min-height: 65px;
                padding: 0.75rem 0;
            }

            .hero-section {
                padding: 40px 0 50px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding-top: 70px;
            }

            .navbar {
                min-height: 60px;
                padding: 0.5rem 0;
            }

            .hero-section {
                padding: 30px 0 40px;
            }

            .hero-title {
                font-size: 2rem;
                line-height: 1.2;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }

        /* Perbaikan untuk logo navbar */
        .navbar-brand img {
            max-height: 150px;
            width: auto;
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                max-height: 120px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                max-height: 100px;
            }
        }

        .floating-elements {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .floating-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-radius: 15px;
            color: var(--text-dark);
            font-size: 0.9rem;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Stats Section with Counter Animation */
        .stats-section {
            background: var(--primary-color);
            color: white;
            padding: 3rem 0;
        }

        .stat-item {
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .stat-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            display: block;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Learning Method Section */
        .learning-method-section {
            padding: 5rem 0;
            background: white;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #64748B;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .method-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            border-left: 4px solid var(--primary-color);
        }

        .method-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.15);
        }

        .method-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .method-content {
            flex: 1;
        }

        .method-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-dark);
        }

        .method-description {
            color: #64748B;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Features Section with New Layout */
        .features-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .features-image-container {
            position: relative;
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-main-image {
            max-width: 100%;
            height: auto;
            min-height: 400px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Purple Circle Accent */
        .features-purple-circle {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            animation: floatCard 3s ease-in-out infinite;
            z-index: 10;
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Small Card at Bottom Right */
        .features-small-card {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 80px;
            height: 60px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            animation: floatCard 3s ease-in-out infinite 1s;
            z-index: 10;
        }

        .small-card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Features Content */
        .features-content {
            padding: 2rem 0;
        }

        /* Feature Points */
        .feature-point {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .feature-point:hover {
            transform: translateX(5px);
        }

        .feature-point-icon {
            width: 28px;
            height: 28px;
            color: var(--primary-color);
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .feature-point-text {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 1rem;
        }

        /* CTA Button */
        .btn-cta {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0.875rem 1.75rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
            color: white;
        }

        .btn-cta i {
            font-size: 1.1rem;
        }

        /* Features Grid Updates */
        .features-grid {
            margin-top: 4rem;
        }

        .feature-item {
            text-align: center;
            padding: 2rem 1.5rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 1rem;
            border: 1px solid rgba(124, 58, 237, 0.1);
        }

        .feature-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.15);
            border-color: var(--primary-color);
        }

        .feature-item-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.75rem;
        }

        .feature-item-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .feature-item-description {
            color: #64748B;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Animation Effects */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .features-purple-circle {
                width: 55px;
                height: 55px;
                font-size: 1.3rem;
            }

            .features-small-card {
                width: 75px;
                height: 55px;
            }
        }

        @media (max-width: 992px) {
            .features-purple-circle {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
                top: 15px;
                right: 15px;
            }

            .features-small-card {
                width: 70px;
                height: 50px;
                bottom: 15px;
                right: 15px;
            }

            .features-content {
                padding: 1.5rem 0;
                margin-top: 2rem;
            }

            .feature-point {
                margin-bottom: 1rem;
                justify-content: flex-start;
            }

            .feature-point-text {
                font-size: 0.95rem;
            }

            .feature-item-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .feature-item {
                padding: 1.75rem 1.25rem;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
                line-height: 1.3;
            }

            .section-subtitle {
                font-size: 1rem;
                padding: 0 1rem;
                margin-bottom: 2rem;
            }

            .features-purple-circle {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
                top: 10px;
                right: 10px;
            }

            .features-small-card {
                display: none !important;
            }

            .features-main-image {
                min-height: 300px;
            }

            .features-content {
                padding: 1rem 0;
                margin-top: 1.5rem;
            }

            .feature-point {
                justify-content: center;
                text-align: center;
                margin-bottom: 1rem;
                padding: 0.75rem;
                background: rgba(124, 58, 237, 0.05);
                border-radius: 12px;
            }

            .feature-point-icon {
                font-size: 1.2rem;
            }

            .feature-point-text {
                font-size: 0.9rem;
            }

            .btn-cta {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }

            .feature-item {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }

            .feature-item-icon {
                width: 55px;
                height: 55px;
                font-size: 1.3rem;
            }

            .feature-item-title {
                font-size: 1.1rem;
            }

            .feature-item-description {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 1.75rem;
                line-height: 1.3;
                margin-bottom: 0.75rem;
            }

            .section-subtitle {
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }

            .features-content {
                padding: 0.5rem 0;
            }

            .feature-point {
                padding: 0.5rem;
                margin-bottom: 0.75rem;
            }

            .feature-point-text {
                font-size: 0.85rem;
            }

            .btn-cta {
                padding: 0.65rem 1.25rem;
                font-size: 0.9rem;
            }

            .feature-item {
                padding: 1.25rem 0.75rem;
            }

            .feature-item-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }

            .feature-item-title {
                font-size: 1rem;
                margin-bottom: 0.75rem;
            }

            .feature-item-description {
                font-size: 0.85rem;
            }
        }

        /* Extra small devices */
        @media (max-width: 480px) {
            .features-section {
                padding: 3rem 0;
            }

            .features-main-image {
                min-height: 250px;
            }

            .features-grid {
                margin-top: 2.5rem;
            }
        }

        /* Course Cards Section */
        .courses-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            text-align: center;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .course-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(124, 58, 237, 0.2);
        }

        .course-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .course-card:hover .course-image {
            transform: scale(1.05);
        }

        .course-content {
            padding: 1.8rem;
        }

        .course-badge {
            background: linear-gradient(135deg, var(--primary-color), #9333ea);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .course-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: var(--text-dark);
            line-height: 1.4;
        }

        .course-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.2rem;
        }

        .course-instructor {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .instructor-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), #9333ea);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .course-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .price-btn {
            background: linear-gradient(135deg, var(--primary-color), #9333ea);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            justify-content: center;
        }

        .price-btn:hover {
            background: linear-gradient(135deg, #6d28d9, #7c3aed);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.3);
            color: white;
        }

        .price-btn i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .price-btn:hover i {
            transform: translateX(3px);
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .courses-section {
                padding: 3rem 0;
            }

            .course-image {
                height: 200px;
            }

            .course-content {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 1.8rem;
            }

            .course-image {
                height: 180px;
            }
        }

        .instructor-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary-color);
        }

        /* Teachers Section */
        .teachers-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .teacher-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(124, 58, 237, 0.1);
        }

        .teacher-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.15);
            border-color: var(--primary-color);
        }

        .teacher-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            object-fit: cover;
        }

        .teacher-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .teacher-level {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .teacher-description {
            font-size: 0.9rem;
            color: #64748B;
        }

        /* Blog Cards */
        .blog-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.15);
        }

        /* Testimonials Section with Dynamic Carousel */
        .testimonials-section {
            padding: 5rem 0;
            overflow: hidden;
            background: #f8f9fa;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-subtitle {
            text-align: center;
            color: #6c757d;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .testimonial-carousel {
            display: flex;
            gap: 2rem;
            width: max-content;
            animation: autoScroll var(--animation-duration, 40s) linear infinite;
        }

        .testimonial-carousel:hover {
            animation-play-state: paused;
        }

        /* Dynamic keyframes */
        @keyframes autoScroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(var(--scroll-distance));
            }
        }

        .testimonial-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary-color);
            flex: 0 0 420px;
            /* Diperbesar dari 350px ke 420px */
            min-height: 350px;
            /* Diperbesar dari 280px ke 350px */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .testimonial-rating {
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .testimonial-rating i {
            margin-right: 0.2rem;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 8;
            /* Diperbesar dari 6 ke 8 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 160px;
            /* Tinggi minimum untuk konsistensi */
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .author-info h6 {
            margin: 0;
            font-weight: 600;
            color: var(--text-dark);
        }

        .author-info small {
            color: #64748B;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .testimonial-card {
                flex: 0 0 340px;
                /* Diperbesar dari 280px ke 340px */
                padding: 2rem;
                min-height: 320px;
            }

            .testimonial-text {
                -webkit-line-clamp: 6;
                /* Diperbesar dari 4 ke 6 baris */
                min-height: 120px;
            }
        }

        @media (max-width: 576px) {
            .testimonial-card {
                flex: 0 0 300px;
                /* Diperbesar dari 250px ke 300px */
                padding: 1.8rem;
                min-height: 300px;
            }

            .testimonial-text {
                -webkit-line-clamp: 5;
                min-height: 100px;
            }
        }

        /* FAQ Section with Smooth Animations */
        .faq-section {
            padding: 5rem 0;
            background: var(--light-gray);
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

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Footer */
        .footer {
            background: var(--dark-blue);
            color: white;
            padding: 30px 0 10px;
        }

        .footer-logo {
            display: flex;
            align-items: center;

        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }

        .footer-links {
            list-style: none;
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

        /* Animation Effects */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .features-overlay-card {
                max-width: 220px;
                padding: 1rem;
            }

            .overlay-card-title {
                font-size: 0.95rem;
            }

            .overlay-card-text {
                font-size: 0.8rem;
            }

            .overlay-card-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }

        @media (max-width: 992px) {
            .features-overlay-card {
                position: static !important;
                margin: 1rem auto;
                max-width: 100%;
                text-align: center;
            }

            .features-overlay-card.top-left,
            .features-overlay-card.bottom-right {
                top: auto !important;
                left: auto !important;
                bottom: auto !important;
                right: auto !important;
                position: static !important;
            }

            .features-image-container {
                margin-bottom: 2rem;
            }

            .method-card {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
                padding: 1.5rem;
            }

            .method-icon {
                align-self: center;
            }

            .feature-item-icon {
                width: 55px;
                height: 55px;
                font-size: 1.3rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
                justify-content: justify;
            }

            .hero-buttons {
                justify-content: center;
                flex-direction: column;
                align-items: center;
                gap: 0.75rem;
            }

            .btn-hero-primary,
            .btn-hero-secondary a {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
                width: 100%;
                max-width: 280px;
            }

            .section-title {
                font-size: 2rem;
                line-height: 1.3;
            }

            .section-subtitle {
                font-size: 1rem;
                padding: 0 1rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }

            .floating-elements {
                display: none;
            }

            .method-card {
                padding: 1.25rem;
                margin-bottom: 1rem;
            }

            .method-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            .method-title {
                font-size: 1.1rem;
            }

            .method-description {
                font-size: 0.9rem;
            }

            .feature-item {
                padding: 1.25rem;
                margin-bottom: 1rem;
            }

            .feature-item-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .feature-item-title {
                font-size: 1rem;
            }

            .feature-item-description {
                font-size: 0.85rem;
            }

            .teacher-card {
                margin-bottom: 1.5rem;
                padding: 1.5rem;
            }

            .teacher-avatar {
                width: 80px;
                height: 80px;
            }

            .testimonial-card {
                min-height: auto;
                padding: 1.5rem;
                margin-right: 1rem;
            }

            .faq-header {
                padding: 1rem;
                font-size: 0.95rem;
            }

            .faq-content {
                padding: 0 1rem;
            }

            .faq-content.open {
                padding: 0 1rem 1rem;
            }
        }

        @media (max-width: 576px) {
            body {
                font-size: 14px;
            }

            .hero-title {
                font-size: 2rem;
                line-height: 1.2;
            }

            .hero-subtitle {
                font-size: 1rem;
                justify-content: justify;
            }

            .section-title {
                font-size: 1.75rem;
                line-height: 1.3;
                margin-bottom: 0.75rem;
            }

            .section-subtitle {
                font-size: 0.95rem;
                margin-bottom: 2rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .stat-number {
                font-size: 1.75rem;
            }

            .stat-label {
                font-size: 0.9rem;
            }

            .method-card {
                padding: 1rem;
                border-radius: 12px;
            }

            .method-icon {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
                border-radius: 12px;
            }

            .method-title {
                font-size: 1rem;
                margin-bottom: 0.5rem;
            }

            .method-description {
                font-size: 0.85rem;
                line-height: 1.5;
            }

            .feature-item {
                padding: 1rem;
                border-radius: 12px;
            }

            .feature-item-icon {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
                border-radius: 12px;
                margin-bottom: 0.75rem;
            }

            .feature-item-title {
                font-size: 0.95rem;
                margin-bottom: 0.5rem;
            }

            .feature-item-description {
                font-size: 0.8rem;
                line-height: 1.4;
            }

            .teacher-card {
                padding: 1.25rem;
            }

            .teacher-avatar {
                width: 70px;
                height: 70px;
            }

            .teacher-name {
                font-size: 1rem;
            }

            .teacher-level {
                font-size: 0.85rem;
            }

            .teacher-description {
                font-size: 0.8rem;
            }

            .testimonial-card {
                padding: 1.25rem;
                margin-right: 0.75rem;
                flex: 0 0 90%;
            }

            .testimonial-text {
                font-size: 0.9rem;
            }

            .author-info h6 {
                font-size: 0.95rem;
            }

            .cta-title {
                font-size: 1.75rem;
                line-height: 1.3;
            }

            .cta-subtitle {
                font-size: 1rem;
            }

            .overlay-card-title {
                font-size: 0.9rem;
            }

            .overlay-card-text {
                font-size: 0.75rem;
            }

            .overlay-card-icon {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }
        }

        /* Extra small devices fixes */
        @media (max-width: 480px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .hero-section {
                padding: 100px 0 60px;
            }

            .stats-section {
                padding: 2rem 0;
            }

            .learning-method-section,
            .features-section,
            .teachers-section {
                padding: 3rem 0;
            }

            .testimonials-section,
            .faq-section,
            .cta-section {
                padding: 3rem 0;
            }

            .features-main-image {
                min-height: 250px;
            }

            .testimonial-card {
                flex: 0 0 95%;
                min-height: auto;
            }
        }

        /* Landscape phone adjustments */
        @media (max-width: 768px) and (orientation: landscape) {
            .hero-section {
                padding: 100px 0 40px;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 1.8rem;
                margin-top: 1rem;
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
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ url('/aus-bildung') }}">Aus Bildung</a></li> --}}
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
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
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Gerbang Eksklusif Menuju Masa Depan di<span
                            style="color: var(--accent-color);"> Jerman</span></h1>
                    <p class="hero-subtitle">Deutsch Lernen mit Fara bukan sekadar kursus bahasa. Kami adalah investasi
                        untuk masa depanmu. Dengan standar terbaik, tutor berpengalaman, dan pendekatan personal dari
                        level A1 hingga B2, kami memastikan anda siap studi/berkarir di Jerman.</p>
                    <div class="hero-buttons">
                        <a href="{{ url('/harga') }}" class="btn btn-hero-primary">Mulai Belajar</a>
                        <button class="btn btn-hero-secondary"><a class="text-decoration-none"
                                href="{{ url('/program') }}" target="_blank">Lihat Program</a></button>
                    </div>
                </div>
                <div class="col-lg-6 hero-images">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Learning German" class="img-fluid hero-image-main w-100">
                        <div class="floating-elements d-none d-lg-block">
                            <div class="floating-card">
                                <i class="bi bi-people-fill me-2 text-primary"></i>5.000+ Siswa
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="5000">
                        <span class="stat-number" data-count="5000">0+</span>
                        <span class="stat-label">Siswa</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="20">
                        <span class="stat-number" data-count="20">0+</span>
                        <span class="stat-label">Tutor</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="200">
                        <span class="stat-number" data-count="200">0+</span>
                        <span class="stat-label">Materi</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="50000">
                        <span class="stat-number" data-count="50000">0k+</span>
                        <span class="stat-label">Alumni</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learning Method Section -->
    <section class="learning-method-section">
        <div class="container">
            <h2 class="section-title">4 Pilar Metode Belajar</h2>
            <p class="section-subtitle">Belajar di sini tidak terburu-buru. Kapan anda stress, bisa istirahat dulu
                sambil cari kenapa anda benci Bahasa Jerman!</p>
            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Fleksibel</h4>
                            <p class="method-description">Jadwal belajar yang menyesuaikan kebutuhanmu, tetap konsisten
                                tanpa mengurangi kualitas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Sistematis</h4>
                            <p class="method-description">Kurikulum komprehensif dari A1 hingga B1, disertai evaluasi
                                progres yang transparan dan terukur.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Private Mentoring</h4>
                            <p class="method-description">Pendampingan personal dari tutor bersertifikasi, memberikan
                                arahan tepat sesuai tujuanmu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Interaktif</h4>
                            <p class="method-description">Pembelajaran aktif dan aplikatif, menghadirkan pengalaman yang
                                relevan dengan studi maupun karier di Jerman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title" style="margin-bottom: 3rem;">Belajar Bahasa Jerman dengan Kebebasan Tanpa Batas
            </h2>

            <!-- Main Content Row -->
            <div class="row align-items-center">
                <!-- Left Column - Image with overlays -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="features-image-container">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Learning German Online" class="features-main-image">

                        <!-- Purple Circle Accent -->
                        {{-- <div class="features-purple-circle">
                            <i class="bi bi-headphones"></i>
                        </div> --}}

                        <!-- Small Card - Bottom Right of Image -->
                        {{-- <div class="features-small-card d-none d-lg-block">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                alt="Online Learning" class="small-card-image">
                        </div> --}}
                    </div>
                </div>

                <!-- Right Column - Content -->
                <div class="col-lg-6 col-md-12">
                    <div class="features-content">
                        <p class="section-subtitle"
                            style="text-align: justify; margin-left: -0.1rem; margin-top: -3rem">Di DlmF, Anda bebas
                            memilih cara belajar yang paling sesuai: interaktif bersama tutor secara online/offline,
                            atau melalui kelas asinkronus yang dapat diakses kapan saja. Semua program dirancang dengan
                            metode efektif dan terarah, memastikan anda tetap berkembang dengan ritme belajar yang
                            fleksibel, dimanapun anda berada.</p>
                        <!-- Feature Points -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-3 mt-3">
                                <div class="feature-point">
                                    <i class="bi bi-clock feature-point-icon"></i>
                                    <span class="feature-point-text">Jadwal Fleksibel</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3 mt-3">
                                <div class="feature-point">
                                    <i class="bi bi-currency-dollar feature-point-icon"></i>
                                    <span class="feature-point-text">Harga Terjangkau</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <div class="feature-point">
                                    <i class="bi bi-laptop feature-point-icon"></i>
                                    <span class="feature-point-text">Kelas Online Interaktif</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <div class="feature-point">
                                    <i class="bi bi-award feature-point-icon"></i>
                                    <span class="feature-point-text">Pembelajaran Efektif & Terarah</span>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="mt-4 text-center text-lg-start">
                            <a href="https://wa.me/62859106869302" target="_blank" class="btn btn-cta">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp MinFara
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid - Bottom Section -->
            <div class="features-grid">
                <div class="row g-3 g-md-4">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            <h4 class="feature-item-title">Tutor Bersertifikasi</h4>
                            <p class="feature-item-description">Dipilih dengan ketat untuk memastikan kualitas
                                pembelajaran terbaik</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-journal-bookmark"></i>
                            </div>
                            <h4 class="feature-item-title">Materi Eksklusif & Selalu Terupdate</h4>
                            <p class="feature-item-description">Dirancang untuk kebutuhan akademis, profesional, dan
                                kehidupan nyata di Jerman</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-globe2"></i>
                            </div>
                            <h4 class="feature-item-title">Komunitas Alumni di Seluruh Dunia</h4>
                            <p class="feature-item-description">Jaringan global yang membuka peluang lebih luas di Eropa
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4 class="feature-item-title">5.000+ Pelajar</h4>
                            <p class="feature-item-description">Telah Mempercayakan Masa Depannya pada Kami</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
        <div class="container">
            <h2 class="section-title">Best Seller Programs</h2>
            <p class="section-subtitle">Kami menyediakan berbagai program pembelajaran yang disesuaikan dengan kebutuhan
                dan level kemampuan Anda</p>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Kelas Reguler Offline" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Reguler Offline</span>
                            <h5 class="course-title">Reguler A1 - B1</h5>
                            <p class="course-description">Dengan kurikulum sistematis, bimbingan tutor berpengalaman,
                                dan suasana kelas yang interaktif, anda akan menguasai Bahasa Jerman dengan fondasi yang
                                kuat.</p>

                            <a href="{{ url('/harga') }}" class="price-btn">
                                Lihat Detail Program <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Private Sprechen" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Private Speaking</span>
                            <h5 class="course-title">Private Sprechen mit Muttersprachler</h5>
                            <p class="course-description">Latihan berbicara langsung dengan penutur asli Jerman. Cocok
                                untuk Anda yang ingin meningkatkan kefasihan dan kepercayaan diri dalam komunikasi
                                sehari-hari maupun profesional.</p>
                            <a href="{{ url('/harga') }}" class="price-btn">
                                Lihat Detail Program <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="FlexiLearn Online" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Asinkronus</span>
                            <h5 class="course-title">Deutsch FlexiLearn (Asinkronus)</h5>
                            <p class="course-description">Kelas Bahasa Jerman yang dapat diakses kapan saja. Belajar
                                dengan materi eksklusif, video pembelajaran, dan latihan interaktif. Cocok untuk anda
                                yang membutuhkan fleksibilitas penuh.</p>
                            <a href="{{ url('/harga') }}" class="price-btn">
                                Lihat Detail Program <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Private Grammar" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Private</span>
                            <h5 class="course-title">Private Gramatik</h5>
                            <p class="course-description">Kelas Private Grammatik sangat cocok bagi anda yang ingin
                                mendalami grammatik tertentu dengan waktu dan kuantitas kelas yang dapat disesuaikan.
                            </p>
                            <a href="{{ url('/harga') }}" class="price-btn">
                                Lihat Detail Harga <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1434626881859-194d67b2b86f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Persiapan Ujian" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Preparation</span>
                            <h5 class="course-title">Kelas Persiapan Ujian</h5>
                            <p class="course-description">Kelas Persiapan Ujian sangat cocok bagi anda yang sedang
                                menyiapkan ujian sertifikasi Bahasa Jerman dengan waktu dan kuantitas kelas yang dapat
                                disesuaikan</p>
                            <a href="{{ url('/harga') }}" class="price-btn">
                                Lihat Detail Program <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Kelas Au Pair" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Au Pair</span>
                            <h5 class="course-title">Kelas Au Pair</h5>
                            <p class="course-description">Au Pair secara singkat adalah program pertukaran budaya antar
                                negara. Au Pair memberikan kesempatan bagi anak muda yang berusia 18 hingga 26 tahun.
                            </p>
                            <a href="{{ url('/harga') }}" class="price-btn">
                                Lihat Detail Program <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="teachers-section">
        <div class="container">
            <h2 class="section-title">Belajar Bersama Tutor Terpilih</h2>
            <p class="section-subtitle">Setiap tutor di DlmF dipilih melalui proses seleksi ketat, terdiri dari native
                speaker dan pengajar bersertifikasi yang berpengalaman dalam membimbing siswa menuju keberhasilan di
                Jerman./p>

            <div class="row mt-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/user.png') }}" alt="Frau Assyifa"
                            class="teacher-avatar">
                        <h5 class="teacher-name">Herr Yasin</h5>
                        <p class="teacher-level">German Tutor B1</p>
                        {{-- <p class="teacher-description">Magister Pendidikan Bahasa Jerman, Universitas Munich</p>
                        <p class="small text-primary">5+ tahun pengalaman</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Frau_Zahra.jpg') }}" alt="Frau Zahra"
                            class="teacher-avatar">
                        <h5 class="teacher-name">Frau Zahra</h5>
                        <p class="teacher-level">German Tutor B1</p>
                        {{-- <p class="teacher-description">Native Speaker dari Berlin, Sertifikat Goethe Institut</p>
                        <p class="small text-primary">8+ tahun pengalaman</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Frau_Olin.jpg') }}" alt="Frau Olin"
                            class="teacher-avatar">
                        <h5 class="teacher-name">Frau Olin</h5>
                        <p class="teacher-level">German Tutor B2</p>
                        {{-- <p class="teacher-description">PhD Linguistik, Spesialis Exam Preparation</p>
                        <p class="small text-primary">10+ tahun pengalaman</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Herr_Iqbal.png') }}" alt="Herr Iqbal"
                            class="teacher-avatar">
                        <h5 class="teacher-name">Herr Iqbal</h5>
                        <p class="teacher-level">German Tutor B2</p>
                        {{-- <p class="teacher-description">MBA International Business, Alumni DAAD Scholarship</p>
                        <p class="small text-primary">7+ tahun pengalaman</p> --}}
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/teachers') }}" class="btn btn-outline-custom">Lihat Semua Guru</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">Testimoni Siswa Kami</h2>
            <p class="section-subtitle">Dengarkan pengalaman langsung dari siswa-siswa yang telah berhasil menguasai
                bahasa Jerman bersama kami</p>

            <div class="testimonial-carousel mt-5">
                <!-- Testimonial cards -->
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Seru bgt! Walaupun kelas online tapi mudah di mengerti. Frau Zizah baik
                        dan sabar juga."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture1.jpg') }}" alt="Afriliana B" width="50"
                                height="50" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Afriliana B</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Pertama secara budget terjangkau. Terus pilihan jam kelasnya sangat
                        beragam, jadi sangat membantu buat yang sambil kerja. Terus Lehrerin nya sangat amat baik,
                        terlihat sangat menguasai bidangnya juga, jadi ilmu nya banyak banget yang didapet. Terus sabar,
                        apalagi kalau kelas malem."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture2.jpg') }}" alt="Luis Anastasia" width="50"
                                height="50" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Luis Anastasia</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"sangat membantu belajar bahasa jerman, kelasnya fun dan teman2nya
                        helpful👍🏻"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture3.jpg') }}" alt="Retta Anissa" width="50"
                                height="50" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Retta Anissa</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Aku muridnya Frau Tissa, aku mau berterimakasih banget sama tim Deutsch
                        lernen mit Fara yang udah ramah banget merespon aku selama masa les. Berkat methode belajar yang
                        diterapin Frau Tissa aku bisa ngelewatin proses belajar sampai lulus ujian tanpa kendala yang
                        berarti."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture4.jpg') }}" alt="Putri R.F" width="50"
                                height="50" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Putri R.F</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Love how passionate the teachers in DLmF"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture5.jpg') }}" alt="Kay Rool" width="50" height="50"
                                style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Kay Rool</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Menemukan kursus ini dari iklan Instagram dan langsung mendaftar.
                        Guru-gurunya sangat sabar & penjelasannya detail, membuat materi mudah dipahami. Sangat
                        direkomendasikan untuk belajar bahasa Jerman yang efisien, cepat, dan terjangkau!. Danke
                        Minfara, Frau Jara und Frau Tissa ❤️ "</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture11.jpg') }}" alt="EV" width="50" height="50"
                                style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>EV</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Frau Zizah baik banget pokoknya, tulus banget ngajarinnya, selalu
                        nanyain dan ngajarin dengan sabar meskipun aku agak lemot, lope banget pokoknya 🩷🩷🩷"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture6.png') }}" alt="Kia" width="50" height="50"
                                style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Kia</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"DlmF ist der beste Platz um Deutsch zu lernen. Ich habe an den Kurzen
                        A1-B1 teilgenommen. Und Letzten Monat habe ich auch den Gesprächsunterricht gemacht. Die
                        Lehrerin, Frau Inez, hat mir Deutsch sehr gut beigebracht.
                        Ich bin gerade in Deutschland und spreche gut Deutsch. Vielen vielen Dank DlmF ❤️ Grüße aus
                        Deutschland 🇩🇪"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture9.jpg') }}" alt="Citra Schwarz" width="50"
                                height="50" style="border-radius: 50%; object-fit: cover;">
                        </div>
                        <div class="author-info">
                            <h6>Citra Schwarz</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                        alt="FAQ Image" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title text-start">Freunde Bertanya, MinFara Menjawab</h2>
                    <p class="section-subtitle text-start">Temukan jawaban untuk pertanyaan yang sering diajukan tentang
                        program kursus bahasa Jerman kami</p>

                    <div class="faq-list mt-4">
                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Apakah kelas tersedia online atau offline?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Ya, kami menyediakan kelas online maupun offline. anda dapat memilih level sesuai
                                    kebutuhan: A1, A2, atau B1.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Di mana lokasi offline DlmF?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Lokasi kelas offline kami berada di Jalan Terusan Sari Asih No.76, Sarijadi, Kota
                                    Bandung. Indonesia</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Program apa saja yang tersedia di Deutsch lernen mit Fara?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kami menawarkan berbagai program belajar bahasa Jerman, antara lain: </p>
                                <ul>
                                    <li>Kelas reguler dan private (dari level A1 – B1)</li>
                                    <li>Kelas Sprechen mit Muttersprachler (speaking with native speaker)</li>
                                    <li>Kelas private grammatik & persiapan ujian A1 – B1 (dengan pengantar bahasa
                                        Indonesia atau Inggris)</li>
                                    <li>Kelas private anak (dengan pengantar bahasa Indonesia atau Inggris)</li>
                                    <li>Program pendampingan persiapan Au Pair</li>
                                    <li>Program kelas asinkronus (melalui website FlexiLearn)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Apa perbedaan kelas reguler dan private?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <ul>
                                    <li>Private: One-on-one dengan pengajar</li>
                                    <li>Reguler: 3 – 8 orang per kelas</li>
                                </ul>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Apa itu Program Au Pair?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Au Pair adalah program tinggal di Jerman bersama keluarga angkat. Selain membantu
                                    mereka menjaga anak, anda juga bisa belajar bahasa dan budaya Jerman secara
                                    langsung, plus mendapatkan uang saku dan pengalaman internasional yang bernilai.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Apakah ada sertifikat nya?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Ya, kami memberikan sertifikat keikutsertaan untuk setiap peserta. Jika ingin
                                    mendapatkan sertifikat resmi, anda dapat mengikuti ujian Goethe secara mandiri.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Apakah ada garansi?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kami memberikan garansi free class bagi siswa yang sudah mengikuti program di Deutsch
                                    lernen mit Fara tetapi belum lulus ujian (S&K berlaku).</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Aplikasi apa yang digunakan dalam proses belajar online?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kami menggunakan Microsoft Teams sebagai platform belajar. Semua kelas dan grup
                                    diskusi sudah terintegrasi di dalam aplikasi tersebut.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2 class="cta-title">Siap Studi & Berkarir di Jerman?</h2>
            <p class="cta-subtitle">Bergabunglah dengan ribuan siswa yang telah merasakan kemudahan belajar bahasa
                Jerman bersama kami di DlmF</p>
            <a href="https://wa.me/62859106869302" target="_blank" class="btn btn-hero-primary btn-lg"><i
                    class="bi bi-whatsapp me-2"></i>Konsultasi Sekarang</a>
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
                        <a href="https://www.instagram.com/deutschlernen.mit.fara/" target="_blank"
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Counter animation JS --}}
    <script>
        // Counter Animation Function
        function animateCounter(element, target, suffix = '+') {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }

                let displayValue;
                if (target >= 1000) {
                    if (target >= 50000) {
                        displayValue = Math.floor(current / 1000) + 'k';
                    } else {
                        displayValue = Math.floor(current).toLocaleString();
                    }
                } else {
                    displayValue = Math.floor(current);
                }

                element.textContent = displayValue + suffix;
            }, 20);
        }
    </script>
    {{-- End Counter animation JS --}}

    {{-- Stats Counter Observer --}}
    <script>
        // Stats Counter Observer
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statItem = entry.target;
                    const counter = statItem.querySelector('.stat-number');
                    const target = parseInt(statItem.dataset.target);

                    statItem.classList.add('animate');
                    animateCounter(counter, target);

                    statsObserver.unobserve(statItem);
                }
            });
        }, { threshold: 0.5 });
    </script>
    {{-- End Stats Counter Observer --}}

    {{-- FAQ Toggle Function with Animation --}}
    <script>
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
                }
            });

            // Toggle current FAQ item
            if (isOpen) {
                content.classList.remove('open');
                element.classList.remove('active');
            } else {
                content.classList.add('open');
                element.classList.add('active');
            }
        }
    </script>
    {{-- End FAQ Toggle Function with Animation --}}

    {{-- smooth scrolling --}}
    <script>
        // Smooth scrolling for navigation links
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

        // Animation on scroll for other elements
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);
    </script>
    {{-- End smooth scrolling --}}


    {{-- Navbar --}}
    <script>
        // Navbar background on scroll
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        });
    </script>
    {{-- End Navbar --}}

    {{-- Initialize Animations --}}
    <script>
        // Initialize all animations
        document.addEventListener('DOMContentLoaded', function () {
            // Observe stat items for counter animation
            document.querySelectorAll('.stat-item').forEach(el => {
                statsObserver.observe(el);
            });

            // Observe other elements for scroll animation
            document.querySelectorAll('.animate-on-scroll, .feature-card, .course-card, .teacher-card').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
    {{-- End Initialize Animations --}}

    {{-- Testimonial Carousel --}}
    <script>
        // Dynamic Testimonial Carousel
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = document.querySelector('.testimonial-carousel');
            const cards = carousel.querySelectorAll('.testimonial-card');

            if (!carousel || cards.length === 0) return;

            // Setup carousel untuk infinite loop
            function setupCarousel() {
                const cardWidth = 420; // Disesuaikan dengan CSS flex: 0 0 420px
                const gap = 32; // 2rem = 32px
                const totalWidth = (cardWidth + gap) * cards.length;

                // Clone semua cards untuk seamless loop
                cards.forEach(card => {
                    const clone = card.cloneNode(true);
                    carousel.appendChild(clone);
                });

                // Hitung jarak scroll dan durasi animasi
                const scrollDistance = totalWidth;
                const animationDuration = cards.length * 8; // 8 detik per card

                // Set CSS custom properties
                document.documentElement.style.setProperty('--scroll-distance', `-${scrollDistance}px`);
                document.documentElement.style.setProperty('--animation-duration', `${animationDuration}s`);

                // Reset posisi saat animasi selesai untuk seamless loop
                carousel.addEventListener('animationiteration', function () {
                    // Reset transform tanpa animasi
                    carousel.style.animation = 'none';
                    carousel.style.transform = 'translateX(0)';

                    // Restart animasi setelah frame berikutnya
                    requestAnimationFrame(() => {
                        carousel.style.animation = '';
                    });
                });
            }

            // Jalankan setup
            setupCarousel();

            // Handle responsive behavior
            let resizeTimeout;
            window.addEventListener('resize', function () {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    // Recalculate untuk responsive
                    const isMobile = window.innerWidth <= 768;
                    const isSmallMobile = window.innerWidth <= 576;

                    let cardWidth;
                    if (isSmallMobile) {
                        cardWidth = 300;
                    } else if (isMobile) {
                        cardWidth = 340;
                    } else {
                        cardWidth = 420;
                    }

                    const gap = 32;
                    const totalWidth = (cardWidth + gap) * cards.length;

                    document.documentElement.style.setProperty('--scroll-distance', `-${totalWidth}px`);
                }, 250);
            });
        });
    </script>
    {{-- End Testimonial Carousel --}}
</body>

</html>
