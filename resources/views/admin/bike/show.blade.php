@extends('layouts/app')
@section('title')
    success
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div id="show_container">
        <div id="show_info_container">
            <img id="show_img" src="{{ URL::asset('storage/'.$viewData["bike"]->getImage()) }}"/>
            <div id="show_info">
                <p class="show_info_general">Stock: {{$viewData["bike"]->getStock()}}</p>
                <p class="show_info_general">Brand: {{$viewData["bike"]->getBrand()}}</p>
                <p class="show_info_general">Type: {{$viewData["bike"]->getType()}}</p>
                <p class="show_info_general">Price: {{$viewData["bike"]->getPrice()}}</p>
                @if ($viewData["bike"]->getShare() == 1)
                    <p class="show_info_general">Public: Yes</p>
                @else
                    <p class="show_info_general">Public: No</p>
                @endif
                <div id="show_description_container">
                    <p class="show_info_general"> Description </p>
                    <p class="show_info_description"> {{$viewData["bike"]->getDescription()}}</p>
                </div>
            </div>
        </div>
        <a class="button_link" href="{{ route('user.bike.remove', ['id'=>$viewData["bike"]->getId()])}}"><div class="button_container">  <p class="button_text"> Delete Bike </p></div></a>
    </div>
@endsection