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
                <p class="show_info_general">{{__('messages.bike_stock')}} {{$viewData["bike"]->getStock()}}</p>
                <p class="show_info_general">{{__('messages.bike_brand')}} {{$viewData["bike"]->getBrand()}}</p>
                <p class="show_info_general">{{__('messages.bike_type')}} {{$viewData["bike"]->getType()}}</p>
                <p class="show_info_general">{{__('messages.bike_price')}} {{$viewData["bike"]->getPrice()}}</p>
                @if ($viewData["bike"]->getShare() == 1)
                    <p class="show_info_general">{{__('messages.bike_public_yes')}}</p>
                @else
                    <p class="show_info_general">{{__('messages.bike_public_no')}}</p>
                @endif
                <div id="show_description_container">
                    <p class="show_info_general"> {{__('messages.bike_description')}} </p>
                    <p class="show_info_description"> {{$viewData["bike"]->getDescription()}}</p>
                </div>
            </div>
        </div>
        <form action="{{ route('user.bike.remove', ['id'=>$viewData['bike']->getId()])}}" method="post">
            <button type="submit" class="btn bg-danger text-white" > {{ __('messages.bike_delete')}}</button>
            @csrf
            @method('delete')
        </form>
    </div>
@endsection