{{-- resources/views/blog/show.blade.php --}}
@extends('layouts.app')

@section('title', ($post->title ?? 'Blog') . ' - Deutsch Lernen mit Fara')

@push('styles')
<style>
    :root {
        --primary-color: #7C3AED;
        --secondary-color: #A855F7;
        --accent-color: #FDE047;
        --dark-blue: #0f172a;
        --light-gray: #F8FAFC;
        --text-dark: #334155;
        --overlay-dark: rgba(2, 6, 23, 0.70);
        --ring: rgba(124, 58, 237, .15);
    }

    body {
        background: #fff;
    }

    /* ===== HERO ===== */
    .blog-hero {
        position: relative;
        height: 540px;
        display: flex;
        align-items: center;
        overflow: hidden
    }

    .blog-hero .bg {
        position: absolute;
        inset: 0;
        background-position: center;
        background-size: cover;
        transform: scale(1.08);
        filter: brightness(.9)
    }

    .blog-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(60% 60% at 50% 40%, rgba(124, 58, 237, .35), transparent 60%),
            linear-gradient(180deg, var(--overlay-dark), rgba(2, 6, 23, .35) 50%, rgba(2, 6, 23, .15))
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: #fff;
        text-align: center;
        max-width: 980px;
        margin: 0 auto;
        padding: 5.75rem 1rem 2rem
    }

    .breadcrumbs {
        display: flex;
        gap: .5rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: .5rem;
        font-size: .925rem;
        opacity: .9
    }

    .breadcrumbs a {
        color: #e2e8f0;
        text-decoration: none
    }

    .breadcrumbs a:hover {
        text-decoration: underline
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: rgba(255, 255, 255, .12);
        border: 1px solid rgba(255, 255, 255, .25);
        border-radius: 999px;
        padding: .4rem 1rem;
        font-weight: 600
    }

    .hero-title {
        font-size: clamp(1.9rem, 3.4vw + .8rem, 3.25rem);
        font-weight: 800;
        line-height: 1.15;
        margin: .9rem 0 1rem;
        text-shadow: 0 8px 28px rgba(0, 0, 0, .35)
    }

    .hero-meta {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
        opacity: .95
    }

    .chip {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        padding: .45rem .8rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, .10);
        border: 1px solid rgba(255, 255, 255, .18)
    }

    .author-avatar {
        width: 36px;
        height: 36px;
        border-radius: 999px;
        background: linear-gradient(135deg, var(--accent-color), #facc15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e293b;
        font-weight: 800
    }

    /* ===== ARTICLE CARD ===== */
    .blog-content {
        position: relative;
        padding: 4rem 0 5rem
    }

    .content-wrapper {
        max-width: 980px;
        margin: -90px auto 0;
        background: #fff;
        border-radius: 1.25rem;
        border: 1px solid var(--ring);
        box-shadow: 0 18px 60px rgba(15, 23, 42, .10);
        padding: clamp(1.25rem, 2vw + .5rem, 2.5rem)
    }

    .post-thumbnail {
        border-radius: 1rem;
        overflow: hidden;
        position: relative;
        margin-bottom: 1.5rem
    }

    .post-thumbnail img {
        width: 100%;
        height: 440px;
        object-fit: cover;
        display: block;
        transform: scale(1.01);
        transition: transform .6s ease
    }

    .post-thumbnail:hover img {
        transform: scale(1.05)
    }

    .post-content {
        color: #334155;
        line-height: 1.85;
        font-size: 1.08rem
    }

    .post-excerpt {
        font-size: 1.15rem;
        color: #475569;
        background: linear-gradient(135deg, var(--light-gray), #eef2ff);
        border-left: 4px solid var(--primary-color);
        border-radius: .85rem;
        padding: 1.1rem 1.25rem;
        margin: 1.25rem 0 1.75rem
    }

    .post-content h2,
    .post-content h3,
    .post-content h4 {
        color: #0f172a;
        font-weight: 800;
        margin: 2rem 0 1rem
    }

    .post-content h2 {
        font-size: 1.75rem;
        border-bottom: 2px solid rgba(124, 58, 237, .25);
        padding-bottom: .35rem
    }

    .post-content img {
        max-width: 100%;
        border-radius: .75rem
    }

    /* Tags */
    .tag-list {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem
    }

    .tag {
        display: inline-flex;
        align-items: center;
        gap: .35rem;
        padding: .35rem .7rem;
        border-radius: .6rem;
        border: 1px solid var(--ring)
    }

    /* Sidebar */
    .sidebar {
        position: sticky;
        top: 120px
    }

    .sidebar-section {
        background: #fff;
        border-radius: 1rem;
        border: 1px solid var(--ring);
        box-shadow: 0 12px 30px rgba(15, 23, 42, .06);
        padding: 1.25rem;
        margin-bottom: 1rem
    }

    .sidebar-title {
        font-weight: 800;
        color: #0f172a;
        text-align: center;
        margin-bottom: .75rem
    }

    .search-input {
        width: 100%;
        padding: .8rem 1rem;
        border: 1.6px solid #e2e8f0;
        border-radius: .75rem
    }

    .search-input:focus {
        outline: 0;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px var(--ring)
    }

    /* Index-like Recent Cards */
    .idx-card {
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid var(--ring);
        box-shadow: 0 14px 36px rgba(15, 23, 42, .08)
    }

    .idx-card .thumb {
        height: 200px;
        object-fit: cover
    }

    .idx-cat {
        position: absolute;
        left: 12px;
        top: 12px;
        background: rgba(255, 255, 255, .92);
        color: #0f172a;
        border: 1px solid var(--ring)
    }

    /* Related */
    .related-posts {
        background: var(--light-gray);
        padding: 4rem 0 4.5rem;
        margin-top: 3.5rem
    }

    .related-posts h3 {
        font-weight: 800;
        color: #0f172a;
        text-align: center;
        margin-bottom: .35rem
    }

    .related-desc {
        text-align: center;
        color: #64748b;
        margin-bottom: 1.75rem
    }

    .related-card {
        border: 1px solid var(--ring);
        border-radius: 1rem;
        overflow: hidden;
        background: #fff;
        transition: transform .25s ease, box-shadow .25s ease
    }

    .related-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(124, 58, 237, .18)
    }

    .related-card .card-img-top {
        height: 190px;
        object-fit: cover
    }

    /* Share + Nav */
    .share-section {
        background: linear-gradient(135deg, var(--light-gray), #eef2ff);
        border: 1px solid var(--ring);
        border-radius: 1rem;
        padding: 1.25rem;
        margin: 1.75rem 0
    }

    .share-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        justify-content: center
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        padding: .55rem .9rem;
        border-radius: .65rem;
        border: 1px solid var(--ring)
    }

    .share-btn:hover {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px var(--ring)
    }

    .post-navigation {
        border-top: 1px solid #e2e8f0;
        margin-top: 1.5rem;
        padding-top: 1.25rem
    }

    .nav-btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        border: 1px solid var(--ring);
        padding: .65rem .9rem;
        border-radius: .65rem
    }

    .nav-btn:hover {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px var(--ring)
    }

    /* Anim */
    .aos {
        opacity: 0;
        transform: translateY(18px);
        transition: all .6s ease
    }

    .aos.on {
        opacity: 1;
        transform: none
    }

    @media (max-width:992px) {
        .content-wrapper {
            margin: -70px 1rem 0
        }

        .sidebar {
            position: static;
            margin-top: 1rem
        }
    }
