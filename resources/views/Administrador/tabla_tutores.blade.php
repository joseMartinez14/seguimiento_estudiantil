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
    <script src="{{ asset('js/buscadorParaTablas.js') }}" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/styleTable.css') }}" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    @include('layouts.header')

</head>

<body>
    <div id="fondoTabla">
        <h1 id="TituloVista">Tutores</h1>
        <div class="col-6">
            <div class="input-group mb-2">
                <input id="texto" class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Search.." aria-label="Input group example">
                <div class="input-group-append">
                <span class="input-group-text">Buscar</span>
                </div>
            </div>
        </div>
        <div id="marg">
            <table class="table table-bordered table-striped mb-0 w-auto order-table" id="example" >
                <thead>
                    <tr>
                        <th id="colcorta" scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 1;
                    ?>
                    @foreach($tutores[1] as $tutor)
                    <tr style="height: 10px">

                        <td>  <?php echo $index++;?> </td>
                        <td >{{ $tutor[0]->id }}</td>
                        <td>{{ $tutor[0]->usuario }}</td>
                        <td> {{ $tutor[0]->name }}</td>
                        <td>{{ $tutor[0]->apellido }}</td>
                        <td> {{ $tutor[0]->email }}</td>
                        <td>
                        
                            <button type="submit" class="btn btn-default"><img src="Imagenes/basurero.png"
                                    style=" width: 50px; height: 50px;"></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
<script>

</script>