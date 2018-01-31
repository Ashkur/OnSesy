<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark" >
    <div class="container">
        <img src="node_modules/bootstrap/images/bootstrap-solid.svg" alt="Sistema Online de Seletivos" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
      <a class="navbar-brand h1 mb-0" href="#" alt="Sistema Online de Seletivos">OnSeSy</a>
        <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#empresa">Empresa</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#seletivos">Seletivos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#depoimentos">Depoimentos</a>
        </li>
          <li class="nav-item">
              <a class="nav-link" href="#contato">Contato</a>
          </li>
        </ul>
        <form class="form-inline">
          <input class="form-control mr-2" type="search" placeholder="Buscar...">
          <button class="btn btn-warning" type="Submit"><b>Ok</b></button>
        </form>

      </div>
    </div>
  </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>