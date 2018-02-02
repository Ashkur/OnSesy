<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap cdn -->
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->

    <link rel="stylesheet" href="../css/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap/compiler/style.css">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OnSesy') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    
</head>
<body>
    <script type="text/javascript" src="../js/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery/dist/app.js"></script>
    <script type="text/javascript" src="../js/jquery/dist/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.js/dist/umd/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap/dist/js/bootstrap.js"></script>
<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
-->

<script type="text/javascript" src="{{ asset('js/apps.js') }}"></script>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark" >
    <div class="container">
        <img src="../images/bootstrap-solid.svg" alt="Sistema Online de Seletivos" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
      <a class="navbar-brand h1 mb-0" href="#" alt="Sistema Online de Seletivos">OnSeSy</a>
        <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
         
        </ul>
        <!-- login e Logout -->

      </div>
    </div>
  </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
