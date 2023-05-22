<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  @yield('sectioncss','')
  <title>@yield('title', 'Admin Panel')</title>
  @livewireStyles
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3>Admin Panel</h3>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">{{__('messages.nav.item.dashboard')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.bike.showAll') }}">{{__('messages.nav.item.bikes')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.part.showall') }}">{{__('messages.nav.item.parts')}}</a>
      </li>
      <li class="nav-item">
        <form id="logout" action="{{ route('logout') }}" method="POST" class="d-flex">
            <a role="button" class="nav-link text-white me-2"
              onclick="document.getElementById('logout').submit();">{{__('messages.nav.item.logout')}}</a>
            @csrf
          </form>
      </li>
    </ul>
  </div>

  <!-- Content Section -->
  <div class="content">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  @livewireScripts
</body>
</html>
