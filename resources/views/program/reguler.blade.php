<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Kelas Reguler - DlmF</title>
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
            background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        }

        .program-img.small1 {
            background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        .program-img.small2 {
            background-image: url('https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80');
        }

        /* Level Section */
        .level-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .level-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .level-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary-color);
        }

        .level-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .level-badge {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .level-description {
            color: var(--text-dark);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .level-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-dark);
            margin: 0.5rem 0;
            font-size: 0.95rem;
        }

        .level-info i {
            color: var(--primary-color);
        }

        /* Schedule Section */
        .schedule-section {
            padding: 5rem 0;
            background: white;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .schedule-card {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(168, 85, 247, 0.05));
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .schedule-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.15);
        }

        .schedule-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .schedule-time {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 0.5rem;
        }

        .schedule-label {
            font-size: 1rem;
            color: var(--text-dark);
            opacity: 0.8;
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
            margin-bottom: 3rem;
            opacity: 0.8;
            position: relative;
            z-index: 1;
        }

        /* Pricing Tabs */
        .pricing-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 50px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .pricing-tab {
            background: white;
            padding: 12px 30px;
            border-radius: 30px;
            border: 2px solid #E2E8F0;
            cursor: pointer;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pricing-tab:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .pricing-tab.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-color: var(--primary-color);
        }

        /* Pricing Grid */
        .pricing-grid {
            display: none;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            max-width: 1300px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .pricing-grid.active {
            display: grid;
        }

        .pricing-card {
            background: white;
            border-radius: 25px;
            padding: 2rem 1.5rem;
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
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(124, 58, 237, 0.1);
        }

        .pricing-type {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            line-height: 1.3;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pricing-price {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .pricing-features li {
            padding: 0.7rem 0;
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
            font-size: 0.9rem;
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

        /* Responsive */
        @media (max-width: 1200px) {
            .pricing-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1.5rem;
            }
        }

        @media (max-width: 968px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .pricing-tabs {
                flex-direction: column;
                align-items: stretch;
            }

            .pricing-card {
                padding: 2.5rem;
            }

            .pricing-type {
                font-size: 1.4rem;
                min-height: auto;
            }

            .pricing-price {
                font-size: 2.2rem;
            }

            .pricing-features li {
                font-size: 1rem;
                padding: 0.8rem 0;
            }
        }

        @media (max-width: 768px) {
            .pricing-title {
                font-size: 2rem;
            }

            .pricing-subtitle {
                font-size: 1rem;
            }
        }

        /* Benefits Section - Enhanced Styling */
        .benefits-section {
            padding: 5rem 0;
            background: white;
            position: relative;
        }

        .benefits-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(180deg, rgba(124, 58, 237, 0.03) 0%, transparent 100%);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2.5rem;
            margin-top: 3rem;
            position: relative;
            z-index: 1;
        }

        .benefit-card {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.04), rgba(168, 85, 247, 0.04));
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .benefit-card::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .benefit-card:hover::before {
            width: 400px;
            height: 400px;
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
            position: relative;
            z-index: 1;
        }

        .benefit-card:hover .benefit-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .benefit-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .benefit-text {
            color: var(--text-dark);
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        /* Responsive Updates */
        @media (max-width: 1200px) {
            .pricing-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            @media (max-width: 1400px) {
                .pricing-grid {
                    grid-template-columns: repeat(4, 1fr);
                    gap: 1.2rem;
                }

                .pricing-card {
                    padding: 1.8rem 1.2rem;
                }
            }

            @media (max-width: 1200px) {
                .pricing-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 2rem;
                }

                .pricing-card {
                    padding: 2.5rem;
                }

                .pricing-type {
                    font-size: 1.4rem;
                    min-height: auto;
                }

                .pricing-price {
                    font-size: 2.2rem;
                }

                .pricing-features li {
                    font-size: 1rem;
                    padding: 0.8rem 0;
                }
            }

            .benefits-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
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

            .level-cards,
            .schedule-grid {
                grid-template-columns: 1fr;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .benefits-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .program-title,
            .pricing-title,
            .cta-content h3 {
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

            .benefits-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .social-links {
                justify-content: center;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
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

            .level-cards,
            .schedule-grid,
            .benefits-grid {
                grid-template-columns: 1fr;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .program-title,
            .pricing-title,
            .cta-content h3 {
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
                <h1>Program Kelas Reguler <br> Bahasa Jerman</h1>
                <p>Belajar bahasa Jerman secara sistematis dari level A1 hingga B1 dengan jadwal fleksibel dan metode
                    pembelajaran yang efektif</p>
            </div>
        </div>
    </section>

    <!-- Program Overview Section -->
    <section class="program-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="program-badge">Program Reguler</span>
                    <h2 class="program-title">Tentang Program Kelas Reguler</h2>
                </div>
            </div>
            <div class="program-content">
                <div class="program-text">
                    <p>Program kelas reguler bahasa Jerman ini dirancang untuk semua kalangan, termasuk bagi anda yang
                        benar-benar pemula. Jika belum pernah belajar bahasa Jerman sama sekali, anda bisa langsung
                        memulai dari level A1, yang memang dibuat khusus untuk pemula.</p>

                    <div class="highlight-box">
                        <p><strong>Saat ini tersedia kelas level A1 hingga B1</strong>, sementara level B2 sedang dalam
                            tahap persiapan.</p>
                    </div>

                    <p>Setiap level reguler terdiri dari <strong>40 kali pertemuan</strong> dan umumnya dapat
                        diselesaikan dalam waktu <strong>2 bulan</strong>. Kelas dilaksanakan <strong>Senin hingga
                            Jumat</strong> dengan durasi <strong>2 jam per pertemuan</strong>.</p>

                    <p>Bagi yang sudah pernah belajar bahasa Jerman sebelumnya, tersedia juga <strong>placement
                            test</strong> untuk menentukan level yang paling sesuai dengan kemampuan anda saat ini.</p>
                </div>
                <div class="program-images">
                    <div class="program-img large"></div>
                    <div class="program-img small1"></div>
                    <div class="program-img small2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Level Section -->
    <section class="level-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Level Tersedia</span>
                <h2 class="program-title">Temukan Level yang Tepat untuk Perjalanan Belajarmu</h2>
                <p class="pricing-subtitle">Setiap level disusun dengan kurikulum terarah dan sistematis untuk
                    memastikan kemajuan belajar yang optimal.</p>
            </div>

            <div class="level-cards">
                <div class="level-card">
                    <div class="level-badge">Level A1</div>
                    <div class="level-description">
                        Level dasar bagi pemula yang baru mulai belajar bahasa Jerman dari nol. Fokus pada kosakata dan
                        struktur kalimat sederhana untuk komunikasi sehari-hari.
                    </div>
                    <div class="level-info">
                        <i class="bi bi-calendar-check"></i>
                        <span>40 pertemuan (2 bulan)</span>
                    </div>
                    <div class="level-info">
                        <i class="bi bi-clock"></i>
                        <span>2 jam per pertemuan</span>
                    </div>
                </div>

                <div class="level-card">
                    <div class="level-badge">Level A2</div>
                    <div class="level-description">
                        Tahapan lanjutan untuk memperdalam kemampuan berkomunikasi dalam situasi umum. Peserta mulai
                        mampu memahami percakapan dan teks sederhana dalam konteks kehidupan sehari-hari.
                    </div>
                    <div class="level-info">
                        <i class="bi bi-calendar-check"></i>
                        <span>40 pertemuan (2 bulan)</span>
                    </div>
                    <div class="level-info">
                        <i class="bi bi-clock"></i>
                        <span>2 jam per pertemuan</span>
                    </div>
                </div>

                <div class="level-card">
                    <div class="level-badge">Level B1</div>
                    <div class="level-description">
                        Level menengah bagi peserta yang ingin meningkatkan kelancaran berbicara dan memahami topik yang
                        lebih kompleks. Ditekankan pada kepercayaan diri dalam berinteraksi dan kesiapan menghadapi
                        ujian sertifikasi.
                    </div>
                    <div class="level-info">
                        <i class="bi bi-calendar-check"></i>
                        <span>40 pertemuan (2 bulan)</span>
                    </div>
                    <div class="level-info">
                        <i class="bi bi-clock"></i>
                        <span>2 jam per pertemuan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="schedule-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Jadwal Kelas</span>
                <h2 class="program-title">Pilih Waktu yang Sesuai untuk Anda</h2>
                <p class="pricing-subtitle">Kelas dilaksanakan Senin - Jumat dengan berbagai pilihan waktu</p>
            </div>

            <div class="schedule-grid">
                <div class="schedule-card">
                    <div class="schedule-icon">
                        <i class="bi bi-sunrise"></i>
                    </div>
                    <div class="schedule-time">07.00 - 09.00 WIB</div>
                    <div class="schedule-label">Morgen (Pagi)</div>
                </div>

                <div class="schedule-card">
                    <div class="schedule-icon">
                        <i class="bi bi-sun"></i>
                    </div>
                    <div class="schedule-time">10.00 - 12.00 WIB</div>
                    <div class="schedule-label">Vormittag (Siang)</div>
                </div>

                <div class="schedule-card">
                    <div class="schedule-icon">
                        <i class="bi bi-moon-stars"></i>
                    </div>
                    <div class="schedule-time">19.00 - 21.00 WIB</div>
                    <div class="schedule-label">Abend (Malam)</div>
                </div>

                <div class="schedule-card">
                    <div class="schedule-icon">
                        <i class="bi bi-moon"></i>
                    </div>
                    <div class="schedule-time">20.00 - 22.00 WIB</div>
                    <div class="schedule-label">Nacht (Larut Malam)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="container">
            <h3 class="pricing-title">Biaya Investasi</h3>
            <p class="pricing-subtitle">Pilih format kelas yang sesuai dengan kebutuhanmu</p>

            <!-- Pricing Tabs -->
            <div class="pricing-tabs">
                <div class="pricing-tab active" onclick="switchClassTab('online')">
                    <i class="bi bi-laptop"></i>
                    <span>Online Class</span>
                </div>
                <div class="pricing-tab" onclick="switchClassTab('offline')">
                    <i class="bi bi-person-workspace"></i>
                    <span>Offline Class</span>
                </div>
            </div>

            <!-- Online Class Grid -->
            <div class="pricing-grid active" id="online">
                <!-- Online A1 -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Online Class - Level A1</h4>
                        <div class="pricing-price">Rp 1.499.000</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>20x pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Konsultasi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free akses video record kelas 24/7</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 20 e-book Bahasa jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 1x sesi kelasan dengan native</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Include simulasi ujian Goethe 8x</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat</span>
                        </li>
                    </ul>

                    <button class="pricing-button"
                        onclick="pilihPaketProgram('Online Class - Level A1', 'Rp 1.499.000')">Daftar Sekarang</button>
                </div>

                <!-- Online A2 -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Online Class - Level A2</h4>
                        <div class="pricing-price">Rp 1.499.000</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>20x pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Konsultasi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free akses video record kelas 24/7</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 20 e-book Bahasa jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 1x sesi kelasan dengan native</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Include simulasi ujian Goethe 8x</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat</span>
                        </li>
                    </ul>

                    <button class="pricing-button"
                        onclick="pilihPaketProgram('Online Class - Level A2', 'Rp 1.499.000')">Daftar Sekarang</button>
                </div>

                <!-- Online B1 -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Online Class - Level B1</h4>
                        <div class="pricing-price">Rp 1.699.000</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>20x pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Konsultasi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free akses video record kelas 24/7</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 20 e-book Bahasa jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 1x sesi kelasan dengan native</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Include simulasi ujian Goethe 8x</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat</span>
                        </li>
                    </ul>

                    <button class="pricing-button"
                        onclick="pilihPaketProgram('Online Class - Level B1', 'Rp 1.699.000')">Daftar Sekarang</button>
                </div>
            </div>

            <!-- Offline Class Grid -->
            <div class="pricing-grid" id="offline">
                <!-- Offline Level A1 -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Offline Class - Level A1</h4>
                        <div class="pricing-price">Rp 2.099.000</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>20x pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Konsultasi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 20 e-book Bahasa jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 1x sesi kelasan dengan native</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Include simulasi ujian Goethe 8x</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat</span>
                        </li>
                    </ul>

                    <button class="pricing-button"
                        onclick="pilihPaketProgram('Offline Class - Level A1', 'Rp 2.099.000')">Daftar Sekarang</button>
                </div>
                <!-- Offline Level A2 -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Offline Class - Level A2</h4>
                        <div class="pricing-price">Rp 2.099.000</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>20x pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Konsultasi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 20 e-book Bahasa jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 1x sesi kelasan dengan native</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Include simulasi ujian Goethe 8x</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat</span>
                        </li>
                    </ul>

                    <button class="pricing-button"
                        onclick="pilihPaketProgram('Offline Class - Level A2', 'Rp 2.099.000')">Daftar Sekarang</button>
                </div>
                <!-- Offline Level A1 -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4 class="pricing-type">Offline Class - Level B1</h4>
                        <div class="pricing-price">Rp 2.250.000</div>
                    </div>

                    <ul class="pricing-features">
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>20x pertemuan</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Modul</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free Konsultasi</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 20 e-book Bahasa jerman</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free 1x sesi kelasan dengan native</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Include simulasi ujian Goethe 8x</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sertifikat</span>
                        </li>
                    </ul>

                    <button class="pricing-button"
                        onclick="pilihPaketProgram('Offline Class - Level B1', 'Rp 2.250.000')">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </section>


    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="text-center">
                <span class="program-badge">Benefit</span>
                <h2 class="program-title">Apa Yang Akan Kamu Dapatkan?</h2>
                <p class="pricing-subtitle">Fasilitas lengkap untuk mendukung proses belajar bahasa Jermanmu secara
                    optimal</p>
            </div>

            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <h4 class="benefit-title">Modul Eksklusif</h4>
                    <p class="benefit-text">Modul digital (PDF) dan buku cetak yang disusun secara terstruktur. Mudah
                        dipahami dan praktis digunakan di setiap level.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-camera-video"></i>
                    </div>
                    <h4 class="benefit-title">Rekaman Kelas</h4>
                    <p class="benefit-text">Setiap sesi pembelajaran direkam agar kamu bisa menonton ulang kapan pun dan
                        memperdalam materi dengan nyaman.
                    </p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h4 class="benefit-title">Konsultasi Tutor</h4>
                    <p class="benefit-text">Bebas berdiskusi dan berkonsultasi langsung dengan tutor di luar jam kelas
                        untuk memastikan kamu benar-benar paham materi.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4 class="benefit-title">Fleksibilitas Jadwal</h4>
                    <p class="benefit-text">Pilih waktu belajar sesuai rutinitasmu. Tersedia kelas pagi, siang, hingga
                        malam, menyesuaikan kebutuhan dan kenyamananmu.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4 class="benefit-title">Kelas Interaktif</h4>
                    <p class="benefit-text">Belajar jadi lebih seru lewat metode komunikatif dan latihan langsung,
                        mendorong kamu aktif berbicara sejak awal.
                    </p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h4 class="benefit-title">Kelas dengan Native Speaker</h4>
                    <p class="benefit-text">Rasakan pengalaman belajar otentik bersama pengajar penutur asli Jerman
                        untuk melatih pelafalan dan kepercayaan diri berbicara.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Waktunya Wujudkan Mimpi ke Jerman!</h2>
            <p class="mb-4">Konsultasikan langkah pertamamu bersama tim kami.</p>
            <a href="https://api.whatsapp.com/send/?phone=6289647897616&text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.&type=phone_number&app_absent=0"
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
        // Switch Class Tab Function
        function switchClassTab(tabType) {
            // Remove active class from all tabs
            document.querySelectorAll('.pricing-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Remove active class from all grids
            document.querySelectorAll('.pricing-grid').forEach(grid => {
                grid.classList.remove('active');
            });

            // Add active class to clicked tab
            event.target.closest('.pricing-tab').classList.add('active');

            // Show corresponding grid
            document.getElementById(tabType).classList.add('active');
        }

        // WhatsApp Function for Program
        function pilihPaketProgram(namaPaket, harga) {
            const nomorWA = '6289647897616';
            const pesan = `Halo MinFara, saya tertarik untuk mendaftar *Kelas Reguler*.%0A%0A*Paket yang dipilih:* ${namaPaket}%0A*Harga:* ${harga}%0A%0AMohon informasi lebih lanjut untuk proses pendaftaran. Terima kasih!`;

            const urlWA = `https://api.whatsapp.com/send?phone=${nomorWA}&text=${pesan}`;
            window.open(urlWA, '_blank');
        }
    </script>
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
                    const whatsappUrl = "https://wa.me/6289647897616?text=Hallo+MinFara%2C+saya+tertarik+untuk+mendaftar+Program+Kelas+Reguler+Bahasa+Jerman+di+Deutsch+lernen+Mit+Fara.+Saya+ingin+bertanya+tentang+program+yang+ditawarkan.";
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
            const cards = document.querySelectorAll('.level-card, .schedule-card, .benefit-card, .pricing-card');
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
