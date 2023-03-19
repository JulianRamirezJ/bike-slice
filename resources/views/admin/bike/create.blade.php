@extends('layouts/app')
@section('title')
   Add bike
@endsection
@section('sectioncss')
   <link href="{{ asset('/css/create.css') }}" rel="stylesheet" />
@endsection
@section('content')
   <div id="create_container">
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
            <input type="text" name="name" class="bike_create_input" placeholder="Enter name" value="{{ old('name') }}" required/>
            <input type="number" name="stock"  class="bike_create_input" placeholder="Enter stock"  value="{{ old('stock') }}" required/>
            <input type="number" name="price"  class="bike_create_input" placeholder="Enter price $"  value="{{ old('stock') }}" required/>
            <input type="text" name="brand" class="bike_create_input" placeholder="Enter brand" value="{{ old('brand') }}" required/>
            <div id="form_input_container">
               <label for="share" class="form_label"> Shareable </label>
               <input type="hidden" name="share"  value="0"><input type="checkbox" class="bike_create_check" onclick="this.previousSibling.value=1-this.previousSibling.value">
            </div>
            <select name="type" id="form_select" value="{{ old('type') }}" required>
               <option value="" disabled selected>Select a bike </option>
               <option value="road">Road bike</option>
               <option value="mountain">Mountain bikes</option>
               <option value="city">City bike</option>
               <option value="kid">Kid bike</option>
            </select>
            <div id="form_input_container">
               <label for="image" class="form_label"> Image: </label>
               <input type="file" name="image" class="bike_create_file"/>
            </div>
            <textarea name = "description" id="form_textarea"rows = "5" cols = "60"  value="{{ old('description') }}" placeholder="Enter a Description of your bike" required></textarea>
            <input type="submit" id="form_submit" value="Send"/>
         </form>
      </div>
   </div>
@endsection