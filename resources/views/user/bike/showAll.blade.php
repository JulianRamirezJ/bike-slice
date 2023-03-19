@extends('layouts/app')
@section('title')
    Inventory
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div id="show_all_container">
            <a href="{{ route('user.bike.create')}}">
                <div class="nav_option">
                    <p class="nav_opt_text"> Add Bike </p>
                </div>
            </a>
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
@endsection