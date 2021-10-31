<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap5/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <link rel="shortcut icon" href="/img/epw-logo/logo-bg-blue.png" type="image/x-icon">

    <title>EPW 2022</title>
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg py-0">
      <div class="container">
        <div class="navbar-brand flex-lg-grow-1">
          <a href="/">
            <img src="/img/epw-logo/logo-white.png" alt="EPW Logo" width="60">
          </a>
        </div>
        <div class="navbar-rainbow">
          <div class="rainbow"></div>
          <div class="rainbow"></div>
          <div class="rainbow"></div>
          <div class="rainbow"></div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars fa-lg fa-fw"></span>
        </button>
        <div class="collapse navbar-collapse flex-lg-grow-0" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item text-center">
              <a class="nav-link my-3" href="https://epwits.com">Main Website</a>
            </li>
            <li class="nav-item text-center dropdown">
              <a class="nav-link dropdown-toggle my-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Event Lain
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-center" href="https://epwits.com/snow">SNOW</a></li>
                <li><a class="dropdown-item text-center" href="https://epwits.com/coming-soon">Grand Roadshow</a></li>
                <li><a class="dropdown-item text-center" href="https://epwits.com/coming-soon">Big Event</a></li>
              </ul>
            </li>
            @auth
              <li class="nav-item text-center">
              </li>
              <li class="nav-item text-center dropdown">
                <a class="nav-link dropdown-toggle my-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Hello, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item text-center border-0 bg-transparent">Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
              @if (Request::is('login'))
                <li class="nav-item text-center">
                  <a class="nav-link my-3" href="/daftar">Daftar</a>
                </li>
              @else
                <li class="nav-item text-center">
                  <a class="nav-link my-3" href="/login">Login</a>
                </li>
              @endif
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    {{-- End of Navbar --}}

    @yield('content')
    
    {{-- Javascript --}}
    <script src="/vendor/jquery/dist/jquery.js"></script>
    <script src="/vendor/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/js/script.js"></script>
  </body>
</html>