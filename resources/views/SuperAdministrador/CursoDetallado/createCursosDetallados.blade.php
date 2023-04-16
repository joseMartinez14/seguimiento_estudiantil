<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar cursos por periodo</title>
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
    @include('layouts.header')
    <!-- Aqui empieza el  formulario -->
    <div class="form-card">
        <div class="card-header" style="text-align-last: center;">
            <h4>Cursos por Periodo</h4>
        </div>
        @if($tutores->count() != 0 && $cursos->count() != 0)
        <form method="post" action="/CursosDetallados" id="cursosDetallados">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">CÓDIGO: </span>
                </div>
                <select class="form-control" name="cursoCodigo" id="cursoCodigo" form="cursosDetallados" aria-describedby="basic-addon1">
                    @foreach($cursos as $curso)
                    <option value="{{$curso->codigo}}">{{$curso->codigo.' '.$curso->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">PERIODO: </span>
                </div>
                <input type="number" class="form-control" id="anno" min="1970" name="anno" aria-describedby="basic-addon1">
                <select class="form-control" name="periodo" id="periodo" form="cursosDetallados" aria-describedby="basic-addon1" onchange="numPeriodos()">
                    <option value="Semestre">Semestre</option>
                    <option value="Cuatrimestre">Cuatrimestre</option>
                    <option value="Trimestre">Trimestre</option>
                    <option value="Bimestre">Bimestre</option>
                </select>
                <input type="number" placeholder="Numero de periodo" class="form-control" id="numPeriodo" name="numPeriodo" aria-describedby="basic-addon1" min="1" max="2" require>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">HORA INICIO: </span>
                    <input type="time" class="form-control" placeholder="Hora Inicio" id="horaInicio" name="horaInicio" aria-describedby="basic-addon1" min="07:00" max="21:00" step="1800" required>
                    <span class="input-group-text">HORA FINAL: </span>
                    <input type="time" class="form-control" placeholder="Hora Final" id="horaFinal" name="horaFinal" aria-describedby="basic-addon1" min="08:00" max="22:00" step="1800">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">DIA: </span>
                    <select class="form-control" name="dia" id="dia" form="cursosDetallados" aria-describedby="basic-addon1">
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                    </select>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">TUTOR: </span>
                    <select class="form-control" name="tutor" id="tutor" form="cursosDetallados" aria-describedby="basic-addon1">
                        @foreach($tutores as $tutor)
                        <option value="{{$tutor->id}}">{{$tutor->id.' '.App\Models\User::find($tutor->id)->name.' '.App\Models\User::find($tutor->id)->apellido}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-text">AULA: </span>
                    <select class="form-control" name="aula" id="aula" form="cursosDetallados" aria-describedby="basic-addon1">
                        @foreach($aulas as $aula)
                        <option value="{{$aula->codigo}}">{{$aula->codigo.' '.$aula->sede}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <input type="submit" name="enviar" value="Registrar">
        </form>
        @else
        <h2>No hay cursos o tutores registrados</h2>
        @endif
    </div>
    @include("layouts.footer")
</body>

</html>
<script>
    const mouseOnlyNumberInputField = document.getElementById("anno");
    mouseOnlyNumberInputField.addEventListener("keypress", (event) => {
        event.preventDefault();
    });

    const mouseOnlyNumberInputField2 = document.getElementById("numPeriodo");
    mouseOnlyNumberInputField2.addEventListener("keypress", (event) => {
        event.preventDefault();
    });

    function onLoad() {
        document.getElementById("logoLargo").src = window.location.origin + "/imagenes/logo-largo.png";
        var today = new Date();
        var yyyy = today.getFullYear();
        document.getElementById("anno").setAttribute("max", yyyy);
        document.getElementById("anno").value = yyyy;
    }

    function numPeriodos() {
        var x = document.getElementById("periodo").value;
        switch (x) {
            case "Semestre":
                document.getElementById("numPeriodo").setAttribute("max", 2);
                break;
            case "Cuatrimestre":
                document.getElementById("numPeriodo").setAttribute("max", 3);
                break;
            case "Trimestre":
                document.getElementById("numPeriodo").setAttribute("max", 4);
                break;
            case "Bimestre":
                document.getElementById("numPeriodo").setAttribute("max", 6);
                break;
            default:
                document.getElementById("numPeriodo").setAttribute("max", 1);
                break;
        }
        document.getElementById("numPeriodo").setAttribute("max", yyyy);
    }
</script>