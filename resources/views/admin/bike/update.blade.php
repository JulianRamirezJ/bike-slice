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
      <form method="POST" id="bike_create_form" enctype="multipart/form-data" action="{{ route('admin.bike.save.update', ['id'=>$viewData['bike']->getId()])}}">
            @csrf
            @method('patch')
            <input type="text" name="name" class="bike_create_input" value="{{$viewData['bike']->getName()}}" required/>
            <input type="number" name="stock"  class="bike_create_input"  value="{{$viewData['bike']->getStock()}}" required/>
            <input type="number" name="price"  class="bike_create_input" value="{{$viewData['bike']->getPrice()}}" required/>
            <input type="text" name="brand" class="bike_create_input"  value="{{$viewData['bike']->getBrand()}}" required/>
            <div id="form_input_container">
               <label for="share" class="form_label">{{__('messages.enter_bike_share')}} </label>
               @if ($viewData['bike']->getShare())
                  <input type="hidden" name="share"  value="0"><input type="checkbox" class="bike_create_check" onclick="this.previousSibling.value=1-this.previousSibling.value" checked>
               @else 
                  <input type="hidden" name="share"  value="0"><input type="checkbox" class="bike_create_check" onclick="this.previousSibling.value=1-this.previousSibling.value">
               @endif
            </div>
            <select name="type" id="form_select" value="{{ old('type') }}" required>
               @if ($viewData['bike']->getType() === "road")
                  <option value="road" selected>{{__('messages.road_bike')}}</option>
               @else 
                  <option value="road" >{{__('messages.road_bike')}}</option>
               @endif
               @if ($viewData['bike']->getType() === "mountain")
                  <option value="mountain" selected>{{__('messages.mountain_bike')}}</option>
               @else 
                  <option value="mountain">{{__('messages.mountain_bike')}}</option>
               @endif
               @if ($viewData['bike']->getType() === "city")
                  <option value="city" selected>{{__('messages.city_bike')}}</option>
               @else 
                  <option value="city">{{__('messages.city_bike')}}</option>
               @endif
               @if ($viewData['bike']->getType() === "kid")
                  <option value="kid" selected>{{__('messages.kid_bike')}}</option>
               @else 
                  <option value="kid">{{__('messages.kid_bike')}}</option>
               @endif
            </select>
               @if ($viewData["bike"]->getUser()->getRole() === 'user')
                  <select name="frame"  id="form_select" value="{{ old('frame') }}" required>
                     <option value="" disabled selected>Select a frame </option>
                     @foreach ($viewData["part_types"]["frame"] as $part)
                        <option value="{{$part->getId()}}">{{$part->getName()}}</option>
                     @endforeach
                  </select>
                  <select name="wheel" id="form_select" value="{{ old('wheel') }}" required>
                     <option value="" disabled selected>Select a wheel </option>
                     @foreach ($viewData["part_types"]["wheel"] as $part)
                        <option  value="{{$part->getId()}}">{{$part->getName()}}</option>
                     @endforeach
                  </select>
                  <select name="saddle" id="form_select" value="{{ old('sadle') }}" required>
                     <option value="" disabled selected>Select a saddle </option>
                     @foreach ($viewData["part_types"]["saddle"] as $part)
                        <option  value="{{$part->getId()}}">{{$part->getName()}}</option>
                     @endforeach
                  </select>
                  <select name="chain" id="form_select" value="{{ old('chain') }}" required>
                     <option value="" disabled selected>Select a chain </option>
                     @foreach ($viewData["part_types"]["chain"] as $part)
                        <option  value="{{$part->getId()}}">{{$part->getName()}}</option>
                     @endforeach
                  </select>
                  <select name="handlebar" id="form_select" value="{{ old('handlebar') }}" required>
                     <option value="" disabled selected>Select a handlebar </option>
                     @foreach ($viewData["part_types"]["handlebar"] as $part)
                        <option  value="{{$part->getId()}}">{{$part->getName()}}</option>
                     @endforeach
                  </select>
                  <select name="pedal" id="form_select" value="{{ old('pedal') }}" required>
                     <option value="" disabled selected>Select a pedal </option>
                     @foreach ($viewData["part_types"]["pedal"] as $part)
                        <option  value="{{$part->getId()}}">{{$part->getName()}}</option>
                     @endforeach
                  </select>
                @else
                    <h1>Admin</h2>
                @endif
            <div id="form_input_container">
               <label for="image" class="form_label">{{__('messages.enter_bike_image')}}</label>
               <input type="file" name="image" class="bike_create_file"/>
            </div>
            <textarea name = "description" id="form_textarea"rows = "5" cols = "60" required>{{$viewData['bike']->getDescription()}}</textarea>
            <input type="submit" class="btn btn-lg btn-success btn-center" value="{{ __('messages.send') }}"/>
         </form>
      </div>
   </div>
@endsection