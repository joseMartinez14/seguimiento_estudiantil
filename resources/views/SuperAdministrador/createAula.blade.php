<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</head>

<body>
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->
    <form method="post" action="/Aula" id="formCreateAula">
        @csrf
        <!-- Aqui empieza el  formulario -->
        <div class="form-card">
            <h4>VICERRECTORIA DE DOCENCIA</h4>
            <H5>EXITO ACADEMICO</H5>
            <h4>ESPACIO PARA CREACION DE AULAS</h4>

            <!-- Hilera del formulario -- Codigo Aula  -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text ">Codigo: </span>
                </div>
                <input type="text" class="form-control" id="aulaCodigo" name="aulaCodigo"  aria-describedby="basic-addon2">
            </div>

            <!-- Hilera del formulario -- Sede Aula  -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text ">Sede: </span>
                </div>
                <select type="text" class="form-control" id="aulaSede" name="aulaSede"  aria-describedby="basic-addon2"  >
                    <option>Central Omar Dengo</option>
                    <option>Benjamín Núñez</option>
                </select>
            </div>

            <!-- Hilera del formulario -- Nombre Aula  -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text ">Nombre: </span>
                </div>
                <input type="text" class="form-control" id="aulaNombre" name="aulaNombre"  aria-describedby="basic-addon2">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <button type="sudmit" class="btn btn-primary" id="boton-enviar">Guardar</button>
                </div>
            </div>
        </div>
    </form>
    @include("layouts.footer")
</body>

</html>

<script>
function empezar() {
    $(".opcion-tabla").hover(function() {
        $(this).css("background-color", "#f6f799");
    }, function() {
        $(this).css("background-color", "white");
    });
}

empezar();
</script>