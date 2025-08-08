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
    }

    body {
        background-color: var(--light-gray);
    }

    /* Article Styling */
    article {
        padding-top: 120px;
        background: white;
        margin-top: -20px;
    }

    .post-header {
        background: white;
        padding: 3rem 0 2rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .post-header h1 {
        font-size: 2.5rem;
        font-weight: 800;
        line-height: 1.2;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
    }

    .post-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
        font-size: 0.95rem;
        color: #64748B;
    }

    .post-meta .badge.bg-primary {
        background: var(--primary-color) !important;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .post-meta .author-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
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
        font-weight: 600;
        font-size: 0.9rem;
    }

    .post-thumbnail {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .post-thumbnail img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Post Content */
    .post-content {
        background: white;
        padding: 2rem 0;
        line-height: 1.8;
        font-size: 1.1rem;
        color: var(--text-dark);
    }

    .post-content .lead {
        font-size: 1.3rem;
        font-weight: 500;
        color: #64748B;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: var(--light-gray);
        border-radius: 15px;
        border-left: 4px solid var(--primary-color);
    }

    .post-content h2,
    .post-content h3,
    .post-content h4 {
        color: var(--text-dark);
        font-weight: 700;
        margin: 2rem 0 1rem;
    }

    .post-content h2 {
        font-size: 1.8rem;
    }

    .post-content h3 {
        font-size: 1.5rem;
    }

    .post-content h4 {
        font-size: 1.3rem;
    }

    .post-content p {
        margin-bottom: 1.5rem;
    }

    .post-content ul,
    .post-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }

    .post-content li {
        margin-bottom: 0.5rem;
    }

    .post-content blockquote {
        background: var(--light-gray);
        border-left: 4px solid var(--primary-color);
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 15px;
        font-style: italic;
        color: #64748B;
    }

    /* Share Buttons */
    .share-section {
        background: var(--light-gray);
        padding: 2rem;
        border-radius: 20px;
        margin: 3rem 0;
        text-align: center;
    }

    .share-section h5 {
        color: var(--text-dark);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .share-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .share-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .share-btn.facebook {
        background: #1877F2;
        color: white;
    }

    .share-btn.twitter {
        background: #1DA1F2;
        color: white;
    }

    .share-btn.whatsapp {
        background: #25D366;
        color: white;
    }

    /* Related Posts */
    .related-posts {
        background: var(--light-gray);
        padding: 4rem 0;
        margin-top: 4rem;
    }

    .related-posts h3 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 2rem;
        text-align: center;
    }

    .related-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(124, 58, 237, 0.1);
    }

    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(124, 58, 237, 0.15);
        border-color: var(--primary-color);
    }

    .related-card .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .related-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .related-card .card-body {
        padding: 1.5rem;
    }

    .related-card .card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1.4;
        margin-bottom: 0.75rem;
    }

    .related-card .card-text {
        color: #64748B;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .related-card .card-footer {
        background: transparent !important;
        border-top: 1px solid #e2e8f0;
        padding: 1rem 1.5rem;
    }

    .related-card .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .related-card .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(124, 58, 237, 0.3);
    }

    /* Navigation */
    .post-navigation {
        background: white;
        padding: 2rem 0;
        border-top: 1px solid #e2e8f0;
        margin-top: 3rem;
    }

    .nav-btn {
        background: var(--light-gray);
        border: 2px solid #e2e8f0;
        padding: 1rem 1.5rem;
        border-radius: 15px;
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nav-btn:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    /* Animation Effects */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }

    .animate-on-scroll.animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        article {
            padding-top: 100px;
        }

        .post-header {
            padding: 2rem 0 1.5rem;
        }

        .post-header h1 {
            font-size: 2rem;
            line-height: 1.3;
        }

        .post-meta {
            gap: 0.5rem;
        }

        .post-content {
            padding: 1.5rem 0;
        }

        .post-content .lead {
            font-size: 1.2rem;
            padding: 1rem;
        }

        .share-buttons {
            flex-direction: column;
            align-items: center;
        }

        .share-btn {
            width: 200px;
            justify-content: center;
        }

        .related-posts {
            padding: 3rem 0;
        }

        .related-posts h3 {
            font-size: 1.75rem;
        }

        .related-card .card-img-top {
            height: 180px;
        }

        .related-card .card-body {
            padding: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .post-header h1 {
            font-size: 1.75rem;
        }

        .post-content {
            font-size: 1rem;
        }

        .post-content .lead {
            font-size: 1.1rem;
        }

        .share-section {
            padding: 1.5rem;
        }

        .related-posts h3 {
            font-size: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<article>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Post Header -->
                <header class="post-header">
                    <h1>{{ $post->title }}</h1>
                    <div class="post-meta">
                        <div class="author-info">
                            <div class="author-avatar">
                                {{ substr($post->author->name, 0, 1) }}
                            </div>
                            <span>Oleh {{ $post->author->name }}</span>
                        </div>
                        <span class="mx-2">•</span>
                        <span>{{ $post->published_at->format('d F Y') }}</span>
                        <span class="mx-2">•</span>
                        <span class="badge bg-primary">{{ $post->category->name }}</span>
                    </div>
                    @if($post->thumbnail)
                    <div class="post-thumbnail">
                        <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="img-fluid">
                    </div>
                    @else
                    <div class="post-thumbnail">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $post->title }}" class="img-fluid">
                    </div>
                    @endif
                </header>

                <!-- Post Content -->
                <div class="post-content">
                    @if($post->excerpt)
                    <p class="lead">{{ $post->excerpt }}</p>
                    @endif
                    {!! $post->content !!}
                </div>

                <!-- Share Buttons -->
                <div class="share-section">
                    <h5><i class="bi bi-share me-2"></i>Bagikan artikel ini:</h5>
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           class="share-btn facebook" target="_blank">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}"
                           class="share-btn twitter" target="_blank">
                            <i class="bi bi-twitter"></i> Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}"
                           class="share-btn whatsapp" target="_blank">
                            <i class="bi bi-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Post Navigation -->
                <div class="post-navigation">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('blog.index') }}" class="nav-btn">
                            <i class="bi bi-arrow-left"></i> Kembali ke Blog
                        </a>
                        <a href="{{ route('blog.index') }}" class="nav-btn">
                            Artikel Lainnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Related Posts -->
@if($relatedPosts->count() > 0)
<section class="related-posts">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Artikel Terkait</h3>
            </div>
            @foreach($relatedPosts as $related)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card related-card h-100 animate-on-scroll">
                    @if($related->thumbnail)
                    <img src="{{ Storage::url($related->thumbnail) }}" class="card-img-top" alt="{{ $related->title }}">
                    @else
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="{{ $related->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $related->title }}</h5>
                        <p class="card-text">{{ Str::limit($related->excerpt, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog.show', $related->slug) }}" class="btn btn-primary btn-sm">
                            Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
// Animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};
