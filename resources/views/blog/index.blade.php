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
        --border-color: #E2E8F0;
    }

    body {
        background-color: #FFFFFF;
        color: var(--text-dark);
    }

    /* ===== HERO SECTION ===== */
    .blog-hero {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.95), rgba(118, 75, 162, 0.95), rgba(124, 58, 237, 0.95)),
                    url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&q=80') center/cover;
        color: white;
        padding: 160px 0 100px;
        position: relative;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ===== SEARCH & FILTER ===== */
    .search-filter-section {
        background: white;
        padding: 2rem 0 3rem;
    }

    .search-box {
        max-width: 500px;
        margin: 0 0 2rem 0;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 0.875rem 3rem 0.875rem 1.25rem;
        border: 2px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
    }

    .search-btn {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #64748B;
        cursor: pointer;
        padding: 0.5rem;
    }

    .clear-search {
        position: absolute;
        right: 45px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #94A3B8;
        cursor: pointer;
        display: none;
        padding: 0.5rem;
    }

    .clear-search.show {
        display: block;
    }

    .recent-post-label {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 1.5rem;
    }

    /* ===== BLOG GRID - 3 COLUMNS ===== */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .blog-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    /* Blog Card Image - NO CROP */
    .blog-card-image-wrapper {
        width: 100%;
        height: 240px;
        overflow: hidden;
        background: var(--light-gray);
        position: relative;
    }

    .blog-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .blog-card:hover .blog-card-image {
        transform: scale(1.08);
    }

    .blog-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--primary-color);
        color: white;
        padding: 0.35rem 0.85rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }

    .blog-card-content {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .blog-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        font-size: 0.85rem;
        color: #64748B;
    }

    .blog-meta i {
        font-size: 0.9rem;
    }

    .blog-title {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--dark-blue);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.8em;
    }

    .blog-card:hover .blog-title {
        color: var(--primary-color);
    }

    .read-more-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: auto;
        transition: gap 0.3s ease;
    }

    .read-more-link:hover {
        gap: 0.75rem;
    }

    /* ===== RECENT POST SIDEBAR ===== */
    .sidebar-section {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .recent-post-item {
        display: flex;
        gap: 0.75rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .recent-post-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .recent-post-item:hover {
        transform: translateX(4px);
    }

    .recent-post-link {
        display: flex;
        gap: 0.75rem;
        text-decoration: none;
        color: inherit;
        width: 100%;
    }

    .recent-post-image-wrapper {
        width: 80px;
        height: 60px;
        border-radius: 6px;
        overflow: hidden;
        flex-shrink: 0;
        background: var(--light-gray);
    }

    .recent-post-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .recent-post-content {
        flex: 1;
    }

    .recent-post-content h6 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
        line-height: 1.3;
        color: var(--dark-blue);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }

    .recent-post-link:hover h6 {
        color: var(--primary-color);
    }

    .recent-post-date {
        font-size: 0.8rem;
        color: #64748B;
    }

    /* ===== LOADING & STATES ===== */
    .search-loading {
        text-align: center;
        padding: 3rem;
        color: var(--primary-color);
        display: none;
    }

    .search-loading i {
        font-size: 2.5rem;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .no-results {
        text-align: center;
        padding: 4rem 2rem;
        display: none;
    }

    .no-results.show {
        display: block;
    }

    .no-results-icon {
        font-size: 3.5rem;
        color: #CBD5E1;
        margin-bottom: 1rem;
    }

    .search-results-info {
        background: rgba(124, 58, 237, 0.1);
        border-left: 4px solid var(--primary-color);
        border-radius: 8px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        font-weight: 500;
        color: var(--primary-color);
        display: none;
    }

    .search-results-info.show {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .clear-search-link {
        color: var(--primary-color);
        text-decoration: underline;
        cursor: pointer;
    }

    mark {
        background: var(--accent-color);
        color: var(--dark-blue);
        padding: 0.1rem 0.3rem;
        border-radius: 3px;
        font-weight: 600;
    }

    /* ===== PAGINATION ===== */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
    }

    .pagination {
        display: flex;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
    }

    .page-link {
        padding: 0.6rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        color: var(--text-dark);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        background: white;
        font-size: 0.9rem;
    }

    .page-link:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .page-item.active .page-link {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .page-item.disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .hero-content h1 {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .blog-hero {
            padding: 140px 0 80px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
        }

        .hero-content h1 {
            font-size: 1.75rem;
        }

        .search-box {
            max-width: 100%;
        }
    }

    @media (max-width: 576px) {
        .blog-hero {
            padding: 130px 0 60px;
        }
        .hero-content h1 {
            font-size: 1.5rem;
            margin-top: 1.5rem;
        }

        .blog-card-content {
            padding: 1.25rem;
        }

        .blog-title {
            font-size: 1.05rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="hero-content">
            <h1>Temukan Wawasan Baru Seputar<br>Bahasa & Budaya Jerman</h1>
            <p class="hero-subtitle">
                Jelajahi artikel-artikel menarik tentang tips belajar bahasa Jerman, budaya, dan panduan lengkap
            </p>
        </div>
    </div>
</section>

<!-- Search & Blog Grid Section -->
<section class="search-filter-section">
    <div class="container">
        <div class="row">
            <!-- Main Content - Blog Grid -->
            <div class="col-lg-9">
                <!-- Search Results Info -->
                <div id="search-results-info" class="search-results-info {{ request('search') ? 'show' : '' }}">
                    <span>
                        <i class="bi bi-search me-2"></i>
                        <span id="search-results-text">
                            @if(request('search'))
                            Menampilkan hasil pencarian untuk "<strong>{{ request('search') }}</strong>"
                            @endif
                        </span>
                    </span>
                    <span class="clear-search-link" id="clear-all-search">
                        Hapus <i class="bi bi-x-circle ms-1"></i>
                    </span>
                </div>

                <!-- Loading State -->
                <div id="search-loading" class="search-loading">
                    <i class="bi bi-arrow-repeat"></i>
                    <p class="mt-2 mb-0">Mencari artikel...</p>
                </div>

                <!-- No Results State -->
                <div id="no-results" class="no-results">
                    <div class="no-results-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3>Tidak ada artikel ditemukan</h3>
                    <p>Coba gunakan kata kunci yang berbeda</p>
                </div>

                <!-- Blog Grid -->
                <div id="blog-grid-container">
                    @if($posts->count() > 0)
                    <div class="blog-grid" id="blog-grid">
                        @foreach($posts as $post)
                        <article class="blog-card">
                            <a href="{{ route('blog.show', $post->slug) }}" class="blog-card-image-wrapper">
                                @if($post->thumbnail)
                                <img src="{{ Storage::url($post->thumbnail) }}"
                                     class="blog-card-image"
                                     alt="{{ $post->title }}"
                                     loading="lazy">
                                @else
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80"
                                     class="blog-card-image"
                                     alt="{{ $post->title }}"
                                     loading="lazy">
                                @endif
                                <span class="blog-badge">{{ $post->category->name }}</span>
                            </a>

                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span><i class="bi bi-calendar-event"></i> {{ $post->published_at->format('d M Y') }}</span>
                                    <span>•</span>
                                    <span><i class="bi bi-person"></i> {{ $post->author->name }}</span>
                                </div>

                                <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                                    <h2 class="blog-title">{{ $post->title }}</h2>
                                </a>

                                <a href="{{ route('blog.show', $post->slug) }}" class="read-more-link">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($posts->hasPages())
                    <div class="pagination-wrapper">
                        {{ $posts->links() }}
                    </div>
                    @endif
                    @else
                    <div class="no-results show">
                        <div class="no-results-icon">
                            <i class="bi bi-inbox"></i>
                        </div>
                        <h3>Belum ada artikel</h3>
                        <p>Artikel akan segera hadir!</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <!-- Search Box -->
                <div class="search-box">
                    <input
                        type="text"
                        id="search-input"
                        class="search-input"
                        placeholder="Search..."
                        autocomplete="off"
                        value="{{ request('search') }}"
                    >
                    <button type="button" id="clear-search" class="clear-search {{ request('search') ? 'show' : '' }}">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    <button type="button" id="search-btn" class="search-btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <!-- Recent Posts Sidebar -->
                @php
                    $recentPosts = \App\Models\Post::with(['category', 'author'])
                        ->published()
                        ->latest('published_at')
                        ->take(5)
                        ->get();
                @endphp

                @if($recentPosts->count() > 0)
                <div class="sidebar-section">
                    <div class="recent-post-label">Recent Post</div>
                    @foreach($recentPosts as $recent)
                    <div class="recent-post-item">
                        <a href="{{ route('blog.show', $recent->slug) }}" class="recent-post-link">
                            <div class="recent-post-image-wrapper">
                                @if($recent->thumbnail)
                                <img src="{{ Storage::url($recent->thumbnail) }}"
                                     alt="{{ $recent->title }}"
                                     class="recent-post-image">
                                @else
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=200&q=80"
                                     alt="{{ $recent->title }}"
                                     class="recent-post-image">
                                @endif
                            </div>
                            <div class="recent-post-content">
                                <h6>{{ $recent->title }}</h6>
                                <div class="recent-post-date">{{ $recent->published_at->format('d M Y') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchBtn = document.getElementById('search-btn');
    const clearSearchBtn = document.getElementById('clear-search');
    const clearAllSearchBtn = document.getElementById('clear-all-search');
    const searchLoading = document.getElementById('search-loading');
    const searchResultsInfo = document.getElementById('search-results-info');
    const noResults = document.getElementById('no-results');
    const blogGridContainer = document.getElementById('blog-grid-container');

    let searchTimeout;
    let originalContent = blogGridContainer.innerHTML;

    function toggleClearButton() {
        if (searchInput.value.trim()) {
            clearSearchBtn.classList.add('show');
        } else {
            clearSearchBtn.classList.remove('show');
        }
    }

    function clearSearch() {
        searchInput.value = '';
        toggleClearButton();
        searchResultsInfo.classList.remove('show');
        noResults.classList.remove('show');
        blogGridContainer.innerHTML = originalContent;

        const url = new URL(window.location);
        url.searchParams.delete('search');
        window.history.pushState({}, '', url);
    }

    function performSearch(query) {
        if (!query.trim()) {
            clearSearch();
            return;
        }

        if (query.length < 2) return;

        searchLoading.style.display = 'block';
        blogGridContainer.style.display = 'none';
        searchResultsInfo.classList.remove('show');
        noResults.classList.remove('show');

        fetch(`{{ route('blog.index') }}?search=${encodeURIComponent(query)}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            searchLoading.style.display = 'none';
            blogGridContainer.style.display = 'block';

            if (data.posts && data.posts.length > 0) {
                document.getElementById('search-results-text').innerHTML =
                    `Menampilkan hasil pencarian untuk "<strong>${query}</strong>"`;
                searchResultsInfo.classList.add('show');

                const blogCardsHTML = data.posts.map(post => generateBlogCard(post)).join('');
                blogGridContainer.innerHTML = `<div class="blog-grid">${blogCardsHTML}</div>`;

                const url = new URL(window.location);
                url.searchParams.set('search', query);
                window.history.pushState({}, '', url);
            } else {
                noResults.classList.add('show');
                blogGridContainer.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            searchLoading.style.display = 'none';
        });
    }

    function generateBlogCard(post) {
        const thumbnail = post.thumbnail || 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80';
        const title = post.highlighted_title || post.title;
        const showUrl = `{{ url('/blog') }}/${post.slug}`;

        return `
            <article class="blog-card">
                <a href="${showUrl}" class="blog-card-image-wrapper">
                    <img src="${thumbnail}" class="blog-card-image" alt="${post.title}" loading="lazy">
                    <span class="blog-badge">${post.category}</span>
                </a>
                <div class="blog-card-content">
                    <div class="blog-meta">
                        <span><i class="bi bi-calendar-event"></i> ${post.date}</span>
                        <span>•</span>
                        <span><i class="bi bi-person"></i> ${post.author}</span>
                    </div>
                    <a href="${showUrl}" class="text-decoration-none">
                        <h2 class="blog-title">${title}</h2>
                    </a>
                    <a href="${showUrl}" class="read-more-link">
                        Read More <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </article>
        `;
    }

    searchInput.addEventListener('input', function() {
        toggleClearButton();
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => performSearch(this.value.trim()), 500);
    });

    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            clearTimeout(searchTimeout);
            performSearch(this.value.trim());
        }
    });

    searchBtn.addEventListener('click', () => performSearch(searchInput.value.trim()));
    clearSearchBtn.addEventListener('click', clearSearch);
    if (clearAllSearchBtn) {
        clearAllSearchBtn.addEventListener('click', clearSearch);
    }

    toggleClearButton();
});
</script>
@endpush
@endsection
