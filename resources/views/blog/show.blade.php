@extends('layouts.app')

@section('title', $post->title . ' - Deutsch Lernen mit Fara')

@section('content')
<article class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Post Header -->
                <header class="mb-5">
                    <h1 class="mb-3">{{ $post->title }}</h1>
                    <div class="d-flex align-items-center text-muted mb-4">
                        <span>Oleh {{ $post->author->name }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->published_at->format('d F Y') }}</span>
                        <span class="mx-2">•</span>
                        <span class="badge bg-primary">{{ $post->category->name }}</span>
                    </div>
                    @if($post->thumbnail)
                    <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="img-fluid rounded">
                    @endif
                </header>

                <!-- Post Content -->
                <div class="post-content">
                    <p class="lead">{{ $post->excerpt }}</p>
                    {!! $post->content !!}
                </div>

                <!-- Share Buttons -->
                <div class="my-5">
                    <h5>Bagikan artikel ini:</h5>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-facebook"></i> Facebook</a>
                        <a href="#" class="btn btn-sm btn-info text-white"><i class="bi bi-twitter"></i> Twitter</a>
                        <a href="#" class="btn btn-sm btn-success"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Artikel Terkait</h3>
            </div>
            @foreach($relatedPosts as $related)
            <div class="col-md-4 mb-4">
                <div class="card blog-card h-100">
                    @if($related->thumbnail)
                    <img src="{{ Storage::url($related->thumbnail) }}" class="card-img-top" alt="{{ $related->title }}">
                    @else
                    <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="{{ $related->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $related->title }}</h5>
                        <p class="card-text">{{ Str::limit($related->excerpt, 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('blog.show', $related->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</article>
@endsection
