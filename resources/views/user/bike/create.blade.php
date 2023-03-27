@extends('layouts/app')
@section('title')
   {{$viewData["title"]}}
@endsection
@section('sectioncss')
   <link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
   <div class="container container-fluid text-dark text-center title">
        <h1>{{__('messages.create_bike') }}</h1>
    </div>
   <div id="create_container">
         @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      @if($errors->any())
         <ul id="error_list">
            @foreach($errors->all() as $error)
               <li class="error">{{ $error }}</li>
            @endforeach
         </ul>
      @endif
      <div id="form_container">
         <form method="POST" id="bike_create_form" enctype="multipart/form-data" action="{{ route('user.bike.save') }}">
            @csrf
            <input type="text" name="name" class="bike_create_input" placeholder="{{ __('messages.enter_bike_name') }}" value="{{ old('name') }}" required/>
            <div id="form_input_container">
               <label for="share" class="form_label">{{__('messages.enter_bike_share')}} </label>
               <input type="hidden" name="share"  value="0"><input type="checkbox" class="bike_create_check" onclick="this.previousSibling.value=1-this.previousSibling.value">
            </div>
            <select name="type" id="form_select" value="{{ old('type') }}" required>
               <option value="" disabled selected>{{ __('messages.Select a bike') }}</option>
               <option value="road">{{__('messages.road_bike')}}</option>
               <option value="mountain">{{__('messages.mountain_bike')}}</option>
               <option value="city">{{__('messages.city_bike')}}</option>
               <option value="kid">{{__('messages.kid_bike')}}</option>
            </select>
            <div id="form_input_container">
               <label for="" class="form_label">{{__('messages.enter_bike_image')}}</label>
               <input type="file" name="" class="bike_create_file"/>
            </div>
            <textarea name = "description" id="form_textarea"rows = "5" cols = "60"  value="{{ old('description') }}" placeholder="{{__('messages.enter_bike_description')}}" required></textarea>
            <input type="submit" class="btn btn-lg btn-success btn-center" value="{{ __('messages.send') }}"/>
         </form>
      </div>
   </div>
@endsection