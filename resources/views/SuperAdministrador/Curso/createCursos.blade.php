<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar Cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</head>

<body onload="onLoad()">
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->

    <!-- Aqui empieza el  formulario -->
    <div class="form-card">
        <div class="card-header" style="text-align-last: center;">
            <h4>Añadir Curso</h4>
        </div>
        <form method="post" action="/Cursos">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">CÓDIGO: </span>
                </div>
                <input type="text" class="form-control" placeholder="codigo" id="cursoCodigo" name="cursoCodigo" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">NOMBRE: </span>
                </div>
                <input type="text" class="form-control" placeholder="nombre" id="cursoNombre" name="cursoNombre" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">CURSO NECESARIO: </span>
                </div>
                <input type="text" class="form-control" placeholder="curso necesario" id="cursoNecesario" name="cursoNecesario" aria-describedby="basic-addon1">
            </div>
            <input type="submit" name="enviar" value="Registrar">
        </form>
    </div>
    @include("layouts.footer")
</body>

</html>
<script>
    function onLoad() {
        document.getElementById("logoLargo").src = window.location.origin + "/imagenes/logo-largo.png";
    }
</script>