<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark" >
    <div class="container">
        <img src="{{ asset('images/logo.svg') }}" alt="Sistema Online de Seletivos" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
            <a class="navbar-brand h1 mb-0" href="#" alt="Sistema Online de Seletivos">OnSeSy</a>
              <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarSite">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('UserController@index')}}">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('EditalController@index')}}">Editais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('UserController@index')}}">Seletivos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{action('ComunicadoController@index')}}">Comunicados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('PapelController@index')}}">Papéis Administrativos</a>
                </li>
              </ul>

              @if (Auth::guest())
                <a class="btn btn-warning ml-1" href="{{ route('login') }}"><b>Login</b></a>
                <a class="btn btn-warning ml-1" href="{{ route('register') }}"><b>Cadastro</b></a>
              @else

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}"
                        class="nav-link"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
              @endif
        </div>
    </div>
</nav>