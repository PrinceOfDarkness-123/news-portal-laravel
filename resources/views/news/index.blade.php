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
                   <img src="https://placehold.co/800x800" alt="Big Image">
                 @endif
                 <div class="text-overlay">
                   <h6>{{$firstNews->category->name}}</h6>
                   <a class="custom-link" href="{{ route('news.show', $firstNews->id) }}"><h4>{{$firstNews->title}}</h4></a>
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
                          <a class="custom-link" href="{{ route('news.show', $columnOneRecords->id) }}"><b><p>{{$columnOneRecords->title}}</p></b></a>
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
                       <a class="custom-link" href="{{ route('news.show', $columnTwoRecords->id) }}"><b><p>{{$columnTwoRecords->title}}</p></b></a>
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
                                       <a class="custom-link" href="{{ route('news.show', $item) }}"><h6 class="card-title">{{ $item->title }}</h6></a>
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
             <nav class="nav ms-auto">
                @foreach ($firstSevenCategories as $categoryItem)
                  <a class="nav-link nav-hover px-2 me-2 category-link {{ $activeMenu === 'category_'.$categoryItem->id ? 'fw-bold border-bottom border-primary' : '' }}" href="{{ route('news.index') }}" data-category-id="{{ $categoryItem->id }}">{{$categoryItem->name}}</a>
                @endforeach
                  @if ($moreCategories->isNotEmpty())
                    <a class="nav-link nav-hover dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                More
                </a>
                 <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   @foreach ($moreCategories as $categoryItem)
                     <li><a class="nav-link nav-hover px-2 active category-link" data-category-id="{{ $categoryItem->id }}" href="#">{{$categoryItem->name}}</a></li>
                   @endforeach
                 </ul>
                  @endif
             </nav>
          </div>
          <div id="news-section">
             @if (isset($featuredNews))
                 <div class="row gx-4">
                <!-- Left Large Image -->
               <div class="col-md-6">
                 <div class="card h-100 featured-news">
                  @if($featuredNews->image)
                    <img src="{{ asset('storage/' . $featuredNews->image) }}" class="card-img-top" alt="Featured">
                  @else
                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Featured">
                  @endif
                   <div class="card-body">
                     <a class="custom-link" href="{{ route('news.show', $featuredNews) }}"><h5 class="card-title">{{ $featuredNews->title }}</h5></a>

                     <p class="card-text text-muted">By {{($featuredNews->author->name) ?? 'unknown'}} | {{$featuredNews->created_at->format('F j, Y')}}</p>
                     
                     <p class="card-text">{{ Str::limit($featuredNews->content, 150) }}</p>
                     <a href="{{ route('news.show', $featuredNews) }}" class="btn btn-sm btn-outline-primary mt-auto">Read more</a>
                   </div>
                 </div>
               </div>

          <!-- Right 4 Small News -->
               <div class="col-md-6 d-flex flex-column justify-content-between">
                 <div class="small-news-container">
                    @foreach ($smallNews as $news)
                    <div class="small-news-item">
                       <div class="d-flex {{ count($smallNews) > 2 ? 'mb-3' : '' }} small-news">
                         @if ($news->image)
                           <img src="{{ asset('storage/' . $news->image) }}" class="me-3 img-thumbnail" alt="Thumb 1" style="width:100px;">
                         @else
                           <img src="https://placehold.co/100x80" class="me-3 img-thumbnail" alt="Thumb 1" style="width:100px;">
                         @endif
                         <div>
                           <a class="custom-link" href="{{ route('news.show', $news) }}"><h6 class="mb-1">{{ $news->title }}</h6></a>
                           <p class="text-muted mb-0">{{ $news->created_at->format('F j, Y') }}</p>
                         </div>
                 </div>
                    </div>
                 @endforeach
                 </div>
               </div>
            </div>
             @else
               <h5 style="text-align: center">No content related to this category</h5>
             @endif
          </div>
        </div>
    </div>
    {{-- $news->links() --}}
@endsection