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
  @include("layouts.header")
</head>

<body>
  <!--Main Navigation-->
  <!--Main Navigation-->
  <form method="post" action="/SeguimientoRegular" id="formSeguimientoIndividual" enctype="multipart/form-data">
    @csrf
    <!-- Aqui empieza el  formulario -->
    <input type="hidden" name="campo-id" id="campo-id" value="{{$reunion->id}}">
    <input type="hidden" name="campo-estudiante" id="campo-estudiante" value="{{$reunion->estudiante_id}}">
    <input type="hidden" name="campo-fecha" id="campo-fecha" value="{{$reunion->start}}">

    <div class="form-card">
      <h4 class="text-center">VICERRECTORIA DE DOCENCIA</h4>
      <H5 class="text-center">EXITO ACADEMICO</H5>
      <h4 class="text-center">ESPACIO PARA USO DE LA COORDINACIÓN</h4>

      <!-- Hilera del formulario -- cedula y telefono -->
      <div class="input-group mb-3">
        <div class="input-group-append">
          <span class="input-group-text">Fecha: </span>
        </div>
        <input type="text" class="form-control" id="campo-fecha" name="campo-fecha" value="{{$reunion->start}}" aria-describedby="basic-addon2" style="width: 50%;" disabled>
      </div>

      <!-- Hilera del formulario -- Nombre del estudiante -->
      <div class="input-group mb-3">
        <div class="input-group-append">
          <span class="input-group-text">Nombre del/la estudiante: </span>
        </div>
        <input type="text" class="form-control" id="campo-nombre" name="campo-nombre" aria-describedby="basic-addon2" value="{{App\Models\User::find($reunion->estudiante_id)->name.' '.App\Models\User::find($reunion->estudiante_id)->apellido}}" disabled>
      </div>

      <!-- Hilera del formulario -- Sintesis de la situacion -->
      <div class="input-group mb-1">
        <div class="input-group-append">
          <span class="input-group-text">Sintesis de la situacion: </span>
        </div>
      </div>
      <textarea class="form-control" id="campo-sintesis" name="campo-sintesis" rows="3"></textarea>
      <br>
      <!-- Hilera del formulario -- Sintesis de la situacion -->
      <div class="input-group mb-1">
        <div class="input-group-append">
          <span class="input-group-text">Acuerdos: </span>
        </div>
      </div>
      <textarea class="form-control" id="campo-acuerdos" name="campo-acuerdos" rows="3"></textarea><br>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" name="campo-finalizar" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Finalizar Seguimientos</label>
      </div>
      <br>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Archivo</span>
          <input type="file" class="form-control" name="archivo" id="archivo" aria-describedby="basic-addon1">
        </div>
      </div>
      <button type="submit" id="boton-enviar" class="btn btn-primary">Enviar solicitud</button>
  </form>


</body>
@include("layouts.footer")

</html>

<script>

</script>