<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,initial-scale=1, shrink-to-fit=no">

    <title>Cursos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/styleTable.css') }}" rel="stylesheet">
    <script src="{{ asset('js/buscadorParaTablas.js') }}" crossorigin="anonymous"></script>

    @include('layouts.header')
</head>

<body>
    <div class="row mt-3">
        <div class="col-12">

            <div class="card" style="margin: 1rem;">
                <div class="card-header titulo mb-2">
                    <h3 id="TituloVista">Cursos por periodo</h3>
                </div>
                <div class="card-body ">
                    @if($cursos != null)

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tutor</th>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Día</th>
                                    <th scope="col">Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cursos as $curso)
                                <tr style="height: 10px">
                                    <td>{{App\Models\curso::find($curso->curso_codigo)->codigo }}</td>
                                    <td>{{App\Models\curso::find($curso->curso_codigo)->nombre}}</td>
                                    <td>{{App\Models\User::find(App\Models\tutor::find($curso->tutor_id)->id)->name.' '.App\Models\User::find(App\Models\tutor::find($curso->tutor_id)->id)->apellido}}</td>
                                    <td>{{$curso->anno.' - '.$curso->periodo.' - '.$curso->num_periodo}}</td>
                                    <td>{{$curso->dia}}</td>
                                    <td>{{($curso->hora_final!=null)?$curso->hora_inicio.' - '.$curso->hora_final:$curso->hora_inicio}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h2>Tabla Vacia</h2>
                    @endif
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

</body>
@include("layouts.footer")

</html>
<script>
</script>