<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="{{ asset('fullcalendar-5.5.1/lib/main.css') }}" rel="stylesheet">
    <script src="{{ asset('fullcalendar-5.5.1/lib/main.js') }}"></script>
    <script src="{{ asset('fullcalendar-5.5.1/lib/locales/es.js') }}"></script>
</head>

<body>
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->
    <!-- Aqui empieza el  formulario -->
    @php
    $contador = 0;
    @endphp

    <div class="form-card">
        <h4>VICERRECTORIA DE DOCENCIA</h4>
        <H5>EXITO ACADEMICO</H5>
        <h4>SEGUIMIENTOS DEL ESTUDIANTE</h4>
        <div class="card">

            <div class="card" style="margin: 1rem;">
                <!-- /.card-header -->
                <div class=" card-header titulo mb-2">
                    <span><i class="fas fa-bars"></i> Listado de seguimientos de
                        @if(count($seguimientos) != 0)
                        {{$seguimientos[0][0]}} {{$seguimientos[0][1]}}
                    </span>
                    <a href="/DescargarTodos/?id={{$seguimientos[0][2]}}"><button class='btn btn-primary btn-sm' style="position: absolute; right: 1rem;"> Descargar toda la carpeta</button></a>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Seguimiento</th>
                                <th scope="col" colspan="2">Archivo Adjunto</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-solicitudes">
                            @foreach($seguimientos as $seguimiento)
                            <tr style="height: 10px">
                                <td>{{ $seguimiento[2] }}</td>
                                <td>{{ $seguimiento[3] }}</td>
                                @if( $contador++ == 0)
                                <td><a href="/DescargarPDF/?id={{$seguimiento[2]}}&file=primerSeguimiento-{{$seguimiento[2]}}-{{$seguimiento[5]}}.pdf"><button class='btn btn-primary'>Descargar</button></a></td>
                                @else
                                <td><a href="/DescargarPDF/?id={{$seguimiento[2]}}&file=seguimientoRegular-{{$seguimiento[2]}}-{{$seguimiento[5]}}.pdf"><button class='btn btn-primary'>Descargar</button></a></td>
                                @endif
                                @if($seguimiento[4] != NULL)
                                <td>{{$seguimiento[4]}} </td>
                                <td>
                                    <a href="/Descargar/?id={{$seguimiento[2]}}&file={{$seguimiento[4]}}"><button class='btn btn-info'><i class="fa fa-download"></i> Archivo</button></a>
                                </td>
                                @else
                                <td colspan="2">Sin archivo adjunto</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
    @include("layouts.footer")
</body>

</html>

<script>

</script>