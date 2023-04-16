<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Disponibilidad de citas</title>
    <link rel="shortcut icon" href="Imagenes/logo-blanco.png" type="image/x-icon" />
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
</head>

<body>
@include('layouts.header')
    <!-- Aqui empieza el  formulario -->
    <div class= "form-card">
        <h4 class="text-center">VICERRECTORIA DE DOCENCIA</h4><H5 class="text-center">EXITO ACADEMICO</H5><h4 class="text-center">DISPONIBILIDAD PARA ASESORIAS</h4>
        <br><br>
        <div class="container">
          <div id="calendar"></div>
        </div>
    </div>

            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" id="boton-desplegar">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="table-responsive ">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th  class="cuadro-tabla">Horarios</th>
                  <th class="cuadro-tabla">Selecciones su disponibilidad </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> 8am - 9am </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="8" final="9"></td>
                </tr>
                <tr>
                <td> 9am - 10am </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="9" final="10"></td>
                </tr>
                <tr>
                <td> 10am - 11am </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="10" final="11"></td>
                  </tr>
                <tr>
                <td> 11am - 12pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="11" final="12" ></td>
                </tr>
                <tr>
                <td> 1pm - 2pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="13" final="14" ></td>
                </tr>
                <tr>
                <td> 2pm - 3pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="14" final="15" ></td>
                </tr>
                <tr>
                <td> 3pm - 4pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="15" final="16" ></td>
                  </tr>
                <tr>
                <td> 4pm - 5pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="16" final="17" ></td>
                  </tr>
                <tr>
                <td> 5pm - 6pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="17" final="18" ></td>
                  </tr>
                <tr>
                <td> 6pm - 7pm </td>
                  <td class="cuadro-tabla opcion-tabla" inicio="18" final="19" ></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='horario-dia' data-dismiss="modal">Enviar</button>
      </div>
    </div>
  </div>
</div>
  @include("layouts.footer")
</body>

</html>

<script>

    let lista_horarios = [];
    let copy_lista_horarios = [];
    let dateActual;
    let resultado;
    var calendar;
    function empezar(){
      //Oculpar el popup
        $("#boton-desplegar").hide();
        
      //Manejar la tabla de seleccion de horario
        $(".opcion-tabla").hover(function(){
            $(this).css("background-color", "#f6f799");
            },function(){
        $(this).css("background-color","white");} );
        $(".opcion-tabla").on("click", function(){seleccionarCasilla(this)});
        $("#horario-dia").on("click", function(){lista_horarios.forEach((x)=> guardarHorario(x));})
        calendar = $('#calendar').fullCalendar({
          monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
          monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
          dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
          dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
          editable:false,
          header:{
          left:'prev,next today',
          center:'title',
          right: ''
          },
          selectable: true,
          selectAllow: false,
          events: async function(start, end, timezone, callback) {
            var response = await fetch('horario-citas/create', {method: 'GET'});
            var resul = await response.json();
            var events = [];
            console.log(resul);
            resul.forEach((row)=>{
              events.push({
                id: row.id,
                title: row.title,
                start: row.start,
                end: row.end
              });
            });
            callback(events);
            },
          select: function(start, end, allDay,a,b,c)
          {
            console.log(start);
            $(".opcion-tabla").empty();
            dateActual = $.fullCalendar.formatDate(start,"Y-MM-DD");
            console.log(dateActual);
            lista_horarios = [];
            copy_lista_horarios = [];
            var today = new Date();
            var tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() - 2);
            var inicio = $.fullCalendar.formatDate(start,"Y-MM-DD");
            if(start.isBefore(tomorrow)) {
              $('#calendar').fullCalendar('unselect');
              return false;
            }
            $("#boton-desplegar").trigger("click");
          },
          eventClick: function(info) {
            console.log(info);

  }

        });
    }

    empezar();

    function enviarHorarios(){
      lista_horarios.forEach((x)=> guardarHorario(x));
    }


    function guardarHorario(horario){
      console.log("Entro a guardarHorario con:");
      console.log(horario);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
          url: "horario-citas",
          type: "POST",
          data: {horarios:JSON.stringify(horario), _token: '{{csrf_token()}}' },
          success: function (result) {
              console.log("success");
              console.log(result)
              calendar.fullCalendar('refetchEvents');
          }
          
      });
    }

    function seleccionarCasilla( casilla ){
      let obj = {inicio: '' +dateActual+' '+casilla.getAttribute('inicio')+':00:00', final: '' +dateActual+' '+casilla.getAttribute('final')+':00:00', titulo: 'Disponible'}
      console.log(obj);
      if(casilla.innerHTML == ""){
        casilla.append("Disponible");
        lista_horarios.push(obj);
        copy_lista_horarios.push(casilla);
      }
      else{
        casilla.innerHTML = "";
        console.log(copy_lista_horarios.indexOf(casilla));
        if(copy_lista_horarios.indexOf(casilla) !== -1){
         var index = copy_lista_horarios.indexOf(casilla);
         lista_horarios.splice(index,1);
         copy_lista_horarios.splice(index, 1);
        }
      }

      console.log(lista_horarios);
    }



</script>