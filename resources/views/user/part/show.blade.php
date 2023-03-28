@extends('layouts.app')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.show_part')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="mb-3 text-center">
                        <img src="{{ URL::asset('storage/'.$viewData['part']->getImage()) }}" class="card-img-top img-card"/>
                    </div>
                    <p> {{__('messages.brand')}}: {{ $viewData["part"]->getType() }} </p>
                    <p> {{__('messages.stock')}}: {{ $viewData["part"]->getStock() }} </p>
                    <p> {{__('messages.price')}}: {{ $viewData["part"]->getPrice() }} </p>
                    <p> {{__('messages.brand')}}: {{ $viewData["part"]->getBrand() }} </p>
                    <p> {{__('messages.name')}}: {{ $viewData["part"]->getName() }} </p>

                </div>
            </div>
        </div>
    </div>
@endsection