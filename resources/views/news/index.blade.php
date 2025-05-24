@extends('layouts.app')

@section('content')
    <h5 class="mb-4">🆕 Latest News</h5>

    <div class="row">
        <div class="container1">
            <div class="item1">
               <div class="content">
                 @if ($firstNews->image)
                   <img src="{{asset('storage/' . $firstNews->image)}}" alt="Big Image">
                 @else
                   <img src="https://placehold.co/800x600" alt="Big Image">
                 @endif
                 <div class="text-overlay">
                   <h6>{{$firstNews->category->name}}</h6>
                   <h4>{{$firstNews->title}}</h4>
                   <p>{{ \Illuminate\Support\Str::limit($firstNews->content, 60) }}</p>
                 </div>
               </div>
           </div>
            <div class="column">
                @foreach ($nextTwo as $columnOneRecords)
                  <div class="item2">
                     <div class="content">
                       @if ($columnOneRecords->image)
                         <img src="{{asset('storage/' . $columnOneRecords->image)}}" alt="One">
                       @else
                         <img src="https://placehold.co/800x600" alt="Big Image">
                       @endif
                        <div class="text-overlay">
                          <h6 style="font-size: 12px">{{$columnOneRecords->category->name}}</h6>
                          <b><p>{{$columnOneRecords->title}}</p></b>
                        </div>
                     </div>
                  </div>
                @endforeach
            </div>
            <div class="column">
                @foreach ($twoMore as $columnTwoRecords)
                  <div class="item3">
                  <div class="content">
                    @if ($columnTwoRecords->image)
                      <img src="{{asset('storage/' . $columnTwoRecords->image)}}" alt="One">
                    @else
                      <img src="https://placehold.co/800x600" alt="Big Image">
                    @endif
                     <div class="text-overlay">
                       <h6 style="font-size: 12px">{{$columnTwoRecords->category->name}}</h6>
                       <b><p>{{$columnTwoRecords->title}}</p></b>
                     </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="newsCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
           <div class="carousel-inner">
              @foreach ($restOfTheRecords->chunk(4) as $chunkIndex => $chunk)
                  <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                     <div class="row justify-content-center">
                        @foreach ($chunk as $item)
                            <div class="col-md-3">
                               <div class="card h-100">
                                  @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                                    @else
                                        <img src="https://placehold.co/600x300" class="card-img-top" alt="No image">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                       <h6 class="card-title">{{ $item->title }}</h6>
                                       <p class="card-text text-muted">
                                           {{ $item->created_at->format('M d, Y') }} | By <em>{{ $item->author->name }}</em>
                                       </p>
                                       <p class="card-text">{{ \Illuminate\Support\Str::limit($item->content, 40) }}</p>
                                       <a href="{{ route('news.show', $item) }}" class="btn btn-sm btn-outline-primary mt-auto">Read more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                     </div>
                  </div>
             @endforeach
          </div>
          <!-- Custom Controls and Indicators -->
          <div class="d-flex justify-content-center align-items-center mt-4">
              <div class="d-flex justify-content-between align-items-center w-100" style="max-width: 300px;">
              <!-- Prev Button -->
                 <button class="btn btn-outline-primary btn-sm px-3" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                  Prev
                 </button>
   
                 <!-- Indicators -->
                 <div class="d-flex gap-2 align-items-center">
                    @foreach ($restOfTheRecords->chunk(4) as $chunkIndex => $chunk)
                       <button type="button"
                           data-bs-target="#newsCarousel"
                           data-bs-slide-to="{{ $chunkIndex }}"
                           class="indicator-dot {{ $chunkIndex === 0 ? 'active' : '' }}"
                           aria-label="Slide {{ $chunkIndex + 1 }}">
                       </button>
                    @endforeach
                 </div>
   
               <!-- Next Button -->
                 <button class="btn btn-outline-primary btn-sm px-3" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                 Next
                 </button>
               </div>
           </div>
        </div>
        <div class="container mt-5">
          <div class="d-flex align-items-center border-bottom mb-3 pb-2">
             <h5 class="me-4 text-uppercase fw-bold text-warning mb-0">Don't Miss</h5>
             <nav class="nav" style="text-align:center;">
                @foreach (\App\Models\Category::all() as $categoriesList)
                  <a class="nav-link px-2 active" href="#">{{$categoriesList->name}}</a>
                @endforeach
             </nav>
          </div>
          <div class="row gx-4">
                <!-- Left Large Image -->
               <div class="col-md-6">
                 <div class="card h-100 featured-news">
                   <img src="https://placehold.co/600x400" class="card-img-top" alt="Featured">
                   <div class="card-body">
                     <span class="badge bg-dark mb-2">New Look</span>
                     <h5 class="card-title">Top Fashion Trends to Look for in Every Important Collection</h5>
                     <p class="card-text text-muted">By Armin Vans | August 7, 2019</p>
                     <p class="card-text">We woke reasonably late following the feast and free flowing wine the night before...</p>
                   </div>
                 </div>
               </div>

          <!-- Right 4 Small News -->
               <div class="col-md-6 d-flex flex-column justify-content-between">
                 <div class="d-flex mb-3 small-news">
                   <img src="https://placehold.co/100x80" class="me-3 img-thumbnail" alt="Thumb 1" style="width:100px;">
                   <div>
                     <h6 class="mb-1">Spring Fashion Show at the University of Michigan Has</h6>
                     <p class="text-muted mb-0">August 7, 2019</p>
                   </div>
                 </div>
                 <div class="d-flex mb-3 small-news">
                   <img src="https://placehold.co/100x80" class="me-3 img-thumbnail" alt="Thumb 2" style="width:100px;">
                   <div>
                     <h6 class="mb-1">Study 2020: Fake Engagement is Only Half the Problem</h6>
                     <p class="text-muted mb-0">August 7, 2019</p>
                   </div>
                 </div>
                 <div class="d-flex mb-3 small-news">
                   <img src="https://placehold.co/100x80" class="me-3 img-thumbnail" alt="Thumb 3" style="width:100px;">
                   <div>
                     <h6 class="mb-1">Laptop with 128-bit Processor, 32GB of RAM and 24MP Front Camera</h6>
                     <p class="text-muted mb-0">August 7, 2019</p>
                   </div>
                 </div>
                 <div class="d-flex small-news">
                   <img src="https://placehold.co/100x80" class="me-3 img-thumbnail" alt="Thumb 4" style="width:100px;">
                   <div>
                     <h6 class="mb-1">Flying Over the Grand Canyon with a Helicopter</h6>
                     <p class="text-muted mb-0">August 7, 2019</p>
                   </div>
                 </div>
               </div>
            </div>
        </div>
    </div>
    {{-- $news->links() --}}
@endsection