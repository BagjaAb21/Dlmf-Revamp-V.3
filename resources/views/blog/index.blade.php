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

    /* Enhanced Blog Hero Section */
    .blog-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #7C3AED 100%);
        color: white;
        padding: 140px 0 80px;
        position: relative;
        overflow: hidden;
        margin-top: 0;
        min-height: 500px;
        display: flex;
        align-items: center;
    }

    /* Animated Background Elements */
    .blog-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
        animation: float 20s ease-in-out infinite;
    }

    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .floating-book, .floating-letter, .floating-flag {
        position: absolute;
        color: rgba(255, 255, 255, 0.1);
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-direction: alternate;
    }

    .floating-book {
        font-size: 2rem;
        top: 20%;
        left: 10%;
        animation: float 6s ease-in-out infinite;
    }

    .floating-letter {
        font-size: 1.5rem;
        top: 60%;
        right: 15%;
        animation: float 8s ease-in-out infinite reverse;
    }

    .floating-flag {
        font-size: 3rem;
        top: 30%;
        right: 20%;
        animation: float 10s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    /* Animated German Words */
    .german-words {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .german-word {
        position: absolute;
        color: rgba(255, 255, 255, 0.08);
        font-weight: 700;
        font-size: 1.2rem;
        animation: drift 15s linear infinite;
    }

    .german-word:nth-child(1) { top: 10%; left: -10%; animation-delay: 0s; }
    .german-word:nth-child(2) { top: 30%; left: -10%; animation-delay: 3s; }
    .german-word:nth-child(3) { top: 50%; left: -10%; animation-delay: 6s; }
    .german-word:nth-child(4) { top: 70%; left: -10%; animation-delay: 9s; }
    .german-word:nth-child(5) { top: 90%; left: -10%; animation-delay: 12s; }

    @keyframes drift {
        0% { transform: translateX(-100px) translateY(0px); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateX(calc(100vw + 100px)) translateY(-50px); opacity: 0; }
    }

    /* Hero Content */
    .blog-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-badge {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: slideInDown 1s ease-out;
    }

    .blog-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        animation: slideInUp 1s ease-out 0.3s both;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        font-weight: 400;
        margin-bottom: 2rem;
        opacity: 0.9;
        line-height: 1.6;
        animation: slideInUp 1s ease-out 0.6s both;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        color: rgba(255, 255, 255, 0.7);
        text-align: center;
        animation: bounce 2s infinite;
        cursor: pointer;
    }

    .scroll-indicator i {
        font-size: 1.5rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .scroll-indicator span {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
        60% { transform: translateX(-50%) translateY(-5px); }
    }

    /* Animations */
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Additional Visual Enhancements */
    .hero-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
        animation: fadeInScale 1s ease-out 1.2s both;
    }

    .gradient-text {
        background: linear-gradient(45deg, #FDE047, #FACC15);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Main Content Area - Fixed positioning */
    .blog-content {
        padding: 4rem 0;
        position: relative;
        z-index: 10;
        background: white;
    }

    /* Blog Card Styling - 2 Column Grid */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .blog-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: row;
        align-items: stretch;
        height: 200px;
    }

    .blog-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(124, 58, 237, 0.12);
        border-color: rgba(124, 58, 237, 0.2);
    }

    .blog-card-image {
        width: 160px;
        height: 100%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .blog-card-content {
        padding: 1.25rem 1.5rem;
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
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--text-dark);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-date {
        font-size: 0.85rem;
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
        cursor: pointer;
    }

    .search-btn:hover {
        background: var(--secondary-color);
    }

    .clear-search {
        position: absolute;
        right: 45px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #64748B;
        font-size: 1rem;
        cursor: pointer;
        display: none;
        padding: 0.2rem;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .clear-search:hover {
        background: #f1f5f9;
        color: var(--primary-color);
    }

    .clear-search.show {
        display: block;
    }

    /* Search Loading */
    .search-loading {
        text-align: center;
        padding: 2rem;
        color: var(--primary-color);
        display: none;
    }

    .search-loading i {
        font-size: 2rem;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Search Results */
    .search-results-info {
        background: rgba(124, 58, 237, 0.1);
        border: 1px solid rgba(124, 58, 237, 0.2);
        color: var(--primary-color);
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        font-weight: 500;
        display: none;
    }

    .search-results-info.show {
        display: block;
    }

    /* No Results */
    .no-results {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748B;
        display: none;
    }

    .no-results.show {
        display: block;
    }

    .no-results i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .no-results h4 {
        margin-bottom: 0.5rem;
        color: var(--text-dark);
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

    /* Search Results Highlighting */
    mark {
        background: var(--accent-color);
        color: var(--text-dark);
        padding: 0.1rem 0.2rem;
        border-radius: 3px;
        font-weight: 600;
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
        font-size: 2rem;
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

    /* Enhanced Responsive Design */
    @media (max-width: 992px) {
        .blog-hero {
            padding: 120px 0 60px;
            min-height: 400px;
        }

        .blog-hero h1 {
            font-size: 2.8rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .sidebar {
            position: static;
            margin-top: 3rem;
        }

        .blog-grid {
            grid-template-columns: 1fr;
        }

        .blog-card {
            height: auto;
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
            padding: 110px 0 50px;
            min-height: 350px;
        }

        .blog-hero h1 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1rem;
            margin-bottom: 1.5rem;
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
        .blog-hero {
            padding: 100px 0 40px;
            min-height: 300px;
        }

        .blog-hero h1 {
            font-size: 1.8rem;
            padding: 0 1rem;
        }

        .hero-subtitle {
            font-size: 0.9rem;
            padding: 0 1rem;
        }

        .hero-badge {
            font-size: 0.8rem;
            padding: 0.4rem 1rem;
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
<!-- Enhanced Blog Hero Section -->
<section class="blog-hero">
    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <i class="bi bi-book floating-book"></i>
        <i class="bi bi-translate floating-letter"></i>
        <i class="bi bi-flag floating-flag"></i>
    </div>

    <!-- Animated German Words -->
    <div class="german-words">
        <div class="german-word">Bildung</div>
        <div class="german-word">Wissen</div>
        <div class="german-word">Lernen</div>
        <div class="german-word">Deutsch</div>
        <div class="german-word">Sprache</div>
    </div>

    <div class="container">
        <div class="blog-hero-content">
            <div class="hero-badge">
                <i class="bi bi-mortarboard me-2"></i>
                Learning Hub
            </div>

            <div class="hero-icon">
                <i class="bi bi-journal-text"></i>
            </div>

            <h1>
                Temukan Wawasan Baru<br>
                <span class="gradient-text">Bahasa & Budaya Jerman</span>
            </h1>

            <p class="hero-subtitle">
                Jelajahi artikel-artikel menarik tentang tips belajar bahasa Jerman,
                budaya, tradisi, dan panduan lengkap untuk menguasai Deutsch dengan mudah.
            </p>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <i class="bi bi-chevron-down"></i>
        <span>Scroll</span>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Search Results Info -->
                <div id="search-results-info" class="search-results-info">
                    <i class="bi bi-search me-2"></i>
                    <span id="search-results-text"></span>
                    <button type="button" id="clear-all-search" class="btn btn-link btn-sm p-0 ms-2 text-decoration-none">
                        Hapus pencarian
                    </button>
                </div>

                <!-- Search Loading -->
                <div id="search-loading" class="search-loading">
                    <i class="bi bi-arrow-clockwise"></i>
                    <p class="mt-2 mb-0">Mencari artikel...</p>
                </div>

                <!-- No Results -->
                <div id="no-results" class="no-results">
                    <i class="bi bi-search"></i>
                    <h4>Tidak ada artikel ditemukan</h4>
                    <p>Coba gunakan kata kunci yang berbeda atau lebih umum.</p>
                </div>

                <!-- Blog Grid Container -->
                <div id="blog-grid-container">
                    @if($posts->count() > 0)
                    <div class="blog-grid" id="blog-grid">
                        @foreach($posts as $post)
                        <div class="blog-card animate-on-scroll">
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
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Belum ada artikel yang dipublikasikan.
                    </div>
                    @endif

                    <!-- Pagination -->
                    @if($posts->hasPages())
                    <div class="d-flex justify-content-center mt-4" id="pagination-container">
                        {{ $posts->links() }}
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Search Section -->
                    <div class="sidebar-section">
                        <h4 class="sidebar-title">Search Blog</h4>
                        <div class="search-box">
                            <input type="text" id="search-input" class="search-input" placeholder="Cari artikel..." autocomplete="off">
                            <button type="button" id="clear-search" class="clear-search">
                                <i class="bi bi-x"></i>
                            </button>
                            <button type="button" id="search-btn" class="search-btn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
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
                            <div class="recent-post-item">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Tipps und Tricks zum Deutschlernen für Anfänger" class="recent-post-image">
                                <div class="recent-post-content">
                                    <h6>Tipps und Tricks zum Deutschlernen für Anfänger</h6>
                                    <div class="recent-post-date">13th Sep 25</div>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Deutsche Grammatik: Der, Die, Das leicht verstehen" class="recent-post-image">
                                <div class="recent-post-content">
                                    <h6>Deutsche Grammatik: Der, Die, Das leicht verstehen</h6>
                                    <div class="recent-post-date">12th Sep 25</div>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Mengenal Budaya Jerman: Tradisi dan Kebiasaan" class="recent-post-image">
                                <div class="recent-post-content">
                                    <h6>Mengenal Budaya Jerman: Tradisi dan Kebiasaan</h6>
                                    <div class="recent-post-date">10th Sep 25</div>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Panduan Lengkap Kuliah di Jerman" class="recent-post-image">
                                <div class="recent-post-content">
                                    <h6>Panduan Lengkap Kuliah di Jerman</h6>
                                    <div class="recent-post-date">8th Sep 25</div>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="1000 Kosakata Bahasa Jerman untuk Pemula" class="recent-post-image">
                                <div class="recent-post-content">
                                    <h6>1000 Kosakata Bahasa Jerman untuk Pemula</h6>
                                    <div class="recent-post-date">5th Sep 25</div>
                                </div>
                            </div>
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
// Real-time Search without Page Reload
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchBtn = document.getElementById('search-btn');
    const clearSearchBtn = document.getElementById('clear-search');
    const clearAllSearchBtn = document.getElementById('clear-all-search');
    const searchLoading = document.getElementById('search-loading');
    const searchResultsInfo = document.getElementById('search-results-info');
    const searchResultsText = document.getElementById('search-results-text');
    const noResults = document.getElementById('no-results');
    const blogGridContainer = document.getElementById('blog-grid-container');
    const blogGrid = document.getElementById('blog-grid');

    let searchTimeout;
    let isSearching = false;
    let originalContent = blogGridContainer.innerHTML;

    // Show/hide clear button
    function toggleClearButton() {
        if (searchInput.value.trim()) {
            clearSearchBtn.classList.add('show');
        } else {
            clearSearchBtn.classList.remove('show');
        }
    }

    // Clear search
    function clearSearch() {
        searchInput.value = '';
        toggleClearButton();
        hideSearchUI();
        restoreOriginalContent();
    }

    // Hide search UI
    function hideSearchUI() {
        searchResultsInfo.classList.remove('show');
        searchLoading.style.display = 'none';
        noResults.classList.remove('show');
    }

    // Restore original content
    function restoreOriginalContent() {
        blogGridContainer.innerHTML = originalContent;
        // Re-initialize animations for restored content
        setTimeout(() => {
            initializeAnimations();
        }, 100);
    }

    // Show loading state
    function showLoading() {
        hideSearchUI();
        searchLoading.style.display = 'block';
        blogGridContainer.style.display = 'none';
        isSearching = true;
    }

    // Hide loading state
    function hideLoading() {
        searchLoading.style.display = 'none';
        blogGridContainer.style.display = 'block';
        isSearching = false;
    }

    // Show search results info
    function showSearchInfo(query, count) {
        searchResultsText.textContent = `Ditemukan ${count} artikel untuk "${query}"`;
        searchResultsInfo.classList.add('show');
    }

    // Show no results
    function showNoResults() {
        hideLoading();
        noResults.classList.add('show');
        blogGridContainer.style.display = 'none';
    }

    // Highlight search terms
    function highlightText(text, query) {
        if (!query) return text;
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }

    // Generate blog card HTML
    function generateBlogCardHTML(post, query = '') {
        let thumbnail;
        if (post.thumbnail) {
            // Check if thumbnail already includes full URL
            if (post.thumbnail.startsWith('http')) {
                thumbnail = post.thumbnail;
            } else {
                thumbnail = `{{ asset('storage') }}/${post.thumbnail}`;
            }
        } else {
            thumbnail = 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80';
        }

        // Use highlighted title from backend if available, otherwise highlight here
        const title = post.highlighted_title || highlightText(post.title, query);
        const showUrl = `{{ url('/blog') }}/${post.slug}`;

        return `
            <div class="blog-card animate-on-scroll">
                <img src="${thumbnail}" class="blog-card-image" alt="${post.title}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80'">
                <div class="blog-card-content">
                    <div>
                        <div class="blog-badge">${post.category}</div>
                        <h3 class="blog-title">${title}</h3>
                        <div class="blog-date">${post.date}</div>
                    </div>
                    <a href="${showUrl}" class="read-more-link">
                        Read More <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        `;
    }

    // Perform search
    function performSearch(query) {
        if (!query.trim()) {
            clearSearch();
            return;
        }

        if (query.length < 2) {
            return;
        }

        showLoading();

        // AJAX request to your blog route with correct prefix
        fetch(`{{ route('blog.index') }}?search=${encodeURIComponent(query)}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Search response:', data); // Debug log
            hideLoading();

            if (data.posts && data.posts.length > 0) {
                // Show results
                showSearchInfo(query, data.total || data.posts.length);

                const blogCardsHTML = data.posts.map(post => generateBlogCardHTML(post, query)).join('');
                blogGridContainer.innerHTML = `<div class="blog-grid">${blogCardsHTML}</div>`;

                // Initialize animations for new content
                setTimeout(() => {
                    initializeAnimations();
                }, 100);
            } else {
                showNoResults();
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            hideLoading();

            // Show error message instead of no results
            blogGridContainer.innerHTML = `
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Terjadi kesalahan saat mencari. Silakan coba lagi.
                </div>
            `;
        });
    }

    // Re-initialize animations for new content
    function initializeAnimations() {
        const newCards = document.querySelectorAll('.blog-card.animate-on-scroll');
        newCards.forEach(card => {
            cardObserver.observe(card);
            // Add animation class immediately for search results
            setTimeout(() => {
                card.classList.add('animate');
            }, 100);
        });
    }

    // Event listeners
    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        toggleClearButton();

        // Clear previous timeout
        clearTimeout(searchTimeout);

        // Debounce search
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 500);
    });

    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            clearTimeout(searchTimeout);
            performSearch(this.value.trim());
        }
    });

    searchBtn.addEventListener('click', function() {
        clearTimeout(searchTimeout);
        performSearch(searchInput.value.trim());
    });

    clearSearchBtn.addEventListener('click', clearSearch);
    clearAllSearchBtn.addEventListener('click', clearSearch);

    // Focus on search input
    searchInput.addEventListener('focus', function() {
        this.parentElement.style.borderColor = 'var(--primary-color)';
    });

    searchInput.addEventListener('blur', function() {
        if (!this.value.trim()) {
            this.parentElement.style.borderColor = '#e2e8f0';
        }
    });

    // Initialize
    toggleClearButton();

    // Smooth scroll for scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const blogContent = document.querySelector('.blog-content');
            if (blogContent) {
                blogContent.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // Dynamic German words rotation
    const germanWords = ['Bildung', 'Wissen', 'Lernen', 'Deutsch', 'Sprache', 'Kultur', 'Grammatik', 'Vokabeln', 'Ausbildung', 'Studium'];
    const wordElements = document.querySelectorAll('.german-word');

    let wordIndex = 0;
    setInterval(() => {
        wordElements.forEach((element, index) => {
            const newWordIndex = (wordIndex + index) % germanWords.length;
            element.textContent = germanWords[newWordIndex];
        });
        wordIndex = (wordIndex + 1) % germanWords.length;
    }, 4000);
});

// Animation on scroll for blog cards
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const cardObserver = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
        }
    });
}, observerOptions);

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        cardObserver.observe(el);
    });
});

// Standard navbar background change on scroll
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        if (window.scrollY > 100) {
            navbar.style.background = 'rgba(255, 255, 255, 0.98)';
            navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
        } else {
            navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            navbar.style.boxShadow = 'none';
        }
    }
});
</script>
@endsection