</style>
@endpush

@php
$title = $post->title ?? 'Untitled';
$authorName = optional($post->author)->name ?? 'Admin';
$categoryName = optional($post->category)->name ?? 'Umum';
$thumb = $post->thumbnail ? Storage::url($post->thumbnail)
: 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=1200&auto=format&fit=crop';
$cover = $post->cover ? Storage::url($post->cover) : $thumb;
$date = optional($post->published_at ?? $post->created_at)->translatedFormat('d M Y');
$readMin = max(1, (int) ceil(str_word_count(strip_tags($post->content ?? ''))/200)); /* ~200wpm */
$recent = isset($recentPosts) ? $recentPosts : collect(); /* pass dari controller */
@endphp

@section('content')
<!-- HERO -->
<section class="blog-hero" aria-label="Article header">
    <div class="bg" style="background-image:url('{{ $cover }}');" data-parallax></div>
    <div class="container">
        <div class="hero-content">
            <nav class="breadcrumbs" aria-label="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a><span>›</span>
                <a href="{{ route('blog.index') }}">Blog</a><span>›</span>
                <span aria-current="page">{{ Str::limit($title, 60) }}</span>
            </nav>
            <span class="hero-badge"><i class="bi bi-tag me-1"></i>{{ $categoryName }}</span>
            <h1 class="hero-title">{{ $title }}</h1>
            <div class="hero-meta">
                <span class="chip"><span class="author-avatar">{{ strtoupper(substr($authorName,0,1)) }}</span>{{
                    $authorName }}</span>
                <span class="chip"><i class="bi bi-calendar-event"></i> {{ $date }}</span>
                <span class="chip"><i class="bi bi-clock"></i> {{ $readMin }} Min Read</span>
            </div>
        </div>
    </div>
