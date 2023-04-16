<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Solicitud Regular </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
  <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
  <!--Main Navigation-->
  @include('layouts.header')
  <!--Main Navigation-->

  <!--<form method="post" action="/SeguimientoRegular" id="formSeguimientoRegular">
        @csrf -->

  <!-- Aqui empieza el  formulario -->
  <div class="form-card">
    <h4 style="text-align: center;"> VICERRECTORIA DE DOCENCIA</h4>
    <H5 style="text-align: center;"> EXITO ACADEMICO</H5>
    <h4 style="text-align: center;"> SOLICITUD DE SEGUIMIENTO REGULAR</h4>

    <br>
    <!-- Hilera del formulario -- nombre -->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">NOMBRE: </span>
      </div>
      <input type="text" class="form-control" id="campo-nombre" aria-describedby="basic-addon1" value="{{ $estudiante->name.' '.$estudiante->apellido }}" disabled>
    </div>
    <!-- Hilera del formulario -- cedula y telefono -->
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text">NUMERO DE CEDULA: </span>
      </div>
      <input type="text" class="form-control" id="campo-cedula" aria-describedby="basic-addon2" value="{{ $estudiante->id }}" disabled>

      <div class="input-group-append">
        <span class="input-group-text">TELEFONO: </span>
      </div>
      <input type="text" class="form-control" id="campo-telefono" aria-describedby="basic-addon2" value="{{$estudianteDetalle->tel_celular}}" disabled>
    </div>

    <!-- Hilera del formulario -- Correo y beca -->
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text">CORREO: </span>
      </div>
      <input type="text" class="form-control" id="campo-correo" aria-describedby="basic-addon2" value="{{ $estudiante->email}}" disabled>

      <div class="input-group-append">
        <span class="input-group-text">BECA: </span>
      </div>
      <input type="text" class="form-control" id="campo-beca" aria-describedby="basic-addon2" value="{{ $estudianteDetalle->financiamiento}}" disabled>
    </div>

    <!-- Hilera del formulario -- Carrera y ano de ingreso -->
    <div class="input-group mb-3">
      <div class="input-group-append">
        <span class="input-group-text">Carrera: </span>
      </div>
      <input type="text" class="form-control" id="campo-carrera" aria-describedby="basic-addon2" value="{{ $estudianteDetalle->universidadCarrera}}" disabled>

      <div class="input-group-append">
        <span class="input-group-text">AÑO DE INGRESO: </span>
      </div>
      <input type="text" class="form-control" id="campo-ingreso" aria-describedby="basic-addon2" value="{{ $estudianteDetalle->universidadAnnoIngreso}}" disabled>
    </div>
    <span class="input-group-text text-uppercase">Síntesis de la situación:</span>
    <div class="input-group">
      <textarea name="campo-situacion" id="campo-situacion" class="form-control"></textarea>
    </div>
    <?php

    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
    ?>
    <input type="hidden" value="{{$today}}" id="campo-fecha" name="campo-fecha">
    <br>
    <br>

    <h5> DISPONIBILIDAD DE HORARIO </h5>
    <div class="table-responsive ">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="cuadro-tabla">HORARIOS</th>
            <th class="cuadro-tabla">LUNES</th>
            <th class="cuadro-tabla">MARTES</th>
            <th class="cuadro-tabla">MIERCOLES</th>
            <th class="cuadro-tabla">JUEVES</th>
            <th class="cuadro-tabla">VIERNES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>8 am</td>
            <td class="cuadro-tabla opcion-tabla" inicio="8" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="8" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="8" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="8" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="8" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>
          <tr>
            <td>9 am</td>
            <td class="cuadro-tabla opcion-tabla" inicio="9" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="9" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="9" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="9" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="9" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>
          <tr>
            <td>10 am</td>
            <td class="cuadro-tabla opcion-tabla" inicio="10" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="10" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="10" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="10" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="10" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>
          <tr>
            <td>11 am</td>
            <td class="cuadro-tabla opcion-tabla" inicio="11" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="11" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="11" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="11" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="11" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>
          <tr>
            <td>1 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="13" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="13" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="13" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="13" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="13" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>

          <tr>
            <td>2 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="14" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="14" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="14" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="14" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="14" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>

          <tr>
            <td>3 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="15" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="15" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="15" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="15" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="15" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>

          <tr>
            <td>4 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="16" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="16" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="16" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="16" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="16" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>

          <tr>
            <td>5 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="17" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="17" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="17" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="17" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="17" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>

          <tr>
            <td>6 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="18" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="18" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="18" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="18" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="18" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>

          <tr>
            <td>7 pm</td>
            <td class="cuadro-tabla opcion-tabla" inicio="19" dia="lunes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="19" dia="martes" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="19" dia="miercoles" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="19" dia="jueves" onclick="seleccionarHorario(this)"></td>
            <td class="cuadro-tabla opcion-tabla" inicio="19" dia="viernes" onclick="seleccionarHorario(this)"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-append">
        <button onclick="enviarDatos()" class="btn btn-primary" name="enviar" id="boton-enviar">Enviar solicitud</button>
      </div>
    </div>

  </div>
  </div>
  <!--</form>-->
  @include("layouts.footer")
