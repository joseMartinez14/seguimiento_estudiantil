<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,initial-scale=1, shrink-to-fit=no">

    <title>Seguimiento Estudiantil</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{ asset('css/informacionEstudiante.css') }}" rel="stylesheet">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/styleTable.css') }}" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    @include('layouts.header')

</head>

<body>
@if( $estudiantes[4] == 4 )
<div class="card">
    <div class="card-body">
        <div class="media">
            <div> <i style='font-size:24px' class='fas'>&#xf2c1;</i> </div>
            <div class="media-body">
                <ul class="list-unstyled fa-ul">
                    <li><i class="fa fa-user fa-li"></i><a href="#">{{ $estudiantes[0]->name }}</a></li>
                    <li><i class="fa fa-envelope fa-li"></i><a href="#">{{ $estudiantes[0]->email }} </a></li>
                    <li><a href="#"> Estudiante </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <div id="fondoTabla">
        <h1 id="TituloVista">Segimientos</h1>
        <div id="marg">
            <table class="table table-bordered table-striped mb-0 " id="example">
                <thead>
                    <tr>
                        <th id="colcorta" scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Asesor</th>
                        <th scope="col">Estudiante</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 1;
                    ?>
                    <tr>
                        <td>  <?php echo $index++ ?> </td>
                        <td>{{ $estudiantes[1][0]->id }}</td>
                        <td>{{ $estudiantes[3][0]->inicio}} - {{ $estudiantes[3][0]->final}}</td>
                        <td>{{ $estudiantes[2]->name }} </td>
                        <td>{{ $estudiantes[1][0]->estudiante_id }}</td>
                        <td>{{ $estudiantes[1][0]->descripcion }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div> <i style='font-size:24px' class='fas'>&#xf2c1;</i> </div>
                <div class="media-body">
                    <ul class="list-unstyled fa-ul">
                        <li><i class="fa fa-user fa-li"></i><a href="#">{{ $estudiantes[0]->name }}</a></li>
                        <li><i class="fa fa-envelope fa-li"></i><a href="#">{{ $estudiantes[0]->email }} </a></li>
                        <li><a href="#">Asesor</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include("layouts.footer")
</body>

</html>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        pageLength: 10,
        responsive: true,
        lengthMenu: [
            [10, 20, 100, -1],
            ["10", "20", "100", "Todos"]
        ],
        language: {

            search: "Buscar: ",
            lengthMenu: "Elementos _MENU_  por pagina",

            info: "Mostrando  _START_  a _END_ de _TOTAL_ elementos",

            loadingRecords: "Cargando Elementos...",
            zeroRecords: "No se encontraron elementos que coincidan con los parametros de busqueda",
            emptyTable: "No hay elementos disponibles",
            paginate: {
                first: "Primer",
                previous: "Anterior",
                next: "Siguiente",
                last: "Ultimo"
            },

        }

    });
});
</script>