@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}">
        @else
            <img src="https://placehold.co/700x300" class="card-img-top" alt="No image">
        @endif

        <div class="card-body">
            <h3 class="card-title">{{ $news->title }}</h3>
            <p class="text-muted">
                Category: <strong>{{ $news->category->name }}</strong> |
                By: <em>{{ $news->author->name }}</em> |
                {{ $news->created_at->format('M d, Y') }}
            </p>

            <p class="card-text">{!! nl2br(e($news->content)) !!}</p>

            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">← Back to News</a>
        </div>
    </div>
@endsection 