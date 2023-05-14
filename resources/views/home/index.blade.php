@extends('layouts.app')

@section('sectioncss')
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="search-container">
        @livewire('bikes.search-bike')
    </div>
</div>

@endsection
