@extends('layouts.app')

@section('title', 'Blog - Deutsch Lernen mit Fara')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Blog & Artikel</h1>

    <!-- Categories -->
    <div class="mb-4">
        <h5>Kategori:</h5>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-primary {{ !request('category') ? 'active' : '' }}">
                Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('blog.category', $category->slug) }}"
               class="btn btn-sm btn-outline-primary {{ request()->is('blog/category/'.$category->slug) ? 'active' : '' }}">
                {{ $category->name }} ({{ $category->posts_count }})
            </a>
            @endforeach
        </div>
    </div>

    <!-- Blog Posts -->
    <div class="row">
        @forelse($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card blog-card h-100">
                @if($post->thumbnail)
                <img src="{{ Storage::url($post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}">
                @else
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <div class="mb-2">
                        <span class="badge bg-primary">{{ $post->category->name }}</span>
                    </div>
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $post->author->name }}</small>
                        <small class="text-muted">{{ $post->published_at->format('d M Y') }}</small>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum ada artikel yang dipublikasikan.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
