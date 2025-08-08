<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guru - Deutsch Lernen mit Fara')</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-bulet.png') }}" type="image/x-icon">
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
            text-align: center;
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
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Teachers Section */
        .teachers-section {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .teacher-card {
            background: white;
            border-radius: 20px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(124, 58, 237, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 30px;
            border: 2px solid transparent;
            height: 100%;
        }

        .teacher-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(124, 58, 237, 0.15);
            border-color: var(--primary-color);
        }

        .teacher-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 2px solid var(--primary-color);
            transition: all 0.3s ease;
        }

        .teacher-card:hover .teacher-photo {
            border-color: var(--secondary-color);
            transform: scale(1.05);
        }

        .teacher-name {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .teacher-level {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .teacher-info {
            font-size: 0.85rem;
            color: var(--text-dark);
            line-height: 1.4;
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

        .btn-view-all a {
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
        }

        .btn-view-all a:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
            color: white;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .teacher-card {
                margin-bottom: 20px;
            }

            .teacher-photo {
                width: 150px;
                height: 150px;
            }

            .teacher-name {
                font-size: 2rem;
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
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .teacher-card {
                padding: 20px 15px;
            }

            .teacher-photo {
                width: 150px;
                height: 150px;
            }

            .teacher-name {
                font-size: 2rem;
            }

            .teacher-level {
                font-size: 1.2rem;
            }

            .teacher-info {
                font-size: 0.75rem;
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
                            <li><a class="dropdown-item" href="{{ url('/au-pair') }}">Au Pair</a></li>
                        </ul>
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
            <div class="hero-content">
                <h1 class="hero-title">Bersama Tutor Terbaik,</h1>
                <h2 class="hero-title" style="font-size: 2.5rem; margin-bottom: 20px;">Wujudkan Impian Belajar Bahasa Jermanmu!</h2>
                <p class="hero-subtitle">Miliki para tutor terbaik yang telah terbukti berpengalaman.<br>
                Yuk belajar bersama kami dan dapatkan kami bahasa Jerman dengan pelatihan yang seru!</p>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <div class="teachers-section">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($teachers as $teacher)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="teacher-card" data-bs-toggle="modal" data-bs-target="#teacherModal"
                         data-teacher-id="{{ $teacher->id }}"
                         data-teacher-name="{{ $teacher->name }}"
                         data-teacher-photo="{{ $teacher->photo ? Storage::url($teacher->photo) : 'https://via.placeholder.com/150' }}"
                         data-teacher-level="{{ $teacher->level }}"
                         data-teacher-education="{{ $teacher->education }}"
                         data-teacher-experience="{{ $teacher->experience }}">

                        @if($teacher->photo)
                            <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="teacher-photo">
                        @else
                            <img src="https://via.placeholder.com/150" alt="{{ $teacher->name }}" class="teacher-photo">
                        @endif

                        <div class="teacher-name">{{ $teacher->name }}</div>
                        <div class="teacher-level">Germany Tutor {{ $teacher->level }}</div>
                        <div class="teacher-info">
                            {{-- <div><strong>Lulusan:</strong> {{ Str::limit($teacher->education, 25) }}</div>
                            <div><strong>Pengalaman:</strong> {{ Str::limit($teacher->experience, 30) }}</div> --}}
                        </div>
                    </div>
                </div>
                @endforeach
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
                    <p id="modalTeacherLevel" class="modal-teacher-level"></p>

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
                                <span>Sertifikasi GOETHE B1</span>
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
                        <button class="btn btn-view-all w-100"><a href="{{ url('/teachers') }}">Lihat Semua Tutor</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/program') }}">Program</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/au-pair') }}">Au Pair</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
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
        document.addEventListener('DOMContentLoaded', function() {
            const teacherModal = document.getElementById('teacherModal');

            teacherModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Extract data from data attributes
                const teacherName = button.getAttribute('data-teacher-name');
                const teacherPhoto = button.getAttribute('data-teacher-photo');
                const teacherLevel = button.getAttribute('data-teacher-level');
                const teacherEducation = button.getAttribute('data-teacher-education');
                const teacherExperience = button.getAttribute('data-teacher-experience');

                // Update modal content
                document.getElementById('modalTeacherPhoto').src = teacherPhoto;
                document.getElementById('modalTeacherPhoto').alt = teacherName;
                document.getElementById('modalTeacherName').textContent = teacherName;
                document.getElementById('modalTeacherLevel').textContent = teacherLevel;
                document.getElementById('modalTeacherEducation').textContent = teacherEducation;
                document.getElementById('modalTeacherExperience').textContent = teacherExperience;
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
    </script>
</body>
</html>
