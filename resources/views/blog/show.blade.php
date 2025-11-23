@extends('layouts.app')

@section('title', $post->title . ' - Deutsch Lernen mit Fara')

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
        background: #FFFFFF;
        color: var(--text-dark);
    }

    /* ===== ARTICLE HEADER ===== */
    .article-header {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.95), rgba(118, 75, 162, 0.95), rgba(124, 58, 237, 0.95)),
                    url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&q=80') center/cover;
        color: white;
        padding: 180px 0 80px;
        text-align: center;
    }

    .article-header-content {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 2rem;
    }

    .article-meta-info {
        display: flex;
        justify-content: center;
        gap: 3rem;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .meta-label {
        font-size: 0.85rem;
        opacity: 0.9;
        margin-bottom: 0.25rem;
    }

    .meta-value {
        font-size: 1rem;
        font-weight: 600;
    }

    /* ===== CONTENT SECTION ===== */
    .article-content-section {
        padding: 3rem 0;
        background: white;
    }

    .article-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .content-row {
        display: flex;
        gap: 3rem;
    }

    .main-content {
        flex: 1;
        max-width: 750px;
    }

    .sidebar-content {
        width: 350px;
        flex-shrink: 0;
    }

    /* ===== FEATURED IMAGE - NO CROP ===== */
    .featured-image-wrapper {
        margin-bottom: 2.5rem;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        background: var(--light-gray);
    }

    .featured-image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: contain;
        max-height: 600px;
    }

    /* ===== ARTICLE CONTENT ===== */
    .overview-section {
        margin-bottom: 2.5rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 1.25rem;
    }

    .article-content {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #374151;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content h2,
    .article-content h3,
    .article-content h4 {
        color: var(--dark-blue);
        font-weight: 700;
        margin-top: 2.5rem;
        margin-bottom: 1.25rem;
        line-height: 1.3;
    }

    .article-content h2 {
        font-size: 1.75rem;
    }

    .article-content h3 {
        font-size: 1.4rem;
    }

    .article-content h4 {
        font-size: 1.2rem;
    }

    .article-content ul,
    .article-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.75rem;
    }

    .article-content li {
        margin-bottom: 0.75rem;
        line-height: 1.7;
    }

    /* Images in content - NO CROP */
    .article-content img {
        max-width: 100%;
        height: auto !important;
        border-radius: 10px;
        margin: 2rem auto;
        display: block;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        object-fit: contain;
    }

    /* Hide image captions/filenames */
    .article-content figure {
        margin: 2rem 0;
    }

    .article-content figcaption {
        display: none !important;
    }

    /* Hide filename links */
    .article-content p > a[href*=".png"],
    .article-content p > a[href*=".jpg"],
    .article-content p > a[href*=".jpeg"],
    .article-content p > a[href*=".gif"],
    .article-content p > a[href*=".webp"] {
        display: none !important;
    }

    /* Hide any text links to uploaded files */
    .article-content a[href*="storage/uploads"] {
        display: inline-block;
        margin: 0;
    }

    .article-content a[href*="storage/uploads"]:not(:has(img)) {
        display: none !important;
    }

    /* Hide paragraphs that only contain image filenames */
    .article-content p:has(a[href*=".png"]),
    .article-content p:has(a[href*=".jpg"]),
    .article-content p:has(a[href*=".jpeg"]) {
        display: contents;
    }

    .article-content p:empty {
        display: none !important;
    }

    .article-content blockquote {
        border-left: 4px solid var(--primary-color);
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #475569;
        background: var(--light-gray);
        padding: 1.25rem 1.5rem;
        border-radius: 0 8px 8px 0;
    }

    /* ===== NEXT/PREV NAVIGATION ===== */
    .post-navigation {
        display: flex;
        justify-content: space-between;
        gap: 1.5rem;
        margin: 3rem 0;
        padding: 2rem 0;
        border-top: 2px solid var(--border-color);
        border-bottom: 2px solid var(--border-color);
    }

    .nav-post {
        flex: 1;
        max-width: 48%;
    }

    .nav-post.next {
        text-align: right;
    }

    .nav-post a {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .nav-post.next a {
        flex-direction: row-reverse;
    }

    .nav-post a:hover {
        border-color: var(--primary-color);
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(124, 58, 237, 0.15);
    }

    .nav-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .nav-content {
        flex: 1;
    }

    .nav-label {
        font-size: 0.8rem;
        color: #64748B;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .nav-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark-blue);
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ===== SIDEBAR ===== */
    .sidebar-section {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .sidebar-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 1.25rem;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.95rem;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
    }

    /* Recent Post - Clickable - NO CROP */
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

    /* ===== RECOMMENDATION SECTION ===== */
    .recommendation-section {
        margin: 4rem 0;
        padding: 3rem 0;
        background: var(--light-gray);
    }

    .recommendation-title {
        text-align: center;
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 0.5rem;
    }

    .recommendation-subtitle {
        text-align: center;
        color: #64748B;
        margin-bottom: 2.5rem;
    }

    .recommendation-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .recommendation-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid var(--border-color);
    }

    .recommendation-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    /* Recommendation Image - NO CROP */
    .recommendation-image-wrapper {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
        background: var(--light-gray);
    }

    .recommendation-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .rec-badges {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        display: flex;
        gap: 0.5rem;
        z-index: 2;
    }

    .rec-badge {
        background: var(--primary-color);
        color: white;
        padding: 0.25rem 0.65rem;
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .recommendation-content {
        padding: 1.25rem;
    }

    .rec-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        font-size: 0.8rem;
        color: #64748B;
    }

    .rec-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 0.75rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .rec-button {
        width: 100%;
        padding: 0.65rem;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 0.75rem;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .rec-button:hover {
        background: var(--secondary-color);
        color: white;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .content-row {
            flex-direction: column;
        }

        .sidebar-content {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .recommendation-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .article-title {
            font-size: 2rem;
        }

        .post-navigation {
            flex-direction: column;
        }

        .nav-post {
            max-width: 100%;
        }

        .nav-post.next {
            text-align: left;
        }

        .nav-post.next a {
            flex-direction: row;
        }
    }

    @media (max-width: 768px) {
        .article-header {
            padding: 160px 0 60px;
        }

        .article-title {
            font-size: 1.75rem;
        }

        .article-meta-info {
            gap: 1.5rem;
        }

        .recommendation-grid {
            grid-template-columns: 1fr;
        }

        .content-row {
            gap: 2rem;
        }
    }

    @media (max-width: 576px) {
        .article-header {
        padding: 150px 0 50px; /* Tambah untuk mobile kecil */
    }

        .article-title {
            font-size: 1.5rem;
        }

        .article-content {
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.25rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Article Header -->
<header class="article-header">
    <div class="article-header-content">
        <h1 class="article-title">{{ $post->title }}</h1>

        <div class="article-meta-info">
            <div class="meta-item">
                <div class="meta-label">Author :</div>
                <div class="meta-value">{{ $post->author->name }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Date :</div>
                <div class="meta-value">{{ $post->published_at->format('dS M y') }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Time :</div>
                <div class="meta-value">{{ max(1, (int) ceil(str_word_count(strip_tags($post->content))/200)) }} Min Read</div>
            </div>
        </div>
    </div>
</header>

<!-- Article Content -->
<div class="article-content-section">
    <div class="article-container">
        <div class="content-row">
            <!-- Main Content -->
            <div class="main-content">
                <!-- Featured Image -->
                @if($post->thumbnail)
                <div class="featured-image-wrapper">
                    <img src="{{ Storage::url($post->thumbnail) }}"
                         alt="{{ $post->title }}"
                         loading="eager">
                </div>
                @endif

                <!-- Overview Section -->
                <div class="overview-section">
                    <h2 class="section-title">Overview</h2>

                    @if($post->excerpt)
                    <div class="article-content">
                        <p>{{ $post->excerpt }}</p>
                    </div>
                    @endif

                    <!-- Main Content -->
                    <div class="article-content">
                        {!! $post->content !!}
                    </div>
                </div>

                <!-- Next/Previous Navigation -->
                <nav class="post-navigation">
                    @if($prevPost)
                    <div class="nav-post prev">
                        <a href="{{ route('blog.show', $prevPost->slug) }}">
                            <div class="nav-icon">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="nav-content">
                                <div class="nav-label">Previous Post</div>
                                <div class="nav-title">{{ $prevPost->title }}</div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="nav-post prev"></div>
                    @endif

                    @if($nextPost)
                    <div class="nav-post next">
                        <a href="{{ route('blog.show', $nextPost->slug) }}">
                            <div class="nav-icon">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                            <div class="nav-content">
                                <div class="nav-label">Next Post</div>
                                <div class="nav-title">{{ $nextPost->title }}</div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="nav-post next"></div>
                    @endif
                </nav>
            </div>

            <!-- Sidebar -->
            <aside class="sidebar-content">
                <!-- Search -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Search Blog</h3>
                    <form action="{{ route('blog.index') }}" method="GET">
                        <input type="text"
                               name="search"
                               class="search-input"
                               placeholder="Search..."
                               value="{{ request('search') }}">
                    </form>
                </div>

                <!-- Recent Posts -->
                @if(isset($recentPosts) && $recentPosts->count() > 0)
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Recent Post</h3>
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
                                <div class="recent-post-date">{{ $recent->published_at->format('dS M y') }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </aside>
        </div>
    </div>
</div>

<!-- Recommendation Section -->
<section class="recommendation-section">
    <div class="container">
        <h2 class="recommendation-title">Lanjut Baca Yuk! Ini Rekomendasi Buat Kamu</h2>
        <p class="recommendation-subtitle">Baca lebih banyak tips, insight, dan informasi pembelajaran Bahasa Jerman.</p>

        @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <div class="recommendation-grid">
            @foreach($relatedPosts as $related)
            <article class="recommendation-card">
                <div class="recommendation-image-wrapper">
                    @if($related->thumbnail)
                    <img src="{{ Storage::url($related->thumbnail) }}"
                         alt="{{ $related->title }}"
                         class="recommendation-image"
                         loading="lazy">
                    @else
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80"
                         alt="{{ $related->title }}"
                         class="recommendation-image"
                         loading="lazy">
                    @endif
                    <div class="rec-badges">
                        <span class="rec-badge">{{ $related->category->name }}</span>
                    </div>
                </div>

                <div class="recommendation-content">
                    <div class="rec-meta">
                        <span><i class="bi bi-calendar-event"></i> {{ $related->published_at->format('d M Y') }}</span>
                        <span>•</span>
                        <span><i class="bi bi-person"></i> {{ $related->author->name }}</span>
                    </div>

                    <h3 class="rec-title">{{ $related->title }}</h3>

                    <a href="{{ route('blog.show', $related->slug) }}" class="rec-button">
                        Read More <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const articleContent = document.querySelector('.article-content');

    if (articleContent) {
        // Remove figcaptions
        const figcaptions = articleContent.querySelectorAll('figcaption');
        figcaptions.forEach(caption => caption.remove());

        // Remove text links that contain image filenames
        const links = articleContent.querySelectorAll('a[href*="storage"]');
        links.forEach(link => {
            // If link doesn't contain an image, remove it
            if (!link.querySelector('img')) {
                const text = link.textContent.trim();
                // Check if it looks like a filename
                if (text.match(/\.(png|jpg|jpeg|gif|webp|pdf)/i)) {
                    link.remove();
                }
            }
        });

        // Remove standalone text that looks like filenames
        const textNodes = [];
        const walker = document.createTreeWalker(
            articleContent,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );

        while(walker.nextNode()) {
            textNodes.push(walker.currentNode);
        }

        textNodes.forEach(node => {
            const text = node.textContent.trim();
            // Check if it's a filename pattern
            if (text.match(/^[a-zA-Z0-9_\-\.]+\.(png|jpg|jpeg|gif|webp)\s*\d+[\.,]\d+\s*(KB|MB|GB)$/i)) {
                node.textContent = '';
            }
        });

        // Remove empty paragraphs that might be left behind
        const paragraphs = articleContent.querySelectorAll('p');
        paragraphs.forEach(p => {
            const text = p.textContent.trim();
            // Remove if empty or only contains filename
            if (text === '' || text.match(/^[a-zA-Z0-9_\-\.]+\.(png|jpg|jpeg|gif|webp)/i)) {
                p.remove();
            }
        });

        // Wrap all content images in figure for better control
        const contentImages = articleContent.querySelectorAll('img:not(figure img)');
        contentImages.forEach(img => {
            if (!img.parentElement || img.parentElement.tagName !== 'FIGURE') {
                const figure = document.createElement('figure');
                img.parentNode.insertBefore(figure, img);
                figure.appendChild(img);
            }
        });
    }
});
</script>
@endpush
@endsection
