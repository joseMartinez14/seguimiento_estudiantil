<link rel="shortcut icon" href="Imagenes/logo-blanco.png" type="image/x-icon" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Registro</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script src="{{ asset('js/validaciones.js') }}"></script>
<!-- {{ route('register') }} -->

<script>
    $(document).ready(function() {
        $("#cedula").mask("000000000");
        $("#usuario").val($("#nombre").val() + $("#apellidos").val());
    });
</script>


<x-guest-layout style="background-color: red;">
    @include("Welcome.headerWelcome")
    <x-jet-authentication-card>

        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="mensaje-container" id="mensaje-info" style="display:none;">
            <div class="col-3 icono-mensaje d-flex align-items-center" id="icono-mensaje"></div>
            <div class="col-9 texto-mensaje d-flex align-items-center text-center mx-2" id="texto-mensaje" style="color: #046704e8; ">Mensaje</div>
        </div>

        <div class="container mt-5 p-0">

            <form method="POST" name="registro" action="{{ route('register') }}" onsubmit="return validaCamposRegistro()">
                @csrf
                <x-jet-input type="hidden" name="rol" :value="3" />
                <img id="profile-img" class="profile-img-card" src="imagenes/logo.jpg" />
                <div>
                    <h1><strong>Indicaciones</strong></h1>
                    <label>Los campos con un <span style="color:red"><strong>*</strong></span> rojo son obligatorios</label>
                    <br />
                </div>

                <div>
                    <div class="mt-3">
                        <x-jet-label value="Cédula en formato 208880999" />
                    </div>
                    <label>Cédula<span style="color:red"><strong>*</strong></span></label>
                    <x-jet-input class="block mt-1 w-full" type="text" name="id" :value="old('id')" id="cedula" required autofocus autocomplete="id" />
                </div>

                <div class="mt-4">
                    <label>Nombre<span style="color:red"><strong>*</strong></span></label>
                    <x-jet-input class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required id="nombre" />
                </div>

                <div class="mt-4">
                    <label>Apellidos<span style="color:red"><strong>*</strong></span></label>
                    <x-jet-input class="block mt-1 w-full" type="test" name="apellido" :value="old('apellido')" required id="apellidos" />
                </div>

                <div class="mt-4">
                    <div class="mt-3">
                        <x-jet-label value="Utilizar el correo institucional  nombre.apellido.apellido@est.una.ac.cr" />
                    </div>
                    <label>Email<span style="color:red"><strong>*</strong></span></label>
                    <x-jet-input class="block mt-1 w-full" type="email" name="email" id="email" :value="old('email')" required />
                </div>
                <div class="mt-4">
                    <div class="mt-3">
                        <x-jet-label value="La contraseña debe tener 8 caracteres minimo y contener numeros y letras" />
                    </div>
                    <label>Contraseña<span style="color:red"><strong>*</strong></span></label>
                    <x-jet-input class="block mt-1 w-full" type="password" name="password" id="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <label>Comfirmar contraseña<span style="color:red"><strong>*</strong></span></label>
                    <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Ya esta registrado?') }}
                    </a>
                    <x-jet-button class="ml-4">
                        {{ __('Registrarse') }}
                    </x-jet-button>
                </div>
            </form>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
@include("layouts.footer")