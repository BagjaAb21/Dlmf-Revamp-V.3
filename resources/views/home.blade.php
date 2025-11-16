<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Essential Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title>Kursus Bahasa Jerman Online & Offline Premium | Deutsch Lernen mit Fara</title>
    <meta name="description"
        content="Belajar bahasa Jerman online & offline dari level A1-B2 bersama DlmF. Tutor bersertifikasi, metode interaktif, jadwal fleksibel. Program Au Pair, persiapan ujian Goethe & TestDaF. Daftar sekarang!">
    <meta name="keywords"
        content="kursus bahasa jerman, belajar bahasa jerman online, les bahasa jerman, kursus jerman bandung, deutsch lernen, belajar jerman A1, kursus jerman A2, program au pair, goethe institute, testdaf preparation">
    <meta name="author" content="Deutsch Lernen mit Fara">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">


    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Language & Geographic -->
    <meta name="language" content="Indonesian">
    <meta name="geo.region" content="ID-JB">
    <meta name="geo.placename" content="Bandung">
    <meta name="geo.position" content="-6.914744;107.609810">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Kursus Bahasa Jerman Online & Offline Premium | Deutsch Lernen mit Fara">
    <meta property="og:description"
        content="Belajar bahasa Jerman online & offline dari level A1-B2 bersama DlmF. Tutor bersertifikasi, metode interaktif, jadwal fleksibel. Daftar sekarang!">
    <meta property="og:image" content="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Deutsch Lernen mit Fara">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="Kursus Bahasa Jerman Online & Offline Premium | Deutsch Lernen mit Fara">
    <meta name="twitter:description"
        content="Belajar bahasa Jerman online & offline dari level A1-B2 bersama DlmF. Tutor bersertifikasi, metode interaktif, jadwal fleksibel.">
    <meta name="twitter:image" content="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- JSON-LD Schema Markup - Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "Deutsch Lernen mit Fara",
        "alternateName": "DlmF",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('asset/img/logo/logo-Transparant3.png') }}",
        "description": "Kursus bahasa Jerman online dan offline premium dari level A1 hingga B2 dengan tutor bersertifikasi dan metode pembelajaran interaktif",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jalan Terusan Sari Asih No. 76, Sarijadi, Sukasari",
            "addressLocality": "Bandung",
            "addressRegion": "Jawa Barat",
            "postalCode": "40151",
            "addressCountry": "ID"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-896-4789-7616",
            "contactType": "Customer Service",
            "availableLanguage": ["Indonesian", "German", "English"]
        },
        "sameAs": [
            "https://www.instagram.com/deutschlernen.mit.fara/",
            "https://www.facebook.com/deutschlernenmitfara"
        ],
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "500",
            "bestRating": "5",
            "worstRating": "1"
        }
    }
    </script>

    <!-- JSON-LD Schema Markup - Course -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Course",
        "name": "Kursus Bahasa Jerman Level A1 - B2",
        "description": "Program pembelajaran bahasa Jerman komprehensif dari level pemula (A1) hingga menengah atas (B2) dengan tutor bersertifikasi",
        "provider": {
            "@type": "EducationalOrganization",
            "name": "Deutsch Lernen mit Fara",
            "sameAs": "{{ url('/') }}"
        },
        "hasCourseInstance": [
            {
                "@type": "CourseInstance",
                "courseMode": "online",
                "courseWorkload": "PT60H"
            },
            {
                "@type": "CourseInstance",
                "courseMode": "onsite",
                "location": {
                    "@type": "Place",
                    "address": {
                        "@type": "PostalAddress",
                        "addressLocality": "Bandung",
                        "addressRegion": "Jawa Barat",
                        "addressCountry": "ID"
                    }
                }
            }
        ],
        "offers": {
            "@type": "AggregateOffer",
            "lowPrice": "500000",
            "highPrice": "5000000",
            "priceCurrency": "IDR"
        }
    }
    </script>

    <!-- JSON-LD Schema Markup - FAQ -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "Apakah kelas tersedia online atau offline?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Ya, kami menyediakan kelas online maupun offline. Anda dapat memilih level sesuai kebutuhan: A1, A2, atau B1."
                }
            },
            {
                "@type": "Question",
                "name": "Di mana lokasi offline DlmF?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Lokasi kelas offline kami berada di Jalan Terusan Sari Asih No.76, Sarijadi, Kota Bandung, Indonesia."
                }
            },
            {
                "@type": "Question",
                "name": "Program apa saja yang tersedia di Deutsch lernen mit Fara?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Kami menawarkan kelas reguler dan private (A1-B1), kelas Sprechen mit Muttersprachler, kelas private grammatik & persiapan ujian, kelas private anak, program pendampingan Au Pair, dan program kelas asinkronus melalui FlexiLearn."
                }
            },
            {
                "@type": "Question",
                "name": "Apa perbedaan kelas reguler dan private?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Private: One-on-one dengan pengajar. Reguler: 3-8 orang per kelas."
                }
            },
            {
                "@type": "Question",
                "name": "Apakah ada sertifikat?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Ya, kami memberikan sertifikat keikutsertaan untuk setiap peserta. Jika ingin mendapatkan sertifikat resmi, Anda dapat mengikuti ujian Goethe secara mandiri."
                }
            }
        ]
    }
    </script>

    <!-- JSON-LD Schema Markup - Breadcrumb -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Beranda",
                "item": "{{ url('/') }}"
            }
        ]
    }
    </script>

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
        }

        /* Custom CSS untuk button outline dengan hover purple */
        .btn-outline-custom {
            color: #7C3AED;
            border-color: #7C3AED;
            background-color: transparent;
            transition: all 0.3s ease;
        }

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
            height: auto;
            min-height: 70px;
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
            padding: 60px 0 80px;
            position: relative;
            overflow: hidden;
            margin-top: 0;
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
            margin-top: 3.7rem;
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
            text-align: justify;
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

        .features-content {
            padding: 2rem 0;
        }

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

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animate {
            opacity: 1;
            transform: translateY(0);
        }

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
            height: auto;
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
            .courses-section {
                padding: 3rem 0;
            }

            .course-image {
                height: auto;
                max-height: 200px;
            }

            .course-content {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .course-image {
                height: auto;
                max-height: 180px;
            }
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

        /* Testimonials Section */
        .testimonials-section {
            padding: 5rem 0;
            overflow: hidden;
            background: #f8f9fa;
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
            min-height: 350px;
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
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 160px;
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

        @media (max-width: 768px) {
            .testimonial-card {
                flex: 0 0 340px;
                padding: 2rem;
                min-height: 320px;
            }

            .testimonial-text {
                -webkit-line-clamp: 6;
                min-height: 120px;
            }
        }

        @media (max-width: 576px) {
            .testimonial-card {
                flex: 0 0 300px;
                padding: 1.8rem;
                min-height: 300px;
            }

            .testimonial-text {
                -webkit-line-clamp: 5;
                min-height: 100px;
            }
        }

        /* FAQ Section */
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
            margin-top: 2rem;
        }

        .footer-contact {
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

        @media (max-width: 576px) {
            .social-links {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"
                aria-label="Deutsch Lernen mit Fara - Kursus Bahasa Jerman">
                <img src="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}" style="width: 200px; height: auto;"
                    alt="Logo Deutsch Lernen mit Fara - Kursus Bahasa Jerman Premium"
                    title="DlmF - Kursus Bahasa Jerman Terpercaya">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" aria-current="page">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/program') }}">Program</a></li>
                            <li><a class="dropdown-item" href="{{ url('/product') }}">Produk</a></li>
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                            <li><a class="dropdown-item" href="{{ url('/harga') }}">Harga</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
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
                    <!-- H1 - Keyword Utama -->
                    <h1 class="hero-title">Gerbang Eksklusif Menuju Masa Depan di <span
                            style="color: var(--accent-color);">Jerman</span></h1>
                    <p class="hero-subtitle">Deutsch Lernen mit Fara bukan sekadar kursus bahasa. Kami adalah investasi
                        untuk masa depanmu. Dengan standar terbaik, tutor berpengalaman, dan pendekatan personal dari
                        level A1 hingga B2, kami memastikan anda siap studi/berkarir di Jerman.</p>
                    <div class="hero-buttons">
                        <a href="{{ url('/harga') }}" class="btn btn-hero-primary"
                            aria-label="Daftar kursus bahasa Jerman sekarang">Mulai Belajar</a>
                        <button class="btn btn-hero-secondary">
                            <a class="text-decoration-none" href="{{ url('/program') }}"
                                aria-label="Lihat program kursus bahasa Jerman lengkap">Lihat Program</a>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 hero-images">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Kursus bahasa Jerman online interaktif dengan siswa belajar bersama tutor profesional di DlmF"
                            class="img-fluid hero-image-main w-100" loading="eager"
                            title="Belajar Bahasa Jerman Online - Deutsch Lernen mit Fara">
                        <div class="floating-elements d-none d-lg-block">
                            <div class="floating-card" aria-label="Statistik siswa DlmF">
                                <i class="bi bi-people-fill me-2 text-primary" aria-hidden="true"></i>5.000+ Siswa
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section" aria-label="Statistik dan pencapaian Deutsch Lernen mit Fara">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="5000">
                        <span class="stat-number" data-count="5000">0+</span>
                        <span class="stat-label">Siswa Aktif</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="20">
                        <span class="stat-number" data-count="20">0+</span>
                        <span class="stat-label">Tutor Bersertifikasi</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="200">
                        <span class="stat-number" data-count="200">0+</span>
                        <span class="stat-label">Materi Pembelajaran</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item" data-target="5000">
                        <span class="stat-number" data-count="5000">0k+</span>
                        <span class="stat-label">Alumni Sukses</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learning Method Section -->
    <section class="learning-method-section">
        <div class="container">
            <!-- H2 - Keyword Turunan -->
            <h2 class="section-title">4 Pilar Metode Belajar Bahasa Jerman di DlmF</h2>
            <p class="section-subtitle">Belajar di sini tidak terburu-buru. Kapan anda stress, bisa istirahat dulu
                sambil cari kenapa anda benci Bahasa Jerman!</p>
            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <article class="method-card animate-on-scroll">
                        <div class="method-icon" aria-hidden="true">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="method-content">
                            <!-- H3 - Sub Heading -->
                            <h3 class="method-title">Jadwal Fleksibel</h3>
                            <p class="method-description">Jadwal belajar yang menyesuaikan kebutuhanmu, tetap konsisten
                                tanpa mengurangi kualitas pembelajaran bahasa Jerman.</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-6 mb-4">
                    <article class="method-card animate-on-scroll">
                        <div class="method-icon" aria-hidden="true">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <div class="method-content">
                            <h3 class="method-title">Kurikulum Sistematis</h3>
                            <p class="method-description">Kurikulum komprehensif dari A1 hingga B1, disertai evaluasi
                                progres yang transparan dan terukur sesuai standar Goethe Institut.</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-6 mb-4">
                    <article class="method-card animate-on-scroll">
                        <div class="method-icon" aria-hidden="true">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <div class="method-content">
                            <h3 class="method-title">Private Mentoring Personal</h3>
                            <p class="method-description">Pendampingan personal dari tutor bersertifikasi, memberikan
                                arahan tepat sesuai tujuan studi atau karier di Jerman.</p>
                        </div>
                    </article>
                </div>
                <div class="col-lg-6 mb-4">
                    <article class="method-card animate-on-scroll">
                        <div class="method-icon" aria-hidden="true">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="method-content">
                            <h3 class="method-title">Pembelajaran Interaktif</h3>
                            <p class="method-description">Pembelajaran aktif dan aplikatif, menghadirkan pengalaman yang
                                relevan dengan studi maupun karier di Jerman.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <!-- H2 - Keyword Turunan -->
            <h2 class="section-title" style="margin-bottom: 3rem;">Belajar Bahasa Jerman dengan Kebebasan Tanpa Batas
            </h2>

            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="features-image-container">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                            alt="Kelas online bahasa Jerman interaktif dengan metode pembelajaran modern dan tutor berpengalaman"
                            class="features-main-image" loading="lazy"
                            title="Kursus Bahasa Jerman Online - Metode Interaktif">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="features-content">
                        <p class="section-subtitle"
                            style="text-align: justify; margin-left: -0.1rem; margin-top: -3rem">
                            Di DlmF, Anda bebas memilih cara belajar yang paling sesuai: interaktif bersama tutor secara
                            online/offline, atau melalui kelas asinkronus yang dapat diakses kapan saja. Semua program
                            dirancang dengan metode efektif dan terarah, memastikan anda tetap berkembang dengan ritme
                            belajar yang fleksibel, dimanapun anda berada.
                        </p>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-3 mt-3">
                                <div class="feature-point">
                                    <i class="bi bi-clock feature-point-icon" aria-hidden="true"></i>
                                    <span class="feature-point-text">Jadwal Fleksibel</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3 mt-3">
                                <div class="feature-point">
                                    <i class="bi bi-currency-dollar feature-point-icon" aria-hidden="true"></i>
                                    <span class="feature-point-text">Harga Terjangkau</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <div class="feature-point">
                                    <i class="bi bi-laptop feature-point-icon" aria-hidden="true"></i>
                                    <span class="feature-point-text">Kelas Online Interaktif</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <div class="feature-point">
                                    <i class="bi bi-award feature-point-icon" aria-hidden="true"></i>
                                    <span class="feature-point-text">Pembelajaran Efektif & Terarah</span>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="mt-4 text-center text-lg-start">
                            <a href="https://wa.me/62859106869302" target="_blank" rel="noopener noreferrer"
                                class="btn btn-cta"
                                aria-label="Hubungi MinFara via WhatsApp untuk konsultasi kursus bahasa Jerman">
                                <i class="bi bi-whatsapp" aria-hidden="true"></i>
                                WhatsApp MinFara
                                <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="features-grid">
                <div class="row g-3 g-md-4">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <article class="feature-item animate-on-scroll">
                            <div class="feature-item-icon" aria-hidden="true">
                                <i class="bi bi-award"></i>
                            </div>
                            <h3 class="feature-item-title">Tutor Bersertifikasi</h3>
                            <p class="feature-item-description">Dipilih dengan ketat untuk memastikan kualitas
                                pembelajaran bahasa Jerman terbaik</p>
                        </article>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <article class="feature-item animate-on-scroll">
                            <div class="feature-item-icon" aria-hidden="true">
                                <i class="bi bi-journal-bookmark"></i>
                            </div>
                            <h3 class="feature-item-title">Materi Eksklusif & Selalu Terupdate</h3>
                            <p class="feature-item-description">Dirancang untuk kebutuhan akademis, profesional, dan
                                kehidupan nyata di Jerman</p>
                        </article>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <article class="feature-item animate-on-scroll">
                            <div class="feature-item-icon" aria-hidden="true">
                                <i class="bi bi-globe2"></i>
                            </div>
                            <h3 class="feature-item-title">Komunitas Alumni Global</h3>
                            <p class="feature-item-description">Jaringan global yang membuka peluang lebih luas di Eropa
                            </p>
                        </article>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <article class="feature-item animate-on-scroll">
                            <div class="feature-item-icon" aria-hidden="true">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="feature-item-title">5.000+ Pelajar Terpercaya</h3>
                            <p class="feature-item-description">Telah Mempercayakan Masa Depannya pada Kami</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
        <div class="container">
            <!-- H2 - Keyword Turunan -->
            <h2 class="section-title">Program Kursus Bahasa Jerman Terlaris</h2>
            <p class="section-subtitle">Kami menyediakan berbagai program pembelajaran bahasa Jerman yang disesuaikan
                dengan kebutuhan dan level kemampuan Anda dari A1 hingga B2</p>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="course-card">
                        <img src="{{ asset('asset/img/banner/15.png') }}"
                            alt="Program kursus bahasa Jerman reguler offline level A1 sampai B1 di Bandung"
                            class="course-image" loading="lazy" title="Kursus Bahasa Jerman Reguler Offline A1-B1">
                        <div class="course-content">
                            <span class="course-badge">Reguler Offline</span>
                            <h3 class="course-title">Kursus Reguler A1 - B1</h3>
                            <p class="course-description">Dengan kurikulum sistematis, bimbingan tutor berpengalaman,
                                dan suasana kelas yang interaktif, anda akan menguasai Bahasa Jerman dengan fondasi yang
                                kuat.</p>
                            <a href="{{ url('/harga') }}" class="price-btn"
                                aria-label="Lihat detail harga program kursus reguler A1-B1">
                                Lihat Detail Program <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="course-card">
                        <img src="{{ asset('asset/img/banner/17(1).png') }}"
                            alt="Kelas private speaking bahasa Jerman dengan native speaker penutur asli"
                            class="course-image" loading="lazy"
                            title="Private Speaking Bahasa Jerman dengan Native Speaker">
                        <div class="course-content">
                            <span class="course-badge">Private Speaking</span>
                            <h3 class="course-title">Private Sprechen mit Muttersprachler</h3>
                            <p class="course-description">Latihan berbicara langsung dengan penutur asli Jerman. Cocok
                                untuk Anda yang ingin meningkatkan kefasihan dan kepercayaan diri dalam komunikasi
                                sehari-hari maupun profesional.</p>
                            <a href="{{ url('/harga') }}" class="price-btn"
                                aria-label="Lihat detail harga kelas private speaking dengan native speaker">
                                Lihat Detail Program <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="course-card">
                        <img src="{{ asset('asset/img/banner/21.png') }}"
                            alt="Program FlexiLearn kursus bahasa Jerman online asinkronus belajar kapan saja"
                            class="course-image" loading="lazy" title="Deutsch FlexiLearn - Kursus Online Asinkronus">
                        <div class="course-content">
                            <span class="course-badge">Asinkronus</span>
                            <h3 class="course-title">Deutsch FlexiLearn (Asinkronus)</h3>
                            <p class="course-description">Kelas Bahasa Jerman yang dapat diakses kapan saja. Belajar
                                dengan materi eksklusif, video pembelajaran, dan latihan interaktif. Cocok untuk anda
                                yang membutuhkan fleksibilitas penuh.</p>
                            <a href="{{ url('/harga') }}" class="price-btn"
                                aria-label="Lihat detail harga program FlexiLearn asinkronus">
                                Lihat Detail Program <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="course-card">
                        <img src="{{ asset('asset/img/banner/16.png') }}"
                            alt="Kelas private grammar bahasa Jerman untuk memperdalam tata bahasa" class="course-image"
                            loading="lazy" title="Private Grammar Bahasa Jerman">
                        <div class="course-content">
                            <span class="course-badge">Private</span>
                            <h3 class="course-title">Private Grammatik</h3>
                            <p class="course-description">Kelas Private Grammatik sangat cocok bagi anda yang ingin
                                mendalami grammatik tertentu dengan waktu dan kuantitas kelas yang dapat disesuaikan.
                            </p>
                            <a href="{{ url('/harga') }}" class="price-btn"
                                aria-label="Lihat detail harga kelas private grammar">
                                Lihat Detail Harga <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="course-card">
                        <img src="{{ asset('asset/img/banner/17.png') }}"
                            alt="Program persiapan ujian Goethe dan TestDaF sertifikasi bahasa Jerman"
                            class="course-image" loading="lazy" title="Kelas Persiapan Ujian Goethe & TestDaF">
                        <div class="course-content">
                            <span class="course-badge">Preparation</span>
                            <h3 class="course-title">Kelas Persiapan Ujian Goethe & TestDaF</h3>
                            <p class="course-description">Kelas Persiapan Ujian sangat cocok bagi anda yang sedang
                                menyiapkan ujian sertifikasi Bahasa Jerman dengan waktu dan kuantitas kelas yang dapat
                                disesuaikan</p>
                            <a href="{{ url('/harga') }}" class="price-btn"
                                aria-label="Lihat detail harga program persiapan ujian">
                                Lihat Detail Program <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="course-card">
                        <img src="{{ asset('asset/img/banner/18.png') }}"
                            alt="Program Au Pair Jerman dengan kursus bahasa dan pendampingan lengkap"
                            class="course-image" loading="lazy" title="Program Kelas Au Pair Jerman">
                        <div class="course-content">
                            <span class="course-badge">Au Pair</span>
                            <h3 class="course-title">Kelas Au Pair Jerman</h3>
                            <p class="course-description">Au Pair secara singkat adalah program pertukaran budaya antar
                                negara. Au Pair memberikan kesempatan bagi anak muda yang berusia 18 hingga 26 tahun.
                            </p>
                            <a href="{{ url('/harga') }}" class="price-btn"
                                aria-label="Lihat detail program Au Pair Jerman">
                                Lihat Detail Program <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="teachers-section">
        <div class="container">
            <!-- H2 - Keyword Turunan -->
            <h2 class="section-title">Tutor Bahasa Jerman Bersertifikasi & Berpengalaman</h2>
            <p class="section-subtitle">Setiap tutor di DlmF dipilih melalui proses seleksi ketat, terdiri dari native
                speaker dan pengajar bersertifikasi yang berpengalaman dalam membimbing siswa menuju keberhasilan di
                Jerman.</p>

            <div class="row mt-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <article class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Herr_Yasin.png') }}"
                            alt="Herr Yasin tutor bahasa Jerman level C2 berpengalaman di DlmF" class="teacher-avatar"
                            loading="lazy" title="Herr Yasin - German Tutor C2">
                        <h3 class="teacher-name">Herr Yasin</h3>
                        <p class="teacher-level">German Tutor C2</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <article class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Frau_Caca.png') }}"
                            alt="Frau Caca tutor bahasa Jerman level B1 berpengalaman di DlmF" class="teacher-avatar"
                            loading="lazy" title="Frau Caca - German Tutor B1">
                        <h3 class="teacher-name">Frau Caca</h3>
                        <p class="teacher-level">German Tutor B1</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <article class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Herr_Farabi.png') }}"
                            alt="Herr Farabi tutor bahasa Jerman level B1 berpengalaman di DlmF" class="teacher-avatar"
                            loading="lazy" title="Herr Farabi - German Tutor B1">
                        <h3 class="teacher-name">Herr Farabi</h3>
                        <p class="teacher-level">German Tutor B1</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <article class="teacher-card">
                        <img src="{{ asset('asset/img/teachers/Frau_Dwi.png') }}"
                            alt="Frau Dwi tutor bahasa Jerman level B1 berpengalaman di DlmF" class="teacher-avatar"
                            loading="lazy" title="Frau Dwi - German Tutor B1">
                        <h3 class="teacher-name">Frau Dwi</h3>
                        <p class="teacher-level">German Tutor B1</p>
                    </article>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/teachers') }}" class="btn btn-outline-custom"
                    aria-label="Lihat profil lengkap semua tutor bahasa Jerman">Lihat Profil Lengkap Tutor</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <!-- H2 - Keyword Turunan -->
            <h2 class="section-title">Testimoni Alumni Kursus Bahasa Jerman DlmF</h2>
            <p class="section-subtitle">Dengarkan pengalaman langsung dari siswa-siswa yang telah berhasil menguasai
                bahasa Jerman bersama kami</p>

            <div class="testimonial-carousel mt-5">
                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"Seru bgt! Walaupun kelas online tapi mudah di mengerti. Frau Zizah baik
                        dan sabar juga."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture1.jpg') }}"
                                alt="Foto profil Afriliana B alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Afriliana B - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Afriliana B</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"Pertama secara budget terjangkau. Terus pilihan jam kelasnya sangat
                        beragam, jadi sangat membantu buat yang sambil kerja. Terus Lehrerin nya sangat amat baik,
                        terlihat sangat menguasai bidangnya juga, jadi ilmu nya banyak banget yang didapet. Terus sabar,
                        apalagi kalau kelas malem."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture2.jpg') }}"
                                alt="Foto profil Luis Anastasia alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Luis Anastasia - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Luis Anastasia</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"sangat membantu belajar bahasa jerman, kelasnya fun dan teman2nya
                        helpful👍🏻"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture3.jpg') }}"
                                alt="Foto profil Retta Anissa alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Retta Anissa - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Retta Anissa</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"Aku muridnya Frau Tissa, aku mau berterimakasih banget sama tim Deutsch
                        lernen mit Fara yang udah ramah banget merespon aku selama masa les. Berkat methode belajar yang
                        diterapin Frau Tissa aku bisa ngelewatin proses belajar sampai lulus ujian tanpa kendala yang
                        berarti."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture4.jpg') }}"
                                alt="Foto profil Putri RF alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Putri R.F - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Putri R.F</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"Love how passionate the teachers in DLmF"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture5.jpg') }}"
                                alt="Foto profil Kay Rool alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Kay Rool - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Kay Rool</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"Menemukan kursus ini dari iklan Instagram dan langsung mendaftar.
                        Guru-gurunya sangat sabar & penjelasannya detail, membuat materi mudah dipahami. Sangat
                        direkomendasikan untuk belajar bahasa Jerman yang efisien, cepat, dan terjangkau!. Danke
                        Minfara, Frau Jara und Frau Tissa ❤️ "</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture11.jpg') }}"
                                alt="Foto profil EV alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="EV - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>EV</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"Frau Zizah baik banget pokoknya, tulus banget ngajarinnya, selalu
                        nanyain dan ngajarin dengan sabar meskipun aku agak lemot, lope banget pokoknya 🩷🩷🩷"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture6.png') }}"
                                alt="Foto profil Kia alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Kia - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Kia</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>

                <article class="testimonial-card">
                    <div class="testimonial-rating" aria-label="Rating 5 bintang">
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text">"DlmF ist der beste Platz um Deutsch zu lernen. Ich habe an den Kurzen
                        A1-B1 teilgenommen. Und Letzten Monat habe ich auch den Gesprächsunterricht gemacht. Die
                        Lehrerin, Frau Inez, hat mir Deutsch sehr gut beigebracht. Ich bin gerade in Deutschland und
                        spreche gut Deutsch. Vielen vielen Dank DlmF ❤️ Grüße aus Deutschland 🇩🇪"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" style="background: none; padding: 0;">
                            <img src="{{ asset('asset/img/testi/Picture9.jpg') }}"
                                alt="Foto profil Citra Schwarz alumni kursus bahasa Jerman DlmF" width="50" height="50"
                                loading="lazy" title="Citra Schwarz - Alumni DlmF">
                        </div>
                        <div class="author-info">
                            <h6>Citra Schwarz</h6>
                            <small>Alumni Kursus Bahasa Jerman</small>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                        alt="Ilustrasi FAQ pertanyaan umum tentang kursus bahasa Jerman DlmF" class="img-fluid rounded"
                        loading="lazy" title="FAQ - Pertanyaan Umum Kursus Bahasa Jerman">
                </div>
                <div class="col-lg-6">
                    <!-- H2 - Keyword Turunan -->
                    <h2 class="section-title text-start">Pertanyaan Yang Sering Diajukan</h2>
                    <p class="section-subtitle text-start">Temukan jawaban untuk pertanyaan yang sering diajukan tentang
                        program kursus bahasa Jerman kami</p>

                    <div class="faq-list mt-4">
                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Apakah kelas tersedia online atau offline?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">Ya, kami menyediakan kelas online maupun offline. anda dapat memilih
                                    level sesuai kebutuhan: A1, A2, atau B1.</p>
                            </div>
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Di mana lokasi offline DlmF?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">Lokasi kelas offline kami berada di Jalan Terusan Sari Asih No.76,
                                    Sarijadi, Kota Bandung. Indonesia</p>
                            </div>
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Program apa saja yang tersedia di Deutsch lernen mit Fara?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <div itemprop="text">
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
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Apa perbedaan kelas reguler dan private?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <div itemprop="text">
                                    <ul>
                                        <li>Private: One-on-one dengan pengajar</li>
                                        <li>Reguler: 3 – 8 orang per kelas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Apa itu Program Au Pair?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">Au Pair adalah program tinggal di Jerman bersama keluarga angkat.
                                    Selain membantu mereka menjaga anak, anda juga bisa belajar bahasa dan budaya Jerman
                                    secara langsung, plus mendapatkan uang saku dan pengalaman internasional yang
                                    bernilai.</p>
                            </div>
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Apakah ada sertifikat nya?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">Ya, kami memberikan sertifikat keikutsertaan untuk setiap peserta.
                                    Jika ingin mendapatkan sertifikat resmi, anda dapat mengikuti ujian Goethe secara
                                    mandiri.</p>
                            </div>
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Apakah ada garansi?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">Kami memberikan garansi free class bagi siswa yang sudah mengikuti
                                    program di Deutsch lernen mit Fara tetapi belum lulus ujian (S&K berlaku).</p>
                            </div>
                        </div>

                        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
                            <button class="faq-header" onclick="toggleFaq(this)" itemprop="name">
                                Aplikasi apa yang digunakan dalam proses belajar online?
                                <i class="bi bi-chevron-down ms-auto" aria-hidden="true"></i>
                            </button>
                            <div class="faq-content" itemscope itemprop="acceptedAnswer"
                                itemtype="https://schema.org/Answer">
                                <p itemprop="text">Kami menggunakan Microsoft Teams sebagai platform belajar. Semua
                                    kelas dan grup diskusi sudah terintegrasi di dalam aplikasi tersebut.</p>
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
            <a href="https://wa.me/62859106869302" target="_blank" rel="noopener noreferrer"
                class="btn btn-hero-primary btn-lg" aria-label="Konsultasi kursus bahasa Jerman via WhatsApp sekarang">
                <i class="bi bi-whatsapp me-2" aria-hidden="true"></i>Konsultasi Sekarang
            </a>
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
                        <a href="#" class="text-white" aria-label="Facebook Deutsch Lernen mit Fara">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/deutschlernen.mit.fara/" target="_blank"
                            rel="noopener noreferrer" class="text-white" aria-label="Instagram Deutsch Lernen mit Fara">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-white" aria-label="YouTube Deutsch Lernen mit Fara">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Counter animation JS -->
    <script>
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

        function toggleFaq(element) {
            const content = element.nextElementSibling;
            const isOpen = content.classList.contains('open');

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

            if (isOpen) {
                content.classList.remove('open');
                element.classList.remove('active');
            } else {
                content.classList.add('open');
                element.classList.add('active');
            }
        }

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

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.stat-item').forEach(el => {
                statsObserver.observe(el);
            });

            document.querySelectorAll('.animate-on-scroll, .feature-card, .course-card, .teacher-card').forEach(el => {
                observer.observe(el);
            });

            const carousel = document.querySelector('.testimonial-carousel');
            const cards = carousel.querySelectorAll('.testimonial-card');

            if (!carousel || cards.length === 0) return;

            function setupCarousel() {
                const cardWidth = 420;
                const gap = 32;
                const totalWidth = (cardWidth + gap) * cards.length;

                cards.forEach(card => {
                    const clone = card.cloneNode(true);
                    carousel.appendChild(clone);
                });

                const scrollDistance = totalWidth;
                const animationDuration = cards.length * 8;

                document.documentElement.style.setProperty('--scroll-distance', `-${scrollDistance}px`);
                document.documentElement.style.setProperty('--animation-duration', `${animationDuration}s`);

                carousel.addEventListener('animationiteration', function () {
                    carousel.style.animation = 'none';
                    carousel.style.transform = 'translateX(0)';

                    requestAnimationFrame(() => {
                        carousel.style.animation = '';
                    });
                });
            }

            setupCarousel();

            let resizeTimeout;
            window.addEventListener('resize', function () {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
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
</body>

</html>
