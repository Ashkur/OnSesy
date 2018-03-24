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
              @if (Auth::guest())
                <a class="btn btn-warning ml-1" href="{{ route('login') }}"><b>Login</b></a>
                <a class="btn btn-warning ml-1" href="{{ route('register') }}"><b>Cadastro</b></a>
              @else
                <li><a href="#">{{ Auth::user()->name }}</a></li></li>
                <li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
              @endif
        </div>
    </div>
</nav>