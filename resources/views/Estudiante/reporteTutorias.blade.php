<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDF FILE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
  </head>
  <body>
  <div class= "form-card" >
    <br><br>
        <img src="imagenes/logo.jpg" class="rounded mx-auto d-block" style = "width: 100px; height: 100px;">  <h4 class="text-center">EXPEDIENTE DE CITAS</h4><H5 class="text-center">EXITO ACADEMICO </H5>
        <br><br>
        <table class="table table-bordered text-center " style="width: 90%; margin: auto; background-color: #f46767;">
          <thead class="thead-dark"> 
            <tr>
              <th scope="col">Estudiante</td>
              <th scope="col">Detalle Curso</td>
              <th scope="col">Aula</td>
              <th scope="col">Fecha</td>
              <th scope="col">Hora inicio</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($employee as $data)
                <tr>
                    <<td>{{$data->estudiante }}</td>
                    <td>{{ $data->curso }}</td>
                    <td>{{ $data->aula }}</td>
                    <td>{{ $data->fecha }}</td>
                    <td>{{ $data->horaInicio }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        <div class="container">
        </div>
    </div>
    
  </body>
</html>