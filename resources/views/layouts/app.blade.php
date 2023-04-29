<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

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
            <a class="nav-link text-white" href="{{ route('user.part.showall') }}">{{__('messages.nav.item.parts')}}</a>
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
  <footer class="py-4 bg-secondary text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>Enlaces útiles</h5>
        <ul class="list-unstyled">
          <li><a href="#">Política de privacidad</a></li>
          <li><a href="#">Términos y condiciones</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Otros sitios</h5>
        <ul class="list-unstyled">
          <li><a href="#">Bike Slice en Facebook</a></li>
          <li><a href="#">Bike Slice en Twitter</a></li>
          <li><a href="#">Bike Slice en Instagram</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Suscríbete</h5>
        <form>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Tu correo electrónico">
          </div>
          <button type="submit" class="btn btn-outline-light">Suscríbete</button>
        </form>
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