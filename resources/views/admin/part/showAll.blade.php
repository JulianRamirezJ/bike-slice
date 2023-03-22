@extends('layouts.app')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container container-fluid text-dark text-center title">
        <h1>{{__('messages.view_parts') }}</h1>
    </div>
    <a href="{{ route('admin.part.create') }}" class="btn btn-outline bg-success text-white btn-lg">
        {{__('messages.create_part') }}
    </a>
    <div class="row g-3">
    @foreach ($viewData["parts"] as $part)
    <div class="col-md-3 bikes-container">
        <a href="{{route('admin.part.show', ['id'=>$part->getId()])}}" class="card-link">
        <div class="card">
            <img src="{{ URL::asset('storage/'.$part->getImage()) }}" class="card-img-top" alt="{{ $part->getName() }}" style="max-width: 100%;">
            <div class="card-body">
                <h5 class="card-title">{{ $part->getName() }}</h5>
                <p class="card-text">{{ $part->getPrice() }}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach
    </div>
    </div>
@endsection