</section>

<!-- CONTENT -->
<section class="blog-content">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-8">
                <div class="content-wrapper">
                    <div class="post-thumbnail aos">
                        <noscript><img src="{{ $thumb }}" alt="{{ $title }}" class="img-fluid"></noscript>
                        <img src="{{ $thumb }}" alt="{{ $title }}" class="img-fluid" loading="lazy"
                            onload="this.previousElementSibling?.remove();">
                    </div>

                    <div class="post-content">
                        @if(!empty($post->excerpt))
                        <div class="post-excerpt aos">{{ $post->excerpt }}</div>
                        @endif

                        <div class="aos">{!! $post->content !!}</div>

                        @if(!empty($post->tags))
                        <hr>
                        <div class="tag-list aos">
                            @foreach((array) $post->tags as $tag)
                            <a class="tag text-decoration-none" href="{{ route('blog.index', ['tag' => $tag]) }}"><i
                                    class="bi bi-hash"></i>{{ $tag }}</a>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <div class="share-section aos" aria-label="Bagikan artikel">
                        <div class="share-buttons">
                            <a class="share-btn" target="_blank" rel="noopener"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}">
                                <i class="bi bi-facebook"></i> Facebook</a>
                            <a class="share-btn" target="_blank" rel="noopener"
                                href="https://twitter.com/intent/tweet?text={{ urlencode($title) }}&url={{ urlencode(request()->fullUrl()) }}">
                                <i class="bi bi-twitter-x"></i> Twitter</a>
                            <a class="share-btn" target="_blank" rel="noopener"
                                href="https://wa.me/?text={{ urlencode($title.' - '.request()->fullUrl()) }}">
                                <i class="bi bi-whatsapp"></i> WhatsApp</a>
                            <button class="share-btn" id="copyLinkBtn" type="button"><i class="bi bi-link-45deg"></i>
                                Copy Link</button>
                        </div>
                    </div>

                    <div class="post-navigation d-flex justify-content-between flex-wrap gap-2 aos">
                        @if(!empty($prevPost))
                        <a href="{{ route('blog.show', $prevPost->slug ?? $prevPost->id) }}" class="nav-btn">
                            <i class="bi bi-arrow-left"></i> {{ Str::limit($prevPost->title, 36) }}
                        </a>
                        @else
                        <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('blog.index') }}"
                            class="nav-btn">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        @endif

                        @if(!empty($nextPost))
                        <a href="{{ route('blog.show', $nextPost->slug ?? $nextPost->id) }}" class="nav-btn">
                            {{ Str::limit($nextPost->title, 36) }} <i class="bi bi-arrow-right"></i>
                        </a>
                        @else
                        <a href="{{ route('blog.index') }}" class="nav-btn">Artikel Lainnya <i
                                class="bi bi-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- SIDEBAR (search only, tanpa recent karena recent versi index ada di bawah) -->
            <aside class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-section aos">
                        <h4 class="sidebar-title">Search Blog</h4>
                        <form action="{{ route('blog.index') }}" method="GET" role="search" aria-label="Search posts">
                            <input class="search-input" type="search" name="q" value="{{ request('q') }}"
                                placeholder="Cari artikel…">
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- Recent Posts (gaya card seperti index.blade.php) --}}
@if(isset($recent) && $recent->count())
<section class="py-4 py-md-5" style="background:#fff;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-3 mb-md-4 aos">
            <div>
                <h3 class="m-0 fw-bold" style="color:#0f172a;">Recent Posts</h3>
                <div class="text-muted">Artikel terbaru dari blog kami</div>
            </div>
            <a href="{{ route('blog.index') }}" class="nav-btn text-decoration-none">Lihat Semua <i
                    class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($recent as $item)
            @php
            $iTitle = $item->title ?? 'Untitled';
            $iLink = route('blog.show', $item->slug ?? $item->id);
            $iImg = $item->thumbnail ? Storage::url($item->thumbnail)
            : 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=900&auto=format&fit=crop';
            $iCat = optional($item->category)->name ?? 'Umum';
            $iDate = optional($item->published_at ?? $item->created_at)->translatedFormat('d M Y');
            $iExcerpt= Str::limit($item->excerpt ?: strip_tags($item->content), 120);
            @endphp
            <div class="col-12 col-sm-6 col-lg-4">
                <article class="idx-card h-100 aos">
                    <a href="{{ $iLink }}" class="d-block position-relative" style="line-height:0;">
                        <img src="{{ $iImg }}" alt="{{ $iTitle }}" class="w-100 thumb"
                            style="height:200px;object-fit:cover">
                        <span class="badge rounded-pill idx-cat">{{ $iCat }}</span>
                    </a>
                    <div class="p-3">
                        <a href="{{ $iLink }}" class="text-decoration-none">
                            <h5 class="fw-bold mb-1" style="color:#0f172a;">{{ $iTitle }}</h5>
                        </a>
                        <div class="small text-muted mb-2">{{ $iDate }}</div>
                        <p class="text-muted m-0">{{ $iExcerpt }}</p>
                    </div>
                    <div class="px-3 pb-3">
                        <a href="{{ $iLink }}" class="nav-btn text-decoration-none">Baca Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Related --}}
