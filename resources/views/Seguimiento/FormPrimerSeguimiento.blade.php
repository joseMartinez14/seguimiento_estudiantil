<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
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

<body>
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->
    <form method="post" action="/PrimerSeguimiento" id="formPrimerSeguimiento" enctype="multipart/form-data">
        @csrf
        <!-- Aqui empieza el  formulario -->
        <input type="hidden" name="campo-id" id="campo-id" value="{{$reunion->id}}">
        <input type="hidden" name="campo-estudiante" id="campo-estudiante" value="{{$reunion->estudiante_id}}">
        <input type="hidden" name="campo-fecha" id="campo-fecha" value="{{$reunion->start}}">
        <div class="form-card">
            <h4>VICERRECTORIA DE DOCENCIA</h4>
            <H5>EXITO ACADEMICO</H5>
            <h4>ESPACIO PARA USO DE LA COORDINACIÓN</h4>
            <!-- Hilera del formulario -- nombre -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text" style="margin-right: 10px;">Aprobada:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-aprovada" id="campo-aprovada1" value="Aprobada" checked onclick="deshabilitarCampo()">
                        <label class="form-check-label" for="campo-aprovada1">Si</label>
                    </div>
                    <span class="input-group-text" style="margin-right: 10px;">No aprobada:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-aprovada" id="campo-aprovada2" value="No aprobada" onclick="deshabilitarCampo()">
                        <label class="form-check-label" for="campo-aprovada2">No</label>
                    </div>
                </div>
            </div>
            <!-- Hilera del formulario -- cedula y telefono -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">CURSO ASIGNADO: </span>
                </div>
                <select class="form-control" name="campo-curso" id="campo-curso" form="formPrimerSeguimiento" aria-describedby="basic-addon2" style="margin-right: 15px;">
                    @foreach($info_cursos as $curso)
                    <option value="{{$curso[0]}}">{{$curso[8]}} Tutor: {{$curso[1]}} Periodo: {{$curso[3]}}-{{$curso[4]}}-{{$curso[2]}} Dia: {{$curso[7]}} Hora: {{$curso[5]}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Hilera del formulario -- Materia -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Observaciones: </span>
                </div>
                <textarea name="campo-observaciones" class="form-control"></textarea>
            </div>

            <!-- Aqui va el archivo que se necesita -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Archivo</span>
                    <input type="file" class="form-control" name="archivo" id="archivo" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="input-group mb-3">
                <button type="submit" id="boton-enviar" class="btn btn-primary">Enviar</button>
            </div>

        </div>

    </form>
    @include("layouts.footer")
</body>

</html>

<script>
    function deshabilitarCampo() {
        if (document.getElementById("campo-aprovada1").checked) {
            document.getElementById("campo-curso").disabled = false;
        }
        if (document.getElementById("campo-aprovada2").checked) {
            document.getElementById("campo-curso").disabled = true;
            document.getElementById("campo-curso").value = "";
        }
    }
</script>