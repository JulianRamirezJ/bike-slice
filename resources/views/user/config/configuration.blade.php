@extends('layouts.app')
@section('title', 'test')
@section('sectioncss')
    <link href="{{ asset('/css/show.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.user_update_info')}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif 
                    <form method="POST" action="{{ route('user.update.conf') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="type" class="form-label">{{__('messages.user_select_name')}}</label>
                        <input type="text" class="form-control mb-3"
                            placeholder="" name="name"
                            value="{{$viewData['user']->getName()}}" required/>
                        <label for="type" class="form-label">{{__('messages.user_select_email')}}</label>
                        <input type="email" class="form-control mb-3"
                            placeholder="" name="email"
                            value="{{$viewData['user']->getEmail()}}" required/>
                        <label for="type" class="form-label">{{__('messages.user_select_address')}}</label>                            
                        <input type="text" class="form-control mb-3"
                            placeholder="" name="address"
                            value="{{$viewData['user']->getAddress()}}" required/>
                        <label for="type" class="form-label">{{__('messages.user_select_balance')}}</label>
                        <input type="number" class="form-control mb-3"
                            placeholder="" name="balance"
                            value="{{$viewData['user']->getBalance()}}" required/>
                        <label for="type" class="form-label">{{__('messages.user_select_password')}}</label>
                        <input type="text" class="form-control mb-3"
                            placeholder="**************" name="password"
                            value="" />
                        <input type="submit" class="btn btn-primary mt-2" value="{{__('messages.user_update')}}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection