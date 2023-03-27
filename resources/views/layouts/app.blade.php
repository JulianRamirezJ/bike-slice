<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  @yield('sectioncss','')
  <title>@yield('title', __('messages.bike_slice'))</title>
  @livewireStyles
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home.index') }}">{{ __('messages.bike_slice') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link text-white" href="{{ route('cart.index') }}">{{__('messages.nav.item.cart')}}</a>
        @guest
          <a class="nav-link text-white" href="{{ route('login') }}">{{__('messages.nav.item.login')}}</a>
          <a class="nav-link text-white" href="{{ route('register') }}">{{__('messages.nav.item.signup')}}</a>
        @else
          @if(Auth::user()->getRole() == 'admin')
            {{-- Links to admin routes --}}
            <a class="nav-link text-white" href="{{ route('admin.index') }}">{{__('messages.nav.item.dashboard')}}</a>
            <a class="nav-link text-white" href="{{ route('admin.bike.showAll')}}">{{__('messages.nav.item.bikes')}}</a>
            <a class="nav-link text-white" href="{{ route('admin.part.showall') }}">{{__('messages.nav.item.parts')}}</a>
          @elseif(Auth::user()->getRole() == 'user')
            {{-- Links to user routes --}}
            <a class="nav-link text-white" href="{{ route('user.bike.showAll')}}">{{__('messages.nav.item.your_bikes')}}</a>
            <a class="nav-link text-white" href="#">{{__('messages.nav.item.user_config')}}</a>
          @endif
          <form id="logout" action="{{ route('logout') }}" method="POST" class="d-flex">
            <a role="button" class="nav-link text-white me-2"
              onclick="document.getElementById('logout').submit();">{{__('messages.nav.item.logout')}}</a>
            @csrf
          </form>
        @endguest
      </div>
    </div>
  </div>
</nav>


  <!-- Content Section -->
  <div class="container my-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <div class="py-4 bg-secondary text-white">
    <div class="container text-center">
      <small>
        © 2023 Bike Slice. {{__('messages.All rights reserved')}}
      </small>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  @livewireScripts
</body>
</html>