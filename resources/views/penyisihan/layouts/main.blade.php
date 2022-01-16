<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/img/epw-logo/logo-bg-blue.png" type="image/x-icon">
  <title>EPC - EPW 2022 | {{ $title }}</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="/vendor/bootstrap5/dist/css/bootstrap.min.css">
  {{-- Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="/css/quiz.css">
</head>

<body>
    
  <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
      <img src="/img/epw-logo/logo-white.png" alt="EPW Logo" width="40">
      <span class="ms-3">EPC Exam</span>
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="/endQuiz/{{ session()->get('getSession') }}" class="endSession btn text-white">
      Akhiri Quiz
    </a>
  </header>

  @yield('content')

  <script src="/vendor/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="/js/quiz.js"></script>
</body>

</html>
