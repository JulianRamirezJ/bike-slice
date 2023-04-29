@extends('layouts/app')
@section('title')
    {{$viewData["title"]}}
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/admin_showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="card">
  <div class="card-header">
  <h1 class="text-center">{{ __('messages.bike_list') }}</h1>
    <div class="btn-container">
      <a href="{{ route('admin.bike.create') }}" class="btn btn-outline bg-success text-white btn-lg">
        {{ __('messages.create_bike') }}
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
          <th>{{ __('messages.bike_stock') }}</th>
          <th>{{ __('messages.image') }}</th>
          <th>{{ __('messages.options') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["bikes"] as $bike)
          <tr>
            <td>{{ $bike->getName() }}</td>
            <td>{{ $bike->getPrice() }}</td>
            <td>{{ $bike->getBrand() }}</td>
            <td>{{ $bike->getType() }}</td>
            <td>{{ $bike->getStock() }}</td>
            <td><img src="{{ URL::asset('storage/'.$bike->getImage()) }}" class="img-thumbnail" alt="{{ $bike->getName() }}" style="max-height: 50px;"></td>
            <td>
              <div class="btn-container">
                <a href="{{ route('admin.bike.show', ['id'=>$bike->getId()]) }}" class="btn btn-primary">
                  <i class="fa fa-eye fa-lg"></i>
                </a>
                <a href="{{ route('admin.bike.update', ['id'=>$bike->getId()]) }}" class="btn btn-warning">
                  <i class="fas fa-edit fa-lg"></i>
                </a>
                <form action="{{ route('admin.bike.remove', ['id'=>$bike->getId()])}}" method="post">
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