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
    <div class="row parts">
    @foreach ($viewData["parts"] as $part)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
            <img src="{{ URL::asset('storage/'.$part->getImage()) }}" class="card-img-top img-card"/>
                <div class="card-body text-center">
                    <a href="{{route('admin.part.show', ['id'=>$part->getId()])}}"
                    class="btn bg-primary text-white">{{ $part->name }}</a>
                </div>
            </div>
        </div>
    @endforeach   
    </div>
@endsection