<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Disponibilidad de citas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }} "></script>
</head>

<body onload="onload()">
    <!--Main Navigation-->
    @include("layouts.header")
    <!--Main Navigation-->

    <!-- Aqui empieza el  formulario -->
    <div class="form-card">
        <img src="imagenes/logo.jpg" class="rounded mx-auto d-block" style="width: 100px; height: 100px;">
        <h4 class="text-center">VICERRECTORÍA DE DOCENCIA</h4>
        <H5 class="text-center">ÉXITO ACADÉMICO</H5>
        <h4 class="text-center">REPORTE DE CLASES PARA TURORÍA ESPECIALIZADA</h4>
        <br><br>
        <div class="container">
            <button type="button" class="btn btn-primary text-center" id='GenerarPDF'> Generar reporte a PDF </button>

            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Código del curso</th>
                        <th scope="col">Nombre del curso</th>
                        <th scope="col">Aula</th>
                        <th scope="col">Hora Inicial</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody id="tabla_clases">
                    @foreach($data as $clase)
                    <tr style="height: 10px">
                        <td>{{ $clase["codigo_curso"] }}</td>
                        <td>{{ $clase["nombre_curso"] }}</td>
                        <td>{{ $clase["aula_codigo"] }}</td>
                        <td>{{ $clase["hora_inicio"] }}</td>
                        <td>{{ $clase["fecha"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include("layouts.footer")
</body>

</html>

<script>
    function onload() {
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ filas por pagina",
                    "zeroRecords": "No se encontro nada - sorry",
                    "info": "Mostrando pagina _PAGE_ of _PAGES_",
                    "infoEmpty": "Tabla Vacia",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primera",
                        "last": "Ultima",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
        });

    }
    
    function empezar(){
        $("#GenerarReporte").on("click", function(){generarReporteClases()});

    }
    empezar();
    function generarReporteClases(){
        //Aqui se manda la solicitud para generar el pdf
    }


</script>