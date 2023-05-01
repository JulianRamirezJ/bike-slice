@extends('layouts/app')
@section('title')
    {{$viewData["title"]}}
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/showAll.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="container container-fluid text-dark text-center title">
        <h1>{{__('messages.title_orders') }}</h1>
</div>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    <div class="row g-3">
    @foreach ($viewData["orders"] as $order)
    <div class="col-md-3 bikes-container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $order->getCreatedAt() }}</h5>
                <p class="card-text">{{ $order->getAddress() }}</p>
                <p class="card-text">{{__('messages.cart.total')}}:{{ $order->getTotal() }}</p>
            </div>
            <div class="card-body">
                <h6 class="card-title">{{__('messages.view_items') }}</h5>
                @foreach($order->getItems() as $item)
                    <p>{{ $item->bike->getName() }} : {{ $item->getQuantity() }}</p>
                @endforeach
            </div>
        </div>
        </a>
    </div>
    @endforeach
    </div>

@endsection