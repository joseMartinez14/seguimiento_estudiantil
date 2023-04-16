<link href="{{ asset('css/styleHeader.css') }}" rel="stylesheet">
<header>
    <!-- ****** Bara del header ************ -->
    <nav class="navbar navbar-expand-lg navbar-dark default-color">

        <a class="logoHeader"><img src="../imagenes/logo-largo.png" /></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/logged_in">Inicio<span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-rigth">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/user/profile" :active="request()->routeIs('profile.show')">
                        {{ __('Perfil') }}
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Salir') }}
                        </a>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                </li>
                @endif
                @endif
                @endif
            </ul>
        </div>

    </nav>

</header>