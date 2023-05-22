@extends('layouts.app')

@section('sectioncss')
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <h1>{{$weather}}</h1>
    <h1>Waaaaaaaaow4</h1>
    <div id="carouselExample" class="carousel slide carousel-container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{'https://storage.googleapis.com/project-bike/'.'Bi.jpg'.'?authuser=2'}}" class="d-block w-100 image" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{'https://storage.googleapis.com/project-bike/'.'Bi.jpg'.'?authuser=2'}}" class="d-block w-100 image" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{'https://storage.googleapis.com/project-bike/'.'Bi.jpg'.'?authuser=2'}}" class="d-block w-100 image" alt="...">
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
    <div class="search-container">
        @livewire('bikes.search-bike')
    </div>
</div>

@endsection
