@extends('layouts/app')
@section('title')
    {{$viewData["title"]}}
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container container-fluid text-dark text-center title">
        <h1>{{__('messages.view_bikes') }}</h1>
</div>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    <a href="{{ route('user.bike.create') }}" class="btn btn-outline bg-success text-white btn-lg">
        {{__('messages.create_bike') }}
    </a>
    <div class="row g-3">
    @foreach ($viewData["bikes"] as $bike)
    <div class="col-md-3 bikes-container">
        <a href="{{ route('user.bike.show', ['id'=>$bike->getId()]) }}" class="card-link">
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
</div>
@endsection