</body>

</html>

<script>
  $(document).ready(function() {
    ValidarDatos();
  });

  let lista_horarios = [];
  let copy_lista_horarios = [];

  function empezar() {
    $(".opcion-tabla").hover(function() {
      $(this).css("background-color", "#f6f799");
    }, function() {
      $(this).css("background-color", "white");
    });
    console.log("Entro a empezar por lo menos")
  }

  empezar();

  function seleccionarHorario(casilla) {
    let obj = {
      horaInicio: casilla.getAttribute('inicio'),
      dia: casilla.getAttribute('dia')
    }
    console.log(obj);
    if (casilla.innerHTML == "") {
      casilla.append("Disponible");
      lista_horarios.push(obj);
      copy_lista_horarios.push(casilla);
    } else {
      casilla.innerHTML = "";
      console.log(copy_lista_horarios.indexOf(casilla));
      if (copy_lista_horarios.indexOf(casilla) !== -1) {
        var index = copy_lista_horarios.indexOf(casilla);
        lista_horarios.splice(index, 1);
        copy_lista_horarios.splice(index, 1);
      }
    }
    console.log(lista_horarios);
  }

  function recolectarDatosGUI() {
    var x = document.getElementById("campo-situacion").value;
    datos = {
      estudiante_id: '{{$estudiante-> id}}',
      situacion: x,
      fechaSolicitud: $('#campo-fecha').val(),
      horarios: JSON.stringify(lista_horarios),
      estado: 'Pendiente',
      '_token': $("meta[name='csrf-token']").attr("content"),
      '_method': 'POST'
    }
    return (datos);
  }


  function enviarDatos() {
    //console.log(recolectarDatosGUI());
    if ($("#campo-situacion").val() && lista_horarios.length !== 0) {
      $.ajax({
        url: "{{url('/SolicitudSeguimientoRegular')}}",
        type: "POST",
        data: recolectarDatosGUI(),
        success: function(result) {
          console.log(result)
          if (result == 'Exito') {
            Swal.fire({
              icon: 'success',
              title: 'Exito',
              text: 'Solicitud Agrega con Exito!',
              showConfirmButton: false,
              timer: 2000
            });
            setTimeout(function() {
              window.location.href = "{{url('/Estudiante')}}";
            }, 2000);
          }
          if (result == 'Error') {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Ya hay una solitidud en proceso!',
            });
          }
        },
        error: function(result) {
          console.log(result.responseText);
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ha habido un problema!',
          });
        }
      });
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Completa los campos por favor!'
      });
    }

  }

  function ValidarDatos() {
    $.ajax({
      url: '/Estudiante/ValidarSeguimientoNormal',
      type: 'get',
      dataType: 'JSON',
      success: function(response) {
        console.log(response)
        switch (response) {
          case 1:
            Swal.fire({
              icon: 'warning',
              title: 'El estudiante ya tiene una solicitud en curso',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "/Estudiante";
              }
            });
            break;
          case 2:
            Swal.fire({
              icon: 'warning',
              title: 'El estudiante ya tiene una solicitud en curso',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "/SolicitudSeguimientosEstudiante";
              }
            });
            break;
          case 3:
            Swal.fire({
              icon: 'warning',
              title: 'Los seguimientos del estudiante han finalizado.\n\n¡¡¡Por favor solicitar un nuevo proceso!!!',
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "/SolicitudPrimerSeguimiento/create";
              }
            });
            break;
          default:

            break;
        }
      },
      error: function(result) {
        console.log(result)
        Swal.fire({
          icon: 'warning',
          title: 'Complete sus datos personales.',
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "/EstudianteDetalle";
          }
        })
      }
    });
  }
</script>