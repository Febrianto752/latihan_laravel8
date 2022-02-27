<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>@yield('title')</title>
  </head>
  <body>
    {{-- Navbar  --}}
    @include('layouts/partials/navbar')
    {{-- End navbar --}}

    <div class="container">
      @yield('content')
    </div>






    <script src="/js/bootstrap.bundle.min.js"></script>


  </body>
</html>