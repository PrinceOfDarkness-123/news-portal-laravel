@extends('layouts.app')

@section('content')
    <h5 class="mb-4">🆕 Category: {{$category_name}}</h5>

    <div class="row">
            @foreach($newsByCategory as $item)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                    @else
                        <img src="https://placehold.co/600x300" style="width: 100%; height: 300px; object-fit: cover;" class="card-img-top" alt="No image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text text-muted">
                            {{ $item->created_at->format('M d, Y') }} | By <em>{{ $item->author->name }}</em>
                        </p>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($item->content, 120) }}</p>
                        <a href="{{ route('news.show', $item) }}" class="mt-auto btn btn-sm btn-outline-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $newsByCategory->links() }}
@endsection