<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1", "shrink-to-fit=no">
        <title>OnSeSy - Sistema Online de Seletivos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
      @include('layouts._nave')
      <main>
        @yield('content')
      </main>
      <section id="footer">
        @include('layouts._footer')
      </section>
      <!-- Script -->
      <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
