@extends('layouts.app')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container container-fluid text-dark text-center title">
        <h1>{{__('messages.create_part') }}</h1>
    </div>
    <div id="create_container">
        @if($errors->any())
        <ul id="error_list">
            @foreach($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div id="form_container">
            <form method="POST" id="bike_create_form" enctype="multipart/form-data" action="{{ route('admin.part.save') }}">
                @csrf
                <input type="text" name="name" class="bike_create_input" placeholder="{{ __('messages.enter_name') }}" value="{{ old('name') }}" required/>
                <input type="number" name="stock"  class="bike_create_input" placeholder="{{ __('messages.enter_stock') }}"  value="{{ old('stock') }}" required/>
                <input type="number" name="price"  class="bike_create_input" placeholder="{{ __('messages.enter_price') }}"  value="{{ old('price') }}" required/>
                <input type="text" name="brand" class="bike_create_input" placeholder="{{ __('messages.enter_brand') }}" value="{{ old('brand') }}" required/>
                <select name="type" id="form_select" value="{{ old('type') }}" required>
                    <option value="" disabled selected>{{ __('messages.select_type') }}</option>
                    <option value="frame">{{ __('messages.frame') }}</option>
                    <option value="wheel">{{ __('messages.wheel') }}</option>
                    <option value="saddle">{{ __('messages.saddle') }}</option>
                    <option value="chain">{{ __('messages.chain') }}</option>
                    <option value="handlebar">{{ __('messages.handlebar') }}</option>
                    <option value="pedal">{{ __('messages.pedal') }}</option>
                </select>
                <div id="form_input_container">
                    <label for="image" class="form_label"> {{ __('messages.image') }}: </label>
                    <input type="file" name="image" class="bike_create_file"/>
                </div>
                <input type="submit" class="btn btn-lg btn-success btn-center" value="{{ __('messages.send') }}"/>
            </form>
        </div>
    </div>
@endsection