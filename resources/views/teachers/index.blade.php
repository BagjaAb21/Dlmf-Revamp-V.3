@extends('layouts.app')

@section('title', 'Guru - Deutsch Lernen mit Fara')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Guru Kami</h1>

    <div class="row">
        @foreach($teachers as $teacher)
        <div class="col-md-3 mb-4">
            <div class="teacher-card">
                @if($teacher->photo)
                <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" class="teacher-photo">
                @else
                <img src="https://via.placeholder.com/150" alt="{{ $teacher->name }}" class="teacher-photo">
                @endif
                <h5>{{ $teacher->name }}</h5>
                <p class="text-muted mb-1">Level {{ $teacher->level }}</p>
                <p class="small mb-1"><strong>Lulusan:</strong> {{ $teacher->education }}</p>
                <p class="small text-primary"><strong>Pengalaman:</strong> {{ $teacher->experience }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
