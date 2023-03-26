@extends('layouts.app')
@section("title",  $viewData['title'])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('messages.create_review') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('user.review.save', ['id'=> $viewData["bike_id"]]) }}">
              @csrf
              <input type="number" class="form-control mb-2" placeholder="{{ __('messages.enter_stars') }}" name="stars" value="{{ old('stars') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{ __('messages.enter_comment') }}" name="description" value="{{ old('description') }}" />
              <input type="submit" class="btn btn-primary" value="{{ __('messages.send') }}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection