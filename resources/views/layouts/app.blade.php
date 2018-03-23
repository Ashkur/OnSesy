<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1", "shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') OnSeSy - Sistema Online de Seletivos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
        <!-- Script Jquery e Mascaras-->
        <script src="{{ asset('js/funcoes.js') }}"></script>
        <script src="{{ asset('js/add.js') }}"></script>
    </head>
    <body>
        @if (Auth::guest())                
        @include('layouts._nave')
        @else
        @include('layouts.navUser')
        @endif
      <main>
        <div class="container">
            <div id="flash-msg">
                @include('flash::message')                
            </div>
            @yield('content')
        </div>
      </main>
      <section id="footer">
        @include('layouts._footer')
      </section>
      <!-- Script -->
      @stack('scripts')
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/step.js') }}"></script>
      <script>
          $(function () {
              // flash auto hide
              $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
          })
      </script>
    </body>
</html>
