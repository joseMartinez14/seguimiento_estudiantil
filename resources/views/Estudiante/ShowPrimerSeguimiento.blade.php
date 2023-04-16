<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
</head>

<body>
<!--Main Navigation-->
<!--Main Navigation-->
    <!-- Aqui empieza el  formulario -->
  <div class= "form-card">
        <h4>VICERRECTORIA DE DOCENCIA</h4><H5>EXITO ACADEMICO</H5><h4>SOLICITUD DE TUTORIA</h4>
        <!-- Hilera del formulario -- nombre -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">NOMBRE: </span>
            </div>
            <input type="text" class="form-control" placeholder="Esto deberia agarrarse automaticamente" id ="campo-nombre" aria-describedby="basic-addon1" value="{{ $estudiante->name.' '.$estudiante->apellido }}" disabled>
          </div>
          <!-- Hilera del formulario -- cedula y telefono -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">NUMERO DE CEDULA: </span>
              </div>
            <input type="text" class="form-control" placeholder="Numero de cedula (tambien automaticamente)" id="campo-cedula" aria-describedby="basic-addon2" value="{{ $estudiante->id }}"  numeroCed ="{{ $estudiante->id }}"disabled>

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

          <!-- Hilera del formulario -- Materia -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">MATERIA EN LA QUE SOLICITA TUTORIA: </span>
            </div>
            <input type="text" class="form-control" id ="campo-materia" aria-describedby="basic-addon1" value="{{ $primerSeguimiento->materiaTutoria}}" disabled>
          </div>

          <!-- Hilera del formulario -- Profesor -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">NOMBRE DEL/DE LA PROFESOR/A: </span>
            </div>
            <input type="text" class="form-control" id ="campo-profesor" aria-describedby="basic-addon1" value="{{ $primerSeguimiento->profesorCurso}}" disabled>
          </div>

          <!-- Hilera del formulario -- Creditos y ano de horas -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">CREDITOS DEL CURSO: </span>
              </div>
            <input type="text" class="form-control" id="campo-creditos" aria-describedby="basic-addon2" value="{{ $primerSeguimiento->creditoCruso}}" disabled>
          </div>
          <span class="input-group-text text-uppercase">Síntesis de la situación:</span>
          <div class="input-group">
            <textarea  class="form-control" disabled> {{ $primerSeguimiento->situacion}} </textarea>
          </div>
          <br>
          <h5> DISPONIBILIDAD DE HORARIO  </h5>
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
                  <td class="cuadro-tabla opcion-tabla" id="8-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="8-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="8-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="8-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="8-viernes"></td>
                </tr>
                <tr>
                  <td>9 am</td>
                  <td class="cuadro-tabla opcion-tabla" id="9-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="9-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="9-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="9-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="9-viernes"></td>
                </tr>

                <tr>
                  <td>10 am</td>
                  <td class="cuadro-tabla opcion-tabla" id="10-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="10-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="10-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="10-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="10-viernes"></td>
                </tr>

                <tr>
                  <td>11 am</td>
                  <td class="cuadro-tabla opcion-tabla" id="11-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="11-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="11-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="11-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="11-viernes"></td>
                </tr>

                <tr>
                  <td>1 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="13-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="13-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="13-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="13-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="13-viernes"></td>
                </tr>

                <tr>
                  <td>2 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="14-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="14-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="14-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="14-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="14-viernes"></td>
                </tr>

                <tr>
                  <td>3 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="15-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="15-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="15-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="15-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="15-viernes"></td>
                </tr>

                <tr>
                  <td>4 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="16-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="16-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="16-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="16-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="16-viernes"></td>
                </tr>

                <tr>
                  <td>5 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="17-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-viernes"></td>
                </tr>

                <tr>
                  <td>6 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="18-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-viernes"></td>
                </tr>

                <tr>
                  <td>5 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="17-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="17-viernes"></td>
                </tr>

                <tr>
                  <td>6 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="18-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="18-viernes"></td>
                </tr>

                <tr>
                  <td>7 pm</td>
                  <td class="cuadro-tabla opcion-tabla" id="19-lunes"></td>
                  <td class="cuadro-tabla opcion-tabla" id="19-martes" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="19-miercoles"></td>
                  <td class="cuadro-tabla opcion-tabla" id="19-jueves" ></td>
                  <td class="cuadro-tabla opcion-tabla" id="19-viernes"></td>
                </tr>

              </tbody>
            </table>
          </div>
    </div>
    @include("layouts.footer")

    <!-- Modal -->
    <div id= "modal-error" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Se produjo un error al cargar los horarios
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal"  id="botonMostrar" data-target="#modal-error" hidden>
    Launch demo modal
    </button>


</body>

</html>

<script>
    let cedEst = 0;
    function empezar(){
      cedEst = $("#campo-cedula").attr('numeroCed');
      console.log(cedEst);
      solicitarHorarios();
    }
    empezar();    

    function solicitarHorarios(){
      if(cedEst == 0){
        console.log("No funciono el trucazo");
      }
      else{
        try{
          $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/Estudiante/"+ cedEst,
            type: "GET",
            success: function (horarios) {
                //Aqui entra porque la respuesta es correcta
                console.log("success");
                console.log(horarios);
                horarios.forEach((hor)=>{asignarHorario(hor);});
            },
            error: function(status, error){
                console.log(error);
                console.log("Entro al ajax, pero dio error")
                $("#botonMostrar").click();
            }
            });
          }catch(err){
            console.log(err);
            $("#botonMostrar").click()
            }

      }
    }

    function asignarHorario(horario){
      $("#"+horario.hora+"-"+horario.dia).html('Disponible');
    }


</script>

