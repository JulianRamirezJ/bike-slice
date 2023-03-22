@extends('layouts.app')

@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div id="carouselExample" class="carousel slide carousel-container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdnb.artstation.com/p/assets/images/images/038/132/269/large/rnj-krishna-sanjeev-jangid-bike-cycle-banner.jpg?1622254445" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdnb.artstation.com/p/assets/images/images/038/132/269/large/rnj-krishna-sanjeev-jangid-bike-cycle-banner.jpg?1622254445" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdnb.artstation.com/p/assets/images/images/038/132/269/large/rnj-krishna-sanjeev-jangid-bike-cycle-banner.jpg?1622254445" class="d-block w-100" alt="...">
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

    <div class="row g-3">
    @foreach ($viewData["bikes"] as $bike)
    <div class="col-md-3 bikes-container">
        <a href="{{ route('login') }}" class="card-link">
        <div class="card">
            <img src="{{ URL::asset('storage/'.$bike->getImage()) }}" class="card-img-top" alt="{{ $bike->getName() }}" style="max-width: 100%;">
            <div class="card-body">
                <h5 class="card-title">{{ $bike->getName() }}</h5>
                <p class="card-text">{{ $bike->getPrice() }}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach
    </div>

</div>
@endsection
