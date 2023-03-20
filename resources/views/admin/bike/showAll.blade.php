@extends('layouts/app')
@section('title')
    Inventory
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container container-fluid text-dark text-center title">
        <h1>{{__('messages.view_bikes') }}</h1>
</div>
    <a href="{{ route('admin.bike.create') }}" class="btn btn-outline bg-success text-white btn-lg">
        {{__('messages.create_bike') }}
    </a>
    <div class="row parts">
    @foreach ($viewData["bikes"] as $bike)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
            <img src="{{ URL::asset('storage/'.$bike->getImage()) }}" class="card-img-top img-card"/>
                <div class="card-body text-center">
                    <a href="{{route('admin.bike.show', ['id'=>$bike->getId()])}}"
                    class="btn bg-primary text-white">{{ $bike->name }}</a>
                </div>
            </div>
        </div>
    @endforeach   
    </div>
</div>
@endsection