@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{__('messages.cart.title')}}</h1>
            <a class="btn btn-danger mt-3" href="{{ route('cart.removeAll') }}">{{__('messages.cart.button.remove_all')}}</a>
            @if($viewData["total"])
                <h5 class="mt-2">{{__('messages.cart.total')}}: {{$viewData["total"]}}</h5>
            @endif
            @guest
                <p class="text-danger mt-3">{{__('messages.cart.buy.note')}}</p>
            @else 
                @if($viewData["cartBike"])
                    <form method="POST" id="create_order" action="{{ route('user.order.save') }}">
                        @csrf
                        <button class="btn btn-success mt-3" href="#">{{__('messages.cart.buy.button.title')}}</button>
                    </form>
                @endif
            @endguest
            @if(session('status')=== 'balance_problem')
                <div class="alert alert-danger mt-2">
                    {{__('messages.cart.balance.error')}}
                </div>
            @elseif(session('status') === 'success')
                <div class="alert alert-success mt-2">
                    {{__('messages.cart.success')}}
                </div>
            @endif
            <div class="container mx-5 d-flex justify-content-center">
                <ol class="list-group list-group-numbered w-50 my-2">
                    @foreach($viewData["cartBike"] as $key => $bike)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{$bike->getName()}}</div>
                            <p>{{$bike->getPrice()}}</p>
                        </div>
                        <div class="m-3">
                            <a class="btn btn-success" href="{{ route('cart.add', ['id'=> $bike->getId() ]) }}">+</a>
                            <a class="btn btn-danger" href="{{ route('cart.remove', ['id'=> $bike->getId() ]) }}">-</a>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{__('messages.cart.quantity')}}: {{$viewData["cartBikeData"][$bike->getId()]}}</span>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection