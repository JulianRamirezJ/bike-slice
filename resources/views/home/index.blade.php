@extends('layouts.app')
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="mb-2">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
      </div>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner" style="height: 200px;">
            <div class="carousel-item active">
                <img src="https://cdnb.artstation.com/p/assets/images/images/038/132/269/large/rnj-krishna-sanjeev-jangid-bike-cycle-banner.jpg?1622254445"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdnb.artstation.com/p/assets/images/images/038/132/269/large/rnj-krishna-sanjeev-jangid-bike-cycle-banner.jpg?1622254445"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdnb.artstation.com/p/assets/images/images/038/132/269/large/rnj-krishna-sanjeev-jangid-bike-cycle-banner.jpg?1622254445"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div id="show_all_container">
        <div id="item-container">
            @foreach ($viewData["bikes"] as $bike)
                <a href="{{route('user.bike.show', ['id'=>$bike->getId()])}}">
                    <div class="item">
                        <img src="{{ URL::asset('storage/'.$bike->getImage()) }}"/>
                        <p class="item_title"> {{$bike->name}} </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection