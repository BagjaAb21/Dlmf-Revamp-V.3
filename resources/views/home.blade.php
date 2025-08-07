<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Deutsch Lernen mit Fara</title>
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
            color: var(--text-dark);
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

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
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

        .btn-hero-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-hero-secondary:hover {
            background: white;
            color: var(--primary-color);
        }

        .hero-images {
            position: relative;
        }

        .hero-image-main {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 2rem;
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
        }

        .course-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.15);
        }

        .course-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .course-content {
            padding: 1.5rem;
        }

        .course-badge {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .course-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-dark);
        }

        .course-instructor {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748B;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .instructor-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary-color);
        }

        .course-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
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
        }

        .teacher-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.1);
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

        /* Testimonials Section with Carousel */
        .testimonials-section {
            padding: 5rem 0;
            overflow: hidden;
        }

        .testimonial-carousel {
            display: flex;
            animation: scroll 20s linear infinite;
            width: calc(100% * 2);
        }

        .testimonial-carousel:hover {
            animation-play-state: paused;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-color);
            flex: 0 0 33.333%;
            margin-right: 2rem;
            min-height: 280px;
        }

        .testimonial-rating {
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
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
        }

        .author-info h6 {
            margin: 0;
            font-weight: 600;
            color: var(--text-dark);
        }

        .author-info small {
            color: #64748B;
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
            padding: 3rem 0 1rem;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #94A3B8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #334155;
            padding-top: 1rem;
            margin-top: 2rem;
            text-align: center;
            color: white;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
            line-height: 1.8;
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
            }

            .hero-buttons {
                justify-content: center;
                flex-direction: column;
                align-items: center;
                gap: 0.75rem;
            }

            .btn-hero-primary,
            .btn-hero-secondary {
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

            .course-card {
                margin-bottom: 1.5rem;
            }

            .course-image {
                height: 250px;
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

            .course-content {
                padding: 1rem;
            }

            .course-title {
                font-size: 1rem;
            }

            .course-price {
                font-size: 1.1rem;
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

            .footer-logo {
                font-size: 1.25rem;
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
            .courses-section,
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

            .course-image {
                height: 200px;
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
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
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
                    <h1 class="hero-title">Kursus Bahasa Jerman Terpercaya di <span
                            style="color: var(--accent-color);">Indonesia</span></h1>
                    <p class="hero-subtitle">Bergabunglah dengan ribuan pelajar yang telah berhasil menguasai bahasa
                        Jerman bersama kami. Dari level A1 hingga C2, kami siap membantu perjalanan belajar Anda.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-hero-primary">Mulai Belajar</a>
                        <button class="btn btn-hero-secondary">Tonton Video</button>
                    </div>
                </div>
                <div class="col-lg-6 hero-images">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Learning German" class="img-fluid hero-image-main w-100">
                        <div class="floating-elements d-none d-lg-block">
                            <div class="floating-card">
                                <i class="bi bi-people-fill me-2 text-primary"></i>5.576+ Siswa
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
                    <div class="stat-item" data-target="5576">
                        <span class="stat-number" data-count="5576">0+</span>
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
            <h2 class="section-title">Cara Belajar di DlmF</h2>
            <p class="section-subtitle">Belajar di sini tak dengan buru-buru. Kapan kamu stress, bisa istirahat dulu
                sambil cari kenapa kamu benci Bahasa Jerman!</p>

            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Fleksibel</h4>
                            <p class="method-description">Wujudkan waktu belajar sesuai jadwal dan kebutuhanmu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Sistematis</h4>
                            <p class="method-description">Belajar dari A-Z kursus target pass, komplit progress skill
                                Learning > Testing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Private Mentoring</h4>
                            <p class="method-description">Diskusi belajar dengan personal untuk solusi progress belajar
                                lebih cepat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="method-card animate-on-scroll">
                        <div class="method-icon">
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                        <div class="method-content">
                            <h4 class="method-title">Interaktif</h4>
                            <p class="method-description">Tutor kelas belajar lebih hidup dan relax.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Akses Belajar Bahasa Jerman dari Mana Saja, Kapan Saja</h2>

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
                        <p class="section-subtitle" style="text-align: justify; margin-left: -0.1rem">Di DlmF, kamu bisa belajar bahasa Jerman secara online maupun
                                offline dengan jadwal yang fleksibel dan metode pengajaran yang menyenangkan. Tak perlu
                                khawatir jarak atau waktu semua materi kami bisa diakses sesuai kebutuhanmu. Dapatkan
                                pengalaman belajar yang interaktif, efektif, dan bisa kamu jalani dari rumah, kampus,
                                atau bahkan tempat kerja.</p>
                        <!-- Feature Points -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-3">
                                <div class="feature-point">
                                    <i class="bi bi-clock feature-point-icon"></i>
                                    <span class="feature-point-text">Jadwal Fleksibel</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
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
                                <i class="bi bi-heart"></i>
                            </div>
                            <h4 class="feature-item-title">Fleksibel</h4>
                            <p class="feature-item-description">Bisa pilih waktu belajar sesuai jadwal dan kebutuhanmu
                                tanpa terikat waktu tertentu</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <h4 class="feature-item-title">Sistematis</h4>
                            <p class="feature-item-description">Setiap level punya target jelas dengan kurikulum
                                terstruktur dari A1 hingga C2</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4 class="feature-item-title">Private Mentoring</h4>
                            <p class="feature-item-description">Tersedia sesi bimbingan personal one-on-one untuk
                                percepatan progress belajar</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="feature-item animate-on-scroll">
                            <div class="feature-item-icon">
                                <i class="bi bi-emoji-smile"></i>
                            </div>
                            <h4 class="feature-item-title">Interaktif</h4>
                            <p class="feature-item-description">Diskusi langsung dengan native speaker dan tutor
                                berpengalaman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
        <div class="container">
            <h2 class="section-title">Pilih Program Kursus Bahasa Jerman Sesuai Tujuanmu</h2>
            <p class="section-subtitle">Kami menyediakan berbagai program pembelajaran yang disesuaikan dengan kebutuhan
                dan level kemampuan Anda</p>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="A1 - A2 Basic Course" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Reguler Offline</span>
                            <h5 class="course-title">Super Intensif Reguler Offline</h5>
                            <div class="course-instructor">
                                <div class="instructor-avatar"></div>
                                <span>Frau Carla</span>
                            </div>
                            <div class="course-price">Rp1.750.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="B1 - B2 Intermediate" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Reguler Online</span>
                            <h5 class="course-title">Super Intensif Reguler Online</h5>
                            <div class="course-instructor">
                                <div class="instructor-avatar"></div>
                                <span>Frau Zahra</span>
                            </div>
                            <div class="course-price">Rp2.250.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Business German" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Persiapan</span>
                            <h5 class="course-title">Persiapan Ujian</h5>
                            <div class="course-instructor">
                                <div class="instructor-avatar"></div>
                                <span>Herr Mueller</span>
                            </div>
                            <div class="course-price">Rp3.500.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Exam Preparation" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Au Pair</span>
                            <h5 class="course-title">Kelas Au Pair</h5>
                            <div class="course-instructor">
                                <div class="instructor-avatar"></div>
                                <span>Frau Schmidt</span>
                            </div>
                            <div class="course-price">Rp2.750.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Business German" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Private</span>
                            <h5 class="course-title">Business German</h5>
                            <div class="course-instructor">
                                <div class="instructor-avatar"></div>
                                <span>Herr Mueller</span>
                            </div>
                            <div class="course-price">Rp3.500.000</div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Exam Preparation" class="course-image">
                        <div class="course-content">
                            <span class="course-badge">Preparation</span>
                            <h5 class="course-title">Exam Preparation</h5>
                            <div class="course-instructor">
                                <div class="instructor-avatar"></div>
                                <span>Frau Schmidt</span>
                            </div>
                            <div class="course-price">Rp2.750.000</div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="teachers-section">
        <div class="container">
            <h2 class="section-title">Belajar Bersama Tutor Terbaik</h2>
            <p class="section-subtitle">Tim pengajar kami terdiri dari native speaker dan tutor berpengalaman yang siap
                membantu perjalanan belajar Anda</p>

            <div class="row mt-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Frau Carla" class="teacher-avatar">
                        <h5 class="teacher-name">Frau Carla</h5>
                        <p class="teacher-level">German Tutor A1-A2</p>
                        <p class="teacher-description">Magister Pendidikan Bahasa Jerman, Universitas Munich</p>
                        <p class="small text-primary">5+ tahun pengalaman</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Herr Mueller" class="teacher-avatar">
                        <h5 class="teacher-name">Herr Mueller</h5>
                        <p class="teacher-level">German Tutor B1-B2</p>
                        <p class="teacher-description">Native Speaker dari Berlin, Sertifikat Goethe Institut</p>
                        <p class="small text-primary">8+ tahun pengalaman</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Frau Schmidt" class="teacher-avatar">
                        <h5 class="teacher-name">Frau Schmidt</h5>
                        <p class="teacher-level">German Tutor C1-C2</p>
                        <p class="teacher-description">PhD Linguistik, Spesialis Exam Preparation</p>
                        <p class="small text-primary">10+ tahun pengalaman</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                            alt="Frau Zahra" class="teacher-avatar">
                        <h5 class="teacher-name">Frau Zahra</h5>
                        <p class="teacher-level">German Tutor Business</p>
                        <p class="teacher-description">MBA International Business, Alumni DAAD Scholarship</p>
                        <p class="small text-primary">7+ tahun pengalaman</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary">Lihat Semua Guru</a>
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
                <!-- First set of testimonials -->
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">"Happy bgt bisa diterima gk kerasa udah hampir 3 tahun di Jerman, dari
                        nggak tau apa-apa bisa bahasa germany sekarang, alhamdulillah bisa dapat fellowship kesini 🤲"
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar"></div>
                        <div class="author-info">
                            <h6>Ayu Permatasari</h6>
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
                    <p class="testimonial-text">"Ternyata belajar bahasa itu bukan sepenuhnya susah. Asal ada tekad dan
                        menggunakan platform yang tepat lagi yang mudah dipahami juga seperti DlmF"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar"></div>
                        <div class="author-info">
                            <h6>Zahra Permatasari</h6>
                            <small>Mahasiswa</small>
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
                    <p class="testimonial-text">"Alhamdulillah rog mamah, gara-gara ikut program ini saya bisa dapet
                        beasiswa. Itu yang gue cari setelah berbulan bulan susah cari online"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar"></div>
                        <div class="author-info">
                            <h6>Salsa</h6>
                            <small>Pekerja</small>
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
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Lokasi DlmF itu ada dimana aja MinFar?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>DlmF memiliki cabang di Jakarta, Bandung, Surabaya, dan Yogyakarta. Kami juga
                                    menyediakan kelas online untuk siswa di seluruh Indonesia.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
                                Berapa di DlmF online atau offline ya, MinFar?
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>
                            <div class="faq-content">
                                <p>Kami menyediakan kedua opsi. Kelas online mulai dari Rp 750.000 dan kelas offline
                                    mulai dari Rp 1.250.000 per level, tergantung program yang dipilih.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-header" onclick="toggleFaq(this)">
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
        <div class="container text-center">
            <h2 class="cta-title">Siap Mulai Belajar Bahasa Jerman?</h2>
            <p class="cta-subtitle">Wujudkan impian Anda untuk menguasai bahasa Jerman bersama tutor terbaik dan metode
                pembelajaran yang terbukti efektif</p>
            <a href="#" class="btn btn-hero-primary btn-lg">Mulai Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="footer-logo">
                        <img src="{{ asset('asset/img/logo/logo-bulet.png') }}" style="width: 180px;" alt="Logo-Mitfara-Bulat">
                    </div>
                    <h2 class="mb-3"><b>Deutsch Lernen Mit Fara</b></h2>
                    <p class="mb-2">📍 Jalan Trengguli Sari Asri No. 79, Semarang, Semarang, Jawa Tengah, Indonesia</p>
                    <p class="mb-2">📞 +62 896 7576 5648</p>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
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
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-0">© 2025 PT Fara Kreatif Sejahtera. All Right Reserved</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none" style="color: white">Terms</a>
                        <a href="#" class="text-decoration-none" style="color: white">Privacy</a>
                        <a href="#" class="text-decoration-none" style="color: white">Legal</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>
