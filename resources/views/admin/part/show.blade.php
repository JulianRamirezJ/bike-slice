@extends('layouts.app')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div id="show_container">
        <div id="show_info_container">
            <img id="show_img" src="{{ URL::asset('storage/'.$viewData["part"]->getImage()) }}"/>
            <div id="show_info">
                <p class="show_info_general">{{ __('messages.stock')}}: {{$viewData["part"]->getStock()}}</p>
                <p class="show_info_general"> {{ __('messages.brand') }}: {{$viewData["part"]->getBrand()}}</p>
                <p class="show_info_general">{{ __('messages.type')}}: {{$viewData["part"]->getType()}}</p>
                <p class="show_info_general">{{ __('messages.price')}}: {{$viewData["part"]->getPrice()}}</p>
            </div>
        </div>
        <form action="{{ route('admin.part.remove', ['id'=> (int)$viewData['part']->getId()]) }}" method="post">
            <button type="submit" class="btn bg-danger text-white" > {{ __('messages.delete_part')}}</button>
            @csrf
            @method('delete')
        </form>
    </div>
@endsection