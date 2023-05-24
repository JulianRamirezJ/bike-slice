@extends('layouts.app')

@section('content')
<div class="container d-flex flex-wrap justify-content-center">
    @foreach($computers as $computer)
        <div class="card m-2" style="width: 16rem;">
            <img src="{{$computer["image_url"]}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h4 class="card-title">{{$computer["name"]}}</h4>
            <h5 class="card-title">{{$computer["price_cop"]}}</h5>
            <h6 class="card-title">{{$computer["category"]}}</h6>
            <p>{{$computer["brand"]}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
