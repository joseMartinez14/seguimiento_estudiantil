<link href="{{ asset('css/loging.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
$(document).ready(function(){
    $("#inputEmail").mask("000000000");
});
</script>

<head>
    <title>Login</title>
</head>

@include('layouts.header')

<body>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="imagenes/logo.jpg" />
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input type="id" name="id" value="" required autofocus id="inputEmail" class="form-control" placeholder="Cédula">
                <input type="password" name="password" value="" required autocomplete="current-password" id="inputPassword" placeholder="Contraseña" class="form-control" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> {{ __('Recuerdame') }}
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            @if (Route::has('password.request'))
            <a class="forgot-password" href="{{ route('password.request') }}">
                {{ __('Olvido su contraseña?') }}
            </a>
            @endif
            
        </div><!-- /card-container -->
    </div><!-- /container -->
    @include("layouts.footer")
</body>