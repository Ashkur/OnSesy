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
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        <!-- Script -->
        <script type="text/javascript" src="js/apps.js"></script>
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark" >
      <div class="container">
          <img src="images/bootstrap-solid.svg" alt="Sistema Online de Seletivos" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-warning ml-1" href="{{ route('login') }}"><b>Login</b></a>
                        <a class="btn btn-warning ml-1" href="{{ route('register') }}"><b>Register</b></a>
                    @endauth
                </div>
            @endif
          </form>

        </div>
      </div>
    </nav>

        <div class="flex-center position-ref full-height">
              <div class="content">
              <section id="empresa">
              <main role="main">
                <!-- Main jumbotron for a primary marketing message or call to action -->
                
                <div class="jumbotron">
                  <div class="container">
                    <h1 class="display-3">Bem Vindo a OnSeSy!</h1>
                    <p>A OnSeSy surgio da necessidade de gerenciar Seletivos com o proposito de Selecionar colaboradores para as empresas de uma manera simples e ágil.</p>
                    <p><a class="btn btn-warning btn-lg" href="#" role="button">Saiba mais...</a></p>
                  </div>
                </div>
          
                
              </main>
            </section>
            <section  id="seletvos">
              <!-- Tabela -->
              <div class="container h1">Seletivos Disponveis</div>
              <div class="container pt-2 border" style="border:1px solid #cecece;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>nº</th>
                            <th>Seletivo</th>
                            <th>Entidade</th>
                            <th>informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Processo de Recrutamento e Seleção Nº 008/2018 - Instrutor I - Fanfarra </td>
                            <td>Sesc/RR</td>
                            <td><a link="#" class="btn btn-warning ">Mais informações</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Processo de Recrutamento e Seleção Nº 007/2018 - Professor I - Música</td>
                            <td>Sesc/RR</td>
                            <td><a link="#" class="btn btn-warning ">Mais informações</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Processo de Recrutamento e Seleção Nº 006/2018 - Professor I - Inglês</td>
                            <td>Sesc/RR</td>
                            <td><a link="#" class="btn btn-warning ">Mais informações</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </section>
          <section id="depoimentos">
            <div class="container">
              <!-- Example row of columns -->
              <div class="row mt-5">
                <div class="col-md-4">
                  <h2>Heading</h2>
                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                  <p><a class="btn btn-warning" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                  <h2>Heading</h2>
                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                  <p><a class="btn btn-warning" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                  <h2>Heading</h2>
                  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                  <p><a class="btn btn-warning" href="#" role="button">View details &raquo;</a></p>
                </div>
              </div>
          
            </div> <!-- /container -->
          </section>
          
          <section id="footer">
          
          </section>
            </div>
        </div>
    </body>
</html>
