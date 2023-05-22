@extends('layouts/app')
@section('title')
    {{$viewData["title"]}}
@endsection
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div id="show_container">
        @if($viewData['isInCart'])
            <h5 class="my-2">{{__('messages.bike.already_is_in_cart')}}</h5>
        @else
            <a class="btn btn-success my-4" href="{{ route('cart.add', ['id'=> $viewData["bike"]->getId() ]) }}">{{__('messages.bike.add_cart')}}</a>
        @endif
        <div id="show_info_container">
            <img id="show_img" src="{{'https://storage.googleapis.com/project-bike/'.$viewData['bike']->getImage().'?authuser=2'}}"/>
            <div id="show_info">
                <p class="show_info_general">{{$viewData["bike"]->getName()}}</p>
                <p class="show_info_general">{{__('messages.bike_stock')}} : {{$viewData["bike"]->getStock()}}</p>
                <p class="show_info_general">{{__('messages.bike_brand')}} :{{$viewData["bike"]->getBrand()}}</p>
                <p class="show_info_general">{{__('messages.bike_type')}}: {{$viewData["bike"]->getType()}}</p>
                <p class="show_info_general">{{__('messages.bike_price')}}: {{$viewData["bike"]->getPrice()}}</p>
                @if ($viewData["bike"]->getShare() == 1)
                    <p class="show_info_general">{{__('messages.bike_public_yes')}}</p>
                @else
                    <p class="show_info_general">{{__('messages.bike_public_no')}}</p>
                @endif
                @if ($viewData["bike"]->getUser()->getRole() === 'user')
                    @foreach($viewData["bike"]->getAssemblies() as $assemblie)
                        <a href="{{ route('user.part.show' , ['id'=>$assemblie->getPart()->getId()])}}"><p class="show_info_general">{{$assemblie->getPart()->getName()}}</p></a>
                    @endforeach
                    <h1>User</h1>
                @else
                    <h1>Admin</h2>
                @endif
                <div id="show_description_container">
                    <p class="show_info_general"> {{__('messages.bike_description')}} </p>
                    <p class="show_info_description"> {{$viewData["bike"]->getDescription()}}</p>
                </div>
            </div>
        </div>
        @if ($viewData["user_id"]!=0 && $viewData["user_id"]==$viewData["bike"]->getUser()->id)
            <div id="options_container" class="mt-5">
                <form action="{{ route('user.bike.remove', ['id'=>$viewData['bike']->getId()])}}" method="post">
                    <button type="submit" class="btn bg-danger text-white" > {{ __('messages.bike_delete')}}</button>
                    @csrf
                    @method('delete')
                </form>
                <a href="{{ route('user.bike.update', ['id'=>$viewData['bike']->getId()])}}">
                    <button type="submit" class="btn bg-danger text-white" > {{ __('messages.bike_update')}}</button>
                </a>
            </div>
        @endif
    </div>
    <div class="container mt-5">
                <div class="row">
                <div class="col-8"><h2>{{__('messages.Reviews')}}</h2></div>
                <div class="col-4">
                    @if (!$viewData["bike"]->hasReviewFromUser($viewData["user_id"]) && $viewData["user_id"]!=0)
                    <a href="{{ route('user.review.create', ['id'=> $viewData["bike"]->getId()]) }}" class="btn btn-outline bg-success text-white btn-lg">
                        {{__('messages.create_review') }}
                    </a>
                    @endif
                </div>
            </div>
        <hr>
            @foreach($viewData["bike"]->getReviews() as $review)
            <div class="row mt-3">
                <div class="col-3">
                    <p><strong>{{__('messages.User')}}:</strong> {{ $review->getUser()->getName() }}</p>
                    <p><strong>{{__('messages.Date')}}:</strong> {{ $review->getCreatedAt() }}</p>
                </div>
                <div class="col-2">
                    <p><strong>{{__('messages.Stars')}}:</strong> {{ $review->getStars() }}</p>
                </div>
                <div class="col-5">
                    <p><strong>{{__('messages.Description')}}:</strong> {{ $review->getDescription() }}</p>
                </div>
                <div class="col-2">
                    @if ($review->getUser()->getId() == $viewData["user_id"])
                    <form action="{{ route('user.review.delete', ['id'=> (int)$review->getId()]) }}" method="post">
                        <button type="submit" class="btn bg-danger text-white" >{{__('messages.Delete this review')}}</button>
                        @csrf
                        @method('delete')
                    </form>
                    @endif
                </div>
            </div>
            <hr>
            @endforeach
    </div>
@endsection