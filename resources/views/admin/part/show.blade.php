@extends('layouts/admin')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
            <div class="card" id="card-admin">
                <div class="card-header">{{__('messages.update_part')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if (session('status') == 'updated')
                    <div class="alert alert-success">
                        {{ __('messages.updated_part') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.part.update', ['id'=> $viewData["part"]->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-center">
                            <img src="{{'https://storage.googleapis.com/project-bike/'.$viewData['part']->getImage().'?authuser=2' }}" class="card-img-top img-card part-img"/>
                        </div>
                        <label for="type" class="form-label">{{__('messages.select_type')}}</label>
                        <select class="form-select mb-3" name="type">
                            @foreach($viewData["type_options"] as $option)
                            @if($viewData["part"]->getType() == $option)
                                <option value="{{$option}}" selected>
                                    {{__($option)}}
                                </option>
                            @else
                                <option value="{{$option}}">{{__($option)}}</option>
                            @endif
                            @endforeach
                        </select>
                        <input type="text" class="form-control mb-3"
                            placeholder="{{__('messages.enter_name')}}" name="name"
                            value="{{ $viewData["part"]->getName() }}" />
                        <input type="number" class="form-control mb-3"
                            placeholder="{{__('messages.enter_stock')}}" name="stock"
                            value="{{ $viewData["part"]->getStock() }}" />
                        <input type="number" class="form-control mb-3"
                            placeholder="{{__('messages.enter_price')}}" name="price"
                            value="{{ $viewData["part"]->getPrice() }}" />
                        <input type="text" class="form-control mb-3"
                            placeholder="{{__('messages.enter_brand')}}" name="brand"
                            value="{{ $viewData["part"]->getBrand() }}" />
                        <div class="mb-3">
                            <label for="file"
                                class="form-label">{{__('messages.image')}}</label>
                            <input class="form-control" type="file" name="image" id="file">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="{{__('messages.update_part')}}" />
                    </form>
                </div>
            </div>
@endsection