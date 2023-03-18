<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', __('messages.bike_slice'))</title>
</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark  py-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}">{{ __('messages.bike_slice') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              @guest
              <div class="vr bg-white mx-2 d-none d-lg-block"></div>
              <a class="nav-link active" href="{{ route('login') }}">{{__('messages.nav.item.login')}}</a>
              <a class="nav-link active" href="{{ route('register') }}">{{__('messages.nav.item.signup')}}</a>
              @else
              @if(Auth::user()->getRole() == 'admin')
              {{-- Links to admin routes --}}
              <a class="nav-link active" href="{{ route('admin.index') }}">{{__('messages.nav.item.dashboard')}}</a>
              <a class="nav-link active" href="#">{{__('messages.nav.item.bikes')}}</a>
              <a class="nav-link active" href="#">{{__('messages.nav.item.parts')}}</a>
              @elseif(Auth::user()->getRole() == 'user')
              {{-- Links to user routes --}}
              <a class="nav-link active" href="#">{{__('messages.nav.item.cart')}}</a>
              <a class="nav-link active" href="#">{{__('messages.nav.item.your_bikes')}}</a>
              <a class="nav-link active" href="#">{{__('messages.nav.item.user_config')}}</a>
              @endif
              <div class="vr bg-white mx-2 d-none d-lg-block"></div>
              <form id="logout" action="{{ route('logout') }}" method="POST">
                <a role="button" class="nav-link active"
                  onclick="document.getElementById('logout').submit();">{{__('messages.nav.item.logout')}}</a>
                @csrf
              </form>
              @endguest
            </div>
          </div>
        </div>
  </nav>

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="https://github.com/JulianRamirezJ/bike-slice">
          Bike Slice
        </a>
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous">
  </script>
</body>

</html>