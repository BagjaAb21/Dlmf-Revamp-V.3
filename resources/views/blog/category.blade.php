@extends('layouts.app')

@section('title', $category->name . ' - Blog - Deutsch Lernen mit Fara')

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

    /* Reuse all styles from blog index */
    .blog-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, var(--primary-color) 100%);
        color: white;
        padding: 140px 0 80px;
        position: relative;
        overflow: hidden;
        margin-bottom: 60px;
    }

    .blog-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
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
        margin-bottom: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .blog-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        line-height: 1.2;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.95;
        line-height: 1.6;
        max-width: 700px;
        margin: 0 auto 1.5rem;
    }

    .breadcrumb-custom {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        opacity: 0.9;
        margin-top: 1rem;
    }

    .breadcrumb-custom a {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s ease;
    }

    .breadcrumb-custom a:hover {
        opacity: 0.7;
        text-decoration: underline;
    }

    /* Search & Filter Bar */
    .search-filter-bar {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 3rem;
        border: 1px solid var(--border-color);
    }

    .search-box {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .search-input {
        width: 100%;
        padding: 1rem 3.5rem 1rem 1.5rem;
        border: 2px solid var(--border-color);
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
    }

    .search-btn {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--primary-color);
        border: none;
        padding: 0.7rem 1.5rem;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        background: var(--secondary-color);
        transform: translateY(-50%) scale(1.05);
    }

    .clear-search {
        position: absolute;
        right: 80px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #94A3B8;
        cursor: pointer;
        display: none;
        padding: 0.5rem;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .clear-search.show {
        display: block;
    }

    .clear-search:hover {
        background: var(--light-gray);
        color: var(--primary-color);
    }

    .category-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        justify-content: center;
    }

    .category-pill {
        padding: 0.5rem 1.25rem;
        border: 2px solid var(--border-color);
        border-radius: 50px;
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: white;
    }

    .category-pill:hover, .category-pill.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
    }

    .category-count {
        background: rgba(255, 255, 255, 0.3);
        padding: 0.15rem 0.5rem;
        border-radius: 12px;
        margin-left: 0.5rem;
        font-size: 0.85rem;
    }

    .category-pill.active .category-count {
        background: rgba(255, 255, 255, 0.2);
    }

    /* Blog Grid - Same as index */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .blog-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid var(--border-color);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(124, 58, 237, 0.15);
        border-color: var(--primary-color);
    }

    .blog-card-image-wrapper {
        position: relative;
        padding-top: 60%;
        overflow: hidden;
        background: var(--light-gray);
    }

    .blog-card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .blog-card-image {
        transform: scale(1.08);
    }

    .blog-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        color: var(--primary-color);
        padding: 0.4rem 0.9rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        border: 1px solid rgba(124, 58, 237, 0.2);
        z-index: 2;
    }

    .blog-card-content {
        padding: 1.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--dark-blue);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-card:hover .blog-title {
        color: var(--primary-color);
    }

    .blog-excerpt {
        font-size: 0.95rem;
        color: #64748B;
        line-height: 1.6;
        margin-bottom: 1.25rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    .blog-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 1px solid var(--border-color);
    }

    .blog-author {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: #64748B;
    }

    .author-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .blog-date {
        font-size: 0.85rem;
        color: #94A3B8;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .read-more-btn:hover {
        gap: 0.75rem;
        color: var(--secondary-color);
    }

    /* Loading & Empty States */
    .search-loading {
        text-align: center;
        padding: 3rem;
        color: var(--primary-color);
        display: none;
    }

    .search-loading i {
        font-size: 3rem;
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
        font-size: 4rem;
        color: #CBD5E1;
        margin-bottom: 1rem;
    }

    .no-results h3 {
        color: var(--dark-blue);
        margin-bottom: 0.5rem;
    }

    .no-results p {
        color: #64748B;
    }

    .search-results-info {
        background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(168, 85, 247, 0.1));
        border: 2px solid rgba(124, 58, 237, 0.2);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        font-weight: 600;
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
        font-weight: 600;
    }

    mark {
        background: var(--accent-color);
        color: var(--dark-blue);
        padding: 0.1rem 0.3rem;
        border-radius: 4px;
        font-weight: 600;
    }

    /* Pagination */
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
        padding: 0.75rem 1.25rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        color: var(--text-dark);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        background: white;
    }

    .page-link:hover {
        background: var(--light-gray);
        border-color: var(--primary-color);
        color: var(--primary-color);
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

    /* Responsive */
    @media (max-width: 992px) {
        .blog-hero h1 { font-size: 2.5rem; }
        .blog-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .blog-hero {
            padding: 120px 0 60px;
        }
        .blog-hero h1 { font-size: 2rem; }
        .hero-subtitle { font-size: 1rem; }
        .search-filter-bar { padding: 1.5rem; }
        .blog-grid { grid-template-columns: 1fr; }
        .category-pills { justify-content: flex-start; }
    }

    @media (max-width: 576px) {
        .blog-hero h1 { font-size: 1.75rem; }
        .blog-card-content { padding: 1.25rem; }
        .blog-title { font-size: 1.1rem; }
        .search-input {
            padding: 0.875rem 3rem 0.875rem 1.25rem;
            font-size: 0.9rem;
        }
        .search-btn {
            padding: 0.6rem 1.2rem;
            font-size: 0.85rem;
        }
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="blog-hero">
    <div class="hero-content">
        <div class="container">
            <span class="hero-badge">
                <i class="bi bi-tag-fill me-2"></i>Kategori
            </span>
            <h1>{{ $category->name }}</h1>
            <p class="hero-subtitle">
                Temukan semua artikel dalam kategori {{ $category->name }}
            </p>
            <nav class="breadcrumb-custom" aria-label="breadcrumb">
                <a href="{{ url('/') }}">
                    <i class="bi bi-house-door-fill"></i> Beranda
                </a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('blog.index') }}">Blog</a>
                <i class="bi bi-chevron-right"></i>
                <span>{{ $category->name }}</span>
            </nav>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="container py-5">
    <!-- Search & Filter Bar -->
    <div class="search-filter-bar fade-in">
        <!-- Search Box -->
        <div class="search-box">
            <input
                type="text"
                id="search-input"
                class="search-input"
                placeholder="Cari artikel dalam kategori {{ $category->name }}..."
                autocomplete="off"
                value="{{ request('search') }}"
            >
            <button type="button" id="clear-search" class="clear-search {{ request('search') ? 'show' : '' }}">
                <i class="bi bi-x-lg"></i>
            </button>
            <button type="button" id="search-btn" class="search-btn">
                <i class="bi bi-search me-1"></i> Cari
            </button>
        </div>

        <!-- Category Filter -->
        <div class="category-pills">
            <a href="{{ route('blog.index') }}" class="category-pill">
                <i class="bi bi-grid me-1"></i> Semua Artikel
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('blog.category', $cat->slug) }}"
               class="category-pill {{ $cat->id === $category->id ? 'active' : '' }}">
                {{ $cat->name }}
                <span class="category-count">{{ $cat->posts_count }}</span>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Search Results Info -->
    <div id="search-results-info" class="search-results-info {{ request('search') ? 'show' : '' }}">
        <span>
            <i class="bi bi-search me-2"></i>
            <span id="search-results-text">
                Menampilkan hasil pencarian untuk "<strong>{{ request('search') }}</strong>" dalam {{ $category->name }}
            </span>
        </span>
        <span class="clear-search-link" id="clear-all-search">
            Hapus pencarian <i class="bi bi-x-circle ms-1"></i>
        </span>
    </div>

    <!-- Loading State -->
    <div id="search-loading" class="search-loading">
        <i class="bi bi-arrow-repeat"></i>
        <p class="mt-3 mb-0">Mencari artikel...</p>
    </div>

    <!-- No Results State -->
    <div id="no-results" class="no-results">
        <div class="no-results-icon">
            <i class="bi bi-search"></i>
        </div>
        <h3>Tidak ada artikel ditemukan</h3>
        <p>Coba gunakan kata kunci yang berbeda atau jelajahi kategori lain</p>
    </div>

    <!-- Blog Grid -->
    <div id="blog-grid-container">
        @if($posts->count() > 0)
        <div class="blog-grid fade-in" id="blog-grid">
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
                    <span class="blog-badge">
                        <i class="bi bi-tag-fill me-1"></i>
                        {{ $post->category->name }}
                    </span>
                </a>

                <div class="blog-card-content">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                        <h2 class="blog-title">{{ $post->title }}</h2>
                    </a>

                    <p class="blog-excerpt">{{ $post->excerpt }}</p>

                    <div class="blog-card-footer">
                        <div class="blog-author">
                            <div class="author-avatar">
                                {{ strtoupper(substr($post->author->name, 0, 1)) }}
                            </div>
                            <span>{{ $post->author->name }}</span>
                        </div>
                        <div class="blog-date">
                            <i class="bi bi-calendar-event"></i>
                            {{ $post->published_at->format('d M Y') }}
                        </div>
                    </div>

                    <a href="{{ route('blog.show', $post->slug) }}" class="read-more-btn">
                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
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
            <h3>Belum ada artikel dalam kategori ini</h3>
            <p>Artikel akan segera hadir. Silakan jelajahi kategori lain!</p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary mt-3">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Semua Artikel
            </a>
        </div>
        @endif
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
    const categorySlug = '{{ $category->slug }}';

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

        if (query.length < 2) {
            return;
        }

        searchLoading.style.display = 'block';
        blogGridContainer.style.display = 'none';
        searchResultsInfo.classList.remove('show');
        noResults.classList.remove('show');

        fetch(`{{ route('blog.category', $category->slug) }}?search=${encodeURIComponent(query)}`, {
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
                    `Ditemukan <strong>${data.total}</strong> artikel untuk "<strong>${query}</strong>" dalam {{ $category->name }}`;
                searchResultsInfo.classList.add('show');

                const blogCardsHTML = data.posts.map(post => generateBlogCard(post, query)).join('');
                blogGridContainer.innerHTML = `<div class="blog-grid fade-in">${blogCardsHTML}</div>`;

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
            blogGridContainer.innerHTML = `
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Terjadi kesalahan saat mencari. Silakan coba lagi.
                </div>
            `;
        });
    }

    function generateBlogCard(post, query = '') {
        const thumbnail = post.thumbnail || 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&q=80';
        const title = post.highlighted_title || post.title;
        const excerpt = post.highlighted_excerpt || post.excerpt;
        const showUrl = `{{ url('/blog') }}/${post.slug}`;

        return `
            <article class="blog-card">
                <a href="${showUrl}" class="blog-card-image-wrapper">
                    <img src="${thumbnail}" class="blog-card-image" alt="${post.title}" loading="lazy">
                    <span class="blog-badge">
                        <i class="bi bi-tag-fill me-1"></i>
                        ${post.category}
                    </span>
                </a>
                <div class="blog-card-content">
                    <a href="${showUrl}" class="text-decoration-none">
                        <h2 class="blog-title">${title}</h2>
                    </a>
                    <p class="blog-excerpt">${excerpt}</p>
                    <div class="blog-card-footer">
                        <div class="blog-author">
                            <div class="author-avatar">${post.author.charAt(0).toUpperCase()}</div>
                            <span>${post.author}</span>
                        </div>
                        <div class="blog-date">
                            <i class="bi bi-calendar-event"></i>
                            ${post.date}
                        </div>
                    </div>
                    <a href="${showUrl}" class="read-more-btn">
                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </article>
        `;
    }

    searchInput.addEventListener('input', function() {
        toggleClearButton();
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch(this.value.trim());
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
        performSearch(searchInput.value.trim());
    });

    clearSearchBtn.addEventListener('click', clearSearch);
    clearAllSearchBtn.addEventListener('click', clearSearch);

    toggleClearButton();
});
</script>
@endpush
@endsection
