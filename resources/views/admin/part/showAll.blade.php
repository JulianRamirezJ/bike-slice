@extends('layouts.app')
@section('title', $viewData['title'])
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <h1 class="text-center">{{__('messages.view_parts') }}</h1>
    <div class="btn-container">
      <a href="{{ route('admin.part.create') }}" class="btn btn-outline bg-success text-white btn-lg">
        {{__('messages.create_part') }}
      </a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th>{{ __('messages.name') }}</th>
          <th>{{ __('messages.bike_price') }}</th>
          <th>{{ __('messages.bike_brand') }}</th>
          <th>{{ __('messages.bike_type') }}</th>
          <th>{{__('messages.bike_stock')}}</th>
          <th>{{ __('messages.image') }}</th>
          <th>{{__('messages.options')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["parts"] as $part)
          <tr>
            <td>{{ $part->getName() }}</td>
            <td>{{ $part->getPrice() }}</td>
            <td>{{ $part->getBrand() }}</td>
            <td>{{ $part->getType() }}</td>
            <td>{{ $part->getStock() }}</td>
            <td><img src="{{ URL::asset('storage/'.$part->getImage()) }}" class="img-thumbnail" alt="{{ $part->getName() }}" style="max-height: 50px;"></td>
            <td>
              <div class="btn-container">
                <a href="{{ route('admin.part.show', ['id'=>$part->getId()]) }}" class="btn btn-primary">
                  <i class="fas fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.part.remove', ['id'=>$part->getId()])}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash fa-lg"></i>
                  </button>
                </form>            
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
