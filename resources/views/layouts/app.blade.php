<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://kit.fontawesome.com/eea4a3a7bd.js" crossorigin="anonymous"></script>
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
    @if(isset($viewData))
      @if(array_key_exists('temperature', $viewData))
        <div class="d-flex align-items-center weather-container">
          <p class="weather-api me-auto w-auto m-auto">{{$viewData['temperature']}}&deg</p>
          <p id="time" class="weather-api align-baseline">{{$viewData['time']}}</p>
          @if($viewData['weather'] == 0)
            @if($viewData['day'] == 1)
              <i class="fa-sharp fa-solid fa-sun weather-icon"></i>
            @else
              <i class="fa-solid fa-moon weather-icon"></i>
            @endif
          @elseif($viewData['weather'] < 55)
            <i class="fa-solid fa-cloud weather-icon"></i>
          @elseif($viewData['weather'] < 84)
            <i class="fa-solid fa-cloud-rain weather-icon"></i>
          @else
            <i class="fa-solid fa-cloud-bolt weather-icon"></i>
          @endif
        </div>
      @endif
    @endif
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link text-white" href="{{ route('cart.index') }}">{{__('messages.nav.item.cart')}}</a>
        <a class="nav-link text-white" href="{{ route('partner.index') }}">{{__('messages.nav.item.partner')}}</a>
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
            <a class="nav-link text-white" href="{{ route('user.part.showall') }}">{{__('messages.nav.item.parts')}}</a>
            <a class="nav-link text-white" href="{{ route('user.order.showAll') }}">{{__('messages.nav.order')}}</a>
            <a class="nav-link text-white" href="{{ route('user.conf') }}">{{__('messages.nav.item.user_config')}}</a>
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
  <footer class="py-4 text-white bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>{{__('messages.Usefull Links')}}</h5>
        <ul class="list-unstyled">
          <li><a href="#">{{__('messages.Privacy Policy')}}</a></li>
          <li><a href="#">{{__('messages.Terms and Conditions')}}</a></li>
          <li><a href="#">{{__('messages.Contact')}}</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>{{__('messages.Other sites')}}</h5>
        <ul class="list-unstyled">
          <li><a href="#">{{__('messages.Bike Slice on Facebook')}}k</a></li>
          <li><a href="#">{{__('messages.Bike Slice on Twitter')}}</a></li>
          <li><a href="#">{{__('messages.Bike Slice on Instagram')}}</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>{{__('messages.Language')}}</h5>
            <a class="dropdown-item" href="{{ url('locale/en') }}">English</a>
            <a class="dropdown-item" href="{{ url('locale/es') }}">Español</a>
            <a class="dropdown-item" href="{{ url('locale/fr') }}">Français</a>
    </li>
      </div>
    </div>
    <hr>
    <p class="text-center">
      © 2023 Bike Slice. {{__('messages.All rights reserved')}}
    </p>
  </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  @livewireScripts
</body>
</html>