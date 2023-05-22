@extends('layouts/admin')
@section('title')
{{$viewData["title"]}}
@endsection
@section('sectioncss')
<link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="card" id="card-admin">
   <div class="card-header">{{__('messages.create_bike') }}</div>
   <div class="card-body">
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
      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.bike.save') }}">
         @csrf
         <input type="text" name="name" class="form-control m-2" placeholder="{{ __('messages.enter_bike_name') }}"
            value="{{ old('name') }}" required />
         <input type="number" name="stock" class="form-control m-2" placeholder="{{ __('messages.enter_bike_stock') }}"
            value="{{ old('stock') }}" required />
         <input type="number" name="price" class="form-control m-2" placeholder="{{ __('messages.enter_bike_price') }}"
            value="{{ old('stock') }}" required />
         <input type="text" name="brand" class="form-control m-2" placeholder="{{ __('messages.enter_bike_brand') }}"
            value="{{ old('brand') }}" required />
         <div id="form_input_container">
            <label for="share" class="form_label">{{__('messages.enter_bike_share')}} </label>
            <input type="hidden" name="share" value="0"><input type="checkbox" class="bike_create_check"
               onclick="this.previousSibling.value=1-this.previousSibling.value">
         </div>
         <select name="type" class="form-control m-2" value="{{ old('type') }}" required>
            <option value="" disabled selected>{{__('messages.Select a bike')}} </option>
            <option value="road">{{__('messages.road_bike')}}</option>
            <option value="mountain">{{__('messages.mountain_bike')}}</option>
            <option value="city">{{__('messages.city_bike')}}</option>
            <option value="kid">{{__('messages.kid_bike')}}</option>
         </select>
         <div>
            <label for="image" class="form_label">{{__('messages.enter_bike_image')}}</label>
            <input type="file" name="image" class="form-control m-2" />
         </div>
         <textarea name="description" class="form-control m-2" rows="5" value="{{ old('description') }}"
            placeholder="{{__('messages.enter_bike_description')}}" required></textarea>
         <button type="submit" class="btn btn-success">{{ __('messages.send') }}</button>
      </form>
   </div>
</div>
@endsection