@if(isset($relatedPosts) && $relatedPosts->count())
<section class="related-posts">
    <div class="container">
        <h3 class="aos">Lanjut Baca Yuk! Ini Rekomendasi Buat Kamu</h3>
        <p class="related-desc aos">Baca artikel seputar tips, teknik, dan informasi pembelajaran Bahasa Jerman.</p>
        <div class="row g-4">
            @foreach($relatedPosts as $related)
            @php
            $rTitle = $related->title ?? 'Untitled';
            $rLink = route('blog.show', $related->slug ?? $related->id);
            $rImg = $related->thumbnail ? Storage::url($related->thumbnail)
            : 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=600&auto=format&fit=crop';
            $rDate = optional($related->published_at ?? $related->created_at)->translatedFormat('d M Y');
            @endphp
            <div class="col-12 col-sm-6 col-lg-4">
                <a class="card related-card d-block text-decoration-none aos" href="{{ $rLink }}">
                    <img src="{{ $rImg }}" class="card-img-top" alt="{{ $rTitle }}" loading="lazy">
                    <div class="card-body">
                        <div class="small text-muted mb-1">{{ $rDate }}</div>
                        <div class="fw-semibold text-dark">{{ $rTitle }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@push('scripts')
<script>
    // Parallax
    const bg = document.querySelector('.blog-hero .bg');
    if (bg) {
        window.addEventListener('scroll', () => {
            const y = Math.min(60, window.scrollY * 0.06);
            bg.style.transform = `scale(1.08) translateY(${y}px)`;
        }, { passive: true });
    }

    // AOS-like intersection
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); io.unobserve(e.target); } });
    }, { threshold: .14, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.aos').forEach(el => io.observe(el));

    // Copy link
    const copyBtn = document.getElementById('copyLinkBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', async () => {
            try {
                await navigator.clipboard.writeText(window.location.href);
                copyBtn.innerHTML = '<i class="bi bi-check2"></i> Tersalin';
                setTimeout(() => copyBtn.innerHTML = '<i class="bi bi-link-45deg"></i> Copy Link', 1800);
            } catch (err) { alert('Gagal menyalin tautan'); }
        });
    }
</script>
@endpush
@endsection
