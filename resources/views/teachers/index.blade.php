<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guru - Deutsch Lernen mit Fara')</title>

    <!-- Critical Resource Preloading -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        as="style">
    <link rel="preload" href="{{ asset('asset/img/logo/logo-panjang.png') }}" as="image">
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">

    <!-- Critical Above-the-fold CSS -->
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
        }

        /* Critical navbar and hero styles */
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

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }
    </style>

    <!-- Non-critical CSS loaded asynchronously -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">

    <!-- Fallback for browsers without JS -->
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </noscript>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
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
                        <a class="nav-link" href="#">Produk Digital</a>
                    </li> --}}
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
        <!-- Floating Decorative Icons -->
        <div class="hero-decorations">
            <i class="bi bi-mortarboard floating-icon"></i>
            <i class="bi bi-book floating-icon"></i>
            <i class="bi bi-translate floating-icon"></i>
            <i class="bi bi-people floating-icon"></i>
            <i class="bi bi-award floating-icon"></i>
            <i class="bi bi-chat-dots floating-icon"></i>
            <div class="german-flag-icon"></div>
            <div class="german-flag-icon"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="bi bi-patch-check-fill"></i>
                    <span class="german-word">Zertifizierte</span> Deutsche Tutoren
                </div>
                <h1 class="hero-title">Bersama <span class="german-word">Deutschlehrer</span> Terbaik,</h1>
                <h2 class="hero-title" style="font-size: clamp(1.8rem, 4.5vw, 2.8rem); margin-bottom: 25px;">
                    Wujudkan Impian Belajar Bahasa <span class="german-word">Jerman</span>!
                </h2>

                <!-- Stats Section -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">19+</span>
                        <span class="stat-label">Deutsche Tutoren</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">A1-B1</span>
                        <span class="stat-label">Alle Niveaus</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5000+</span>
                        <span class="stat-label">Erfolgreiche Schüler</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">★ 4.9</span>
                        <span class="stat-label">Bewertung</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <div class="teachers-section">
        <div class="container">
            <div class="row justify-content-center" id="teachers-grid">
                <!-- Teachers will be loaded here via JavaScript -->
            </div>
        </div>
    </div>

    <!-- Teacher Detail Modal -->
    <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teacherModalLabel">Detail Tutor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalTeacherPhoto" src="" alt="" class="modal-teacher-photo">
                    <h3 id="modalTeacherName" class="modal-teacher-name"></h3>
                    <p id="modalTeacherLevel" class="modal-teacher-level">level</p>

                    <div class="teacher-details">
                        <div class="detail-item">
                            <i class="bi bi-mortarboard detail-icon"></i>
                            <div class="detail-content">
                                <strong>Pendidikan</strong>
                                <span id="modalTeacherEducation"></span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="bi bi-award detail-icon"></i>
                            <div class="detail-content">
                                <strong>Sertifikasi</strong>
                                <span id="modalTeacherCertification"></span>
                            </div>
                        </div>

                        <div class="detail-item">
                            <i class="bi bi-clock detail-icon"></i>
                            <div class="detail-content">
                                <strong>Pengalaman</strong>
                                <span id="modalTeacherExperience"></span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ url('/teachers') }}" class="btn-view-all w-100 d-block text-center">Lihat Semua
                            Tutor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        {{-- <li><a href="{{ url('/blog') }}">Blog</a></li> --}}
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

    <!-- Optimized JavaScript -->
    <script>
        // Teachers data - moved to JS for better performance
        const teachersData = [
            {
                id: 1, name: 'Frau Afifah',
                photo: '{{ asset('asset/img/teachers/Frau_Afifah.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '2.5 Tahun Mengajar'
            },
            {
                id: 2, name: 'Frau Assyifa',
                photo: '{{ asset('asset/img/teachers/Frau_Assyifa.png') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '1 Tahun Mengajar'
            },
            {
                id: 3, name: 'Frau Azizah',
                photo: '{{ asset('asset/img/teachers/Frau_Azizah.jpg') }}',
                level: 'Level: B-2',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '3 Tahun Mengajar'
            },
            {
                id: 4, name: 'Frau Caca',
                photo: '{{ asset('asset/img/teachers/Frau_Caca.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '3 Tahun Mengajar'
            },
            {
                id: 5, name: 'Frau Cindy',
                photo: '{{ asset('asset/img/teachers/Frau_Cindy.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '2 Tahun Mengajar'
            },
            {
                id: 6, name: 'Frau Dwi',
                photo: '{{ asset('asset/img/teachers/Frau_Dwi.jpg') }}',
                level: 'Level: B-2',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '3 Tahun Mengajar'
            },
            {
                id: 7, name: 'Frau Esti',
                photo: '{{ asset('asset/img/teachers/Frau_Esti.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '1 Tahun Mengajar'
            },
            {
                id: 8, name: 'Frau Fia',
                photo: '{{ asset('asset/img/teachers/Frau_Fia.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '2 Tahun Mengajar'
            },
            {
                id: 9, name: 'Frau Jara',
                photo: '{{ asset('asset/img/teachers/Frau_Jara.png') }}',
                level: 'Level: B-2',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '5 Tahun Mengajar'
            },
            {
                id: 10, name: 'Frau Jojo',
                photo: '{{ asset('asset/img/teachers/Frau_Jojo.JPG') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '1 Tahun Mengajar'
            },
            {
                id: 11, name: 'Frau Mia',
                photo: '{{ asset('asset/img/teachers/Frau_Mia.png') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '1 Tahun Mengajar'
            },
            {
                id: 12, name: 'Frau Olin',
                photo: '{{ asset('asset/img/teachers/Frau_Olin.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '2 Tahun Mengajar'
            },
            {
                id: 13, name: 'Frau Putri',
                photo: '{{ asset('asset/img/teachers/Frau_Putri.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '1.5 Tahun Mengajar'
            },
            {
                id: 14, name: 'Frau Sofi',
                photo: '{{ asset('asset/img/teachers/Frau_Sofi.jpg') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '2 Tahun Mengajar'
            },
            {
                id: 15, name: 'Frau Tanaya',
                photo: '{{ asset('asset/img/teachers/Frau_Tanaya.png') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '3 Tahun Mengajar'
            },
            {
                id: 16, name: 'Frau Zahra',
                photo: '{{ asset('asset/img/teachers/Frau_Zahra.jpg') }}',
                level: 'Level: B-2',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '2 Tahun Mengajar'
            },
            {
                id: 17, name: 'Herr Fadhil',
                photo: '{{ asset('asset/img/teachers/Herr_Fadhil.png') }}',
                level: 'Level: B-1',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '1 Tahun Mengajar'
            },
            {
                id: 18, name: 'Frau Farabi',
                photo: '{{ asset('asset/img/teachers/Herr_Farabi.png') }}',
                level: 'Level: B-2',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '3 Tahun Mengajar'
            },
            {
                id: 19, name: 'Herr Iqbal',
                photo: '{{ asset('asset/img/teachers/Herr_Iqbal.png') }}',
                level: 'Level: B-2',
                education: 'Sastra Jerman Universitas Padjadjaran',
                certification: '-',
                experience: '3 Tahun Mengajar'
            }
        ];

        // DOM manipulation functions
        function loadTeachers() {
            const grid = document.getElementById('teachers-grid');
            const fragment = document.createDocumentFragment();

            teachersData.forEach(teacher => {
                const col = document.createElement('div');
                col.className = 'col-lg-3 col-md-4 col-sm-6 col-6';

                const teacherItem = document.createElement('div');
                teacherItem.className = 'teacher-item';
                teacherItem.dataset.teacher = JSON.stringify(teacher);

                teacherItem.innerHTML = `
                    <img src="${teacher.photo}"
                         alt="${teacher.name}"
                         class="teacher-photo"
                         loading="lazy"
                         width="180"
                         height="180">
                    <div class="teacher-name">${teacher.name}</div>
                    <div class="teacher-level">German Tutor ${teacher.level.split(',')[0]}</div>
                `;

                col.appendChild(teacherItem);
                fragment.appendChild(col);
            });

            grid.appendChild(fragment);
        }

        function initModal() {
            document.addEventListener('click', function (e) {
                const teacherItem = e.target.closest('.teacher-item');
                if (teacherItem) {
                    const teacher = JSON.parse(teacherItem.dataset.teacher);
                    showModal(teacher);
                }
            });
        }

        function showModal(teacher) {
            document.getElementById('modalTeacherPhoto').src = teacher.photo;
            document.getElementById('modalTeacherName').textContent = teacher.name;
            document.getElementById('modalTeacherLevel').textContent = teacher.level;
            document.getElementById('modalTeacherEducation').textContent = teacher.education;
            document.getElementById('modalTeacherCertification').textContent = teacher.certification;
            document.getElementById('modalTeacherExperience').textContent = teacher.experience;

            new bootstrap.Modal(document.getElementById('teacherModal')).show();
        }

        function initNavbar() {
            let ticking = false;

            function updateNavbar() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 100) {
                    navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                    navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
                } else {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                    navbar.style.boxShadow = 'none';
                }
                ticking = false;
            }

            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(updateNavbar);
                    ticking = true;
                }
            });
        }

        // Initialize everything when DOM is ready
        document.addEventListener('DOMContentLoaded', function () {
            loadTeachers();
            initModal();
            initNavbar();
        });
    </script>

    <!-- Load Bootstrap JS async -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" async></script>

    <!-- Non-critical CSS loaded at the end -->
    <style>
        /* Header & Navigation */
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
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="german" width="100" height="100" patternUnits="userSpaceOnUse"><rect x="0" y="0" width="100" height="33" fill="rgba(0,0,0,0.08)"/><rect x="0" y="33" width="100" height="34" fill="rgba(255,0,0,0.06)"/><rect x="0" y="67" width="100" height="33" fill="rgba(255,206,0,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23german)"/></svg>');
            opacity: 0.3;
        }

        .hero-decorations {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: 1;
        }

        .floating-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.15);
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
            font-weight: bold;
        }

        .german-flag-icon {
            position: absolute;
            width: 60px;
            height: 40px;
            background: linear-gradient(to bottom, #000000 33%, #FF0000 33%, #FF0000 66%, #FFCE00 66%);
            border-radius: 8px;
            opacity: 0.12;
            animation: float 8s ease-in-out infinite;
        }

        .german-flag-icon:nth-child(7) {
            top: 20%;
            right: 20%;
            animation-delay: 4s;
        }

        .german-flag-icon:nth-child(8) {
            bottom: 25%;
            left: 15%;
            animation-delay: 6s;
        }

        .floating-icon:nth-child(1) {
            top: 15%;
            left: 10%;
            font-size: 3rem;
            animation-delay: 0s;
        }

        .floating-icon:nth-child(2) {
            top: 25%;
            right: 15%;
            font-size: 2.5rem;
            animation-delay: 1s;
        }

        .floating-icon:nth-child(3) {
            bottom: 30%;
            left: 8%;
            font-size: 2rem;
            animation-delay: 2s;
        }

        .floating-icon:nth-child(4) {
            bottom: 20%;
            right: 12%;
            font-size: 2.8rem;
            animation-delay: 3s;
        }

        .floating-icon:nth-child(5) {
            top: 35%;
            left: 20%;
            font-size: 1.8rem;
            animation-delay: 1.5s;
        }

        .floating-icon:nth-child(6) {
            top: 45%;
            right: 8%;
            font-size: 2.2rem;
            animation-delay: 2.5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.15;
            }

            25% {
                transform: translateY(-15px) rotate(2deg);
                opacity: 0.2;
            }

            50% {
                transform: translateY(-25px) rotate(-1deg);
                opacity: 0.25;
            }

            75% {
                transform: translateY(-20px) rotate(1deg);
                opacity: 0.2;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(253, 224, 71, 0.2);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(253, 224, 71, 0.3);
            border-radius: 50px;
            padding: 12px 25px;
            margin-bottom: 25px;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 32px rgba(124, 58, 237, 0.1);
        }

        .hero-badge i {
            margin-right: 10px;
            font-size: 1.2rem;
            color: var(--accent-color);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            max-width: 850px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            background: rgba(253, 224, 71, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 25px 30px;
            border: 2px solid rgba(253, 224, 71, 0.25);
            box-shadow: 0 10px 40px rgba(124, 58, 237, 0.1);
            transition: all 0.3s ease;
            min-width: 140px;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(253, 224, 71, 0.25);
            border-color: rgba(253, 224, 71, 0.4);
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            display: block;
            margin-bottom: 8px;
            color: var(--accent-color);
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 0.95rem;
            opacity: 0.9;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .german-word {
            color: var(--accent-color);
            font-weight: 700;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .german-word::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #000000, #FF0000, #FFCE00);
            opacity: 0.6;
            border-radius: 1px;
        }

        /* Teachers Section */
        .teachers-section {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .teacher-item {
            text-align: center;
            cursor: pointer;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            padding: 15px;
        }

        .teacher-item:hover {
            transform: translateY(-5px);
        }

        .teacher-photo {
            width: 200px;
            height: 200px;
            border-radius: 25px;
            object-fit: cover;
            margin: 0 auto 15px;
            display: block;
            border: 3px solid white;
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.2);
            transition: all 0.3s ease;
        }

        .teacher-item:hover .teacher-photo {
            transform: scale(1.05);
            border-color: var(--primary-color);
            box-shadow: 0 12px 35px rgba(124, 58, 237, 0.3);
        }

        .teacher-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
            line-height: 1.2;
        }

        .teacher-level {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 0.8rem;
            margin-bottom: 0;
            line-height: 1.2;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            padding: 25px 30px;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-body {
            padding: 40px 30px;
            text-align: center;
        }

        .modal-teacher-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 25px;
            border: 5px solid var(--primary-color);
            display: block;
        }

        .modal-teacher-name {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .modal-teacher-level {
            font-size: 1.1rem;
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 30px;
        }

        .teacher-details {
            text-align: left;
            max-width: 400px;
            margin: 0 auto;
        }

        .detail-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            padding: 15px;
            background-color: var(--light-gray);
            border-radius: 12px;
            border-left: 4px solid var(--primary-color);
        }

        .detail-icon {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-right: 12px;
            margin-top: 2px;
        }

        .detail-content strong {
            color: var(--text-dark);
            font-weight: 600;
            display: block;
            margin-bottom: 3px;
        }

        .detail-content span {
            color: var(--text-dark);
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .btn-view-all {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-view-all:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
            color: white;
            text-decoration: none;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: clamp(1.8rem, 4vw, 2.5rem);
            }

            .teacher-item {
                margin-bottom: 20px;
            }

            .teacher-photo {
                width: 150px;
                height: 150px;
            }

            .teacher-name {
                font-size: 0.9rem;
            }

            .modal-teacher-name {
                font-size: 1.5rem;
            }

            .modal-teacher-photo {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: clamp(1.5rem, 4vw, 2rem);
            }

            .teacher-item {
                margin-bottom: 15px;
                padding: 10px;
            }

            .teacher-photo {
                width: 120px;
                height: 120px;
            }

            .teacher-name {
                font-size: 0.85rem;
            }

            .teacher-level {
                font-size: 0.75rem;
            }

            .social-links {
                justify-content: center;
            }
        }
    </style>

</body>

</html>
