@extends('layouts.app')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.part.remove', ['id'=>$viewData['part']->getId()])}}">
                        <button type="submit" class="btn bg-danger text-white" > {{ __('messages.delete_part')}}</button>
                        @csrf
                        @method('delete')
                    </form>
                    <form method="POST" action="{{ route('admin.part.update', ['id'=> $viewData["part"]->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-center">
                            <img src="{{ URL::asset('storage/'.$viewData['part']->getImage()) }}" class="card-img-top img-card"/>
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
                        <input type="submit" class="btn btn-primary mt-2" value="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection