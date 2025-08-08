@extends('layouts.app')

@section('title', 'Blog - Deutsch Lernen mit Fara')

@push('styles')
<style>
    :root {
        --primary-color: #7C3AED;
        --secondary-color: #A855F7;
        --accent-color: #FDE047;
        --dark-blue: #1E293B;
        --light-gray: #F8FAFC;
        --text-dark: #334155;
    }

    body {
        background-color: white;
    }

    /* Blog Hero Section */
    .blog-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: 120px 0 80px;
        position: relative;
        overflow: hidden;
        margin-top: -20px;
    }

    .blog-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .blog-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .blog-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0;
        line-height: 1.2;
    }

    /* Main Content Area */
    .blog-content {
        padding: 4rem 0;
    }

    /* Compact Blog Card Styling */
    .blog-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
        border: 1px solid #f1f5f9;
    }

    .blog-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(124, 58, 237, 0.12);
        border-color: rgba(124, 58, 237, 0.2);
    }

    .blog-card-horizontal {
        display: flex;
        flex-direction: row;
        align-items: stretch;
    }

    .blog-card-image {
        width: 140px;
        height: 100px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .blog-card-content {
        padding: 1rem 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .blog-badge {
        background: var(--primary-color);
        color: white;
        padding: 0.25rem 0.6rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 0.5rem;
        width: fit-content;
    }

    .blog-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-dark);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-date {
        font-size: 0.8rem;
        color: #64748B;
        margin-bottom: 0.75rem;
    }

    .read-more-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
        transition: all 0.3s ease;
    }

    .read-more-link:hover {
        color: var(--secondary-color);
    }

    /* Sidebar */
    .sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border: 1px solid #f1f5f9;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .sidebar-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1.25rem;
        color: var(--text-dark);
        text-align: center;
    }

    /* Search Box */
    .search-box {
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 25px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
    }

    .search-btn {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--primary-color);
        border: none;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        color: white;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        background: var(--secondary-color);
    }

    /* Recent Posts */
    .recent-post-item {
        display: flex;
        gap: 0.75rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f1f5f9;
    }

    .recent-post-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .recent-post-image {
        width: 60px;
        height: 45px;
        border-radius: 8px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .recent-post-content h6 {
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
        line-height: 1.3;
        color: var(--text-dark);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .recent-post-date {
        font-size: 0.75rem;
        color: #64748B;
    }

    /* CTA Bottom Section */
    .cta-bottom {
        background: var(--light-gray);
        padding: 4rem 2rem;
        text-align: center;
        margin-top: 4rem;
        border-radius: 20px;
        position: relative;
    }

    .cta-bottom-image {
        width: 250px;
        height: auto;
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .cta-bottom h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .cta-bottom p {
        color: #64748B;
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .cta-features {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .cta-feature {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .whatsapp-btn {
        background: var(--primary-color);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .whatsapp-btn:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(124, 58, 237, 0.3);
    }

    .cta-final {
        text-align: center;
        padding: 2rem 0;
        color: var(--text-dark);
        font-weight: 600;
        font-size: 1.1rem;
    }

    /* Empty State */
    .alert-info {
        background: rgba(124, 58, 237, 0.1);
        border: 2px solid rgba(124, 58, 237, 0.2);
        color: var(--primary-color);
        border-radius: 15px;
        padding: 2rem;
        font-weight: 600;
        text-align: center;
    }

    /* Animation Effects */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .animate-on-scroll.animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .sidebar {
            position: static;
            margin-top: 3rem;
        }

        .blog-card-horizontal {
            flex-direction: column;
        }

        .blog-card-image {
            width: 100%;
            height: 180px;
        }

        .blog-card-content {
            padding: 1.5rem;
        }

        .blog-title {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .blog-hero {
            padding: 100px 0 60px;
        }

        .blog-hero h1 {
            font-size: 2rem;
        }

        .blog-content {
            padding: 2rem 0;
        }

        .cta-features {
            flex-direction: column;
            gap: 1rem;
        }

        .cta-bottom {
            padding: 3rem 1.5rem;
            margin-top: 3rem;
        }

        .cta-bottom h3 {
            font-size: 1.5rem;
        }

        .cta-bottom-image {
            width: 200px;
        }
    }

    @media (max-width: 576px) {
        .blog-hero h1 {
            font-size: 1.75rem;
            padding: 0 1rem;
        }

        .sidebar-section {
            padding: 1.25rem;
        }

        .recent-post-image {
            width: 50px;
            height: 40px;
        }

        .recent-post-content h6 {
            font-size: 0.8rem;
        }

        .cta-bottom h3 {
            font-size: 1.25rem;
        }

        .cta-bottom-image {
            width: 180px;
        }
    }
</style>
@endpush

@section('content')
<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="blog-hero-content">
            <h1>Temukan Wawasan Baru Seputar<br>Bahasa & Budaya Jerman</h1>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                @forelse($posts as $post)
                <div class="blog-card blog-card-horizontal animate-on-scroll">
                    @if($post->thumbnail)
                    <img src="{{ Storage::url($post->thumbnail) }}" class="blog-card-image" alt="{{ $post->title }}">
                    @else
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="blog-card-image" alt="{{ $post->title }}">
                    @endif

                    <div class="blog-card-content">
                        <div>
                            <div class="blog-badge">{{ $post->category->name }}</div>
                            <h3 class="blog-title">{{ $post->title }}</h3>
                            <div class="blog-date">{{ $post->published_at->format('jS M y') }}</div>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more-link">
                            Read More <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Belum ada artikel yang dipublikasikan.
                </div>
                @endforelse

                <!-- Pagination -->
                @if($posts->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Search Section -->
                    <div class="sidebar-section">
                        <h4 class="sidebar-title">Search Blog</h4>
                        <form action="{{ route('blog.index') }}" method="GET">
                            <div class="search-box">
                                <input type="text" name="search" class="search-input" placeholder="Search..." value="{{ request('search') }}">
                                <button type="submit" class="search-btn">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Recent Posts -->
                    <div class="sidebar-section">
                        <h4 class="sidebar-title">Recent Post</h4>

                        @if(isset($recentPosts) && $recentPosts->count() > 0)
                            @foreach($recentPosts->take(5) as $recent)
                            <div class="recent-post-item">
                                @if($recent->thumbnail)
                                <img src="{{ Storage::url($recent->thumbnail) }}" alt="{{ $recent->title }}" class="recent-post-image">
                                @else
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="{{ $recent->title }}" class="recent-post-image">
                                @endif
                                <div class="recent-post-content">
                                    <h6><a href="{{ route('blog.show', $recent->slug) }}" class="text-decoration-none text-dark">{{ $recent->title }}</a></h6>
                                    <div class="recent-post-date">{{ $recent->published_at->format('jS M y') }}</div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            @php
                            // Fallback recent posts if not passed from controller
                            $fallbackRecent = [
                                ['title' => 'Tipps und Tricks zum Deutschlernen für Anfänger', 'date' => '13th Sep 25'],
                                ['title' => 'Deutsche Grammatik: Der, Die, Das leicht verstehen', 'date' => '12th Sep 25'],
                                ['title' => 'Mengenal Budaya Jerman: Tradisi dan Kebiasaan', 'date' => '10th Sep 25'],
                                ['title' => 'Panduan Lengkap Kuliah di Jerman', 'date' => '8th Sep 25'],
                                ['title' => '1000 Kosakata Bahasa Jerman untuk Pemula', 'date' => '5th Sep 25']
                            ];
                            @endphp

                            @foreach($fallbackRecent as $recent)
                            <div class="recent-post-item">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="{{ $recent['title'] }}" class="recent-post-image">
                                <div class="recent-post-content">
                                    <h6>{{ $recent['title'] }}</h6>
                                    <div class="recent-post-date">{{ $recent['date'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Bottom Section -->
<section class="container">
    <div class="cta-bottom">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                     alt="Belajar Bahasa Jerman" class="cta-bottom-image">
            </div>
            <div class="col-lg-6">
                <h3>Belajar Bahasa Jerman Sesuai Levelmu, Mulai dari A1 hingga B1</h3>
                <p>Dengan metode pembelajaran yang telah terbukti efektif, bergabunglah dengan ribuan siswa yang telah berhasil menguasai bahasa Jerman. Dapatkan akses ke materi lengkap, tutor berpengalaman, dan jadwal yang fleksibel sesuai kebutuhanmu.</p>

                <div class="cta-features">
                    <div class="cta-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Jadwal Fleksibel</span>
                    </div>
                    <div class="cta-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Materi Lengkap</span>
                    </div>
                    <div class="cta-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Tutor Berpengalaman & bersertifikat</span>
                    </div>
                </div>

                <div class="text-center text-lg-start">
                    <a href="https://wa.me/62859106869302" target="_blank" class="whatsapp-btn">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp MinFara
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="cta-final">
        Yuk, Belajar Bahasa Jerman Bareng Kami!
    </div>
</section>

<script>
// Animation on scroll
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

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });

    // Search functionality
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.closest('form').submit();
            }
        });
    }
});
</script>
@endsection
