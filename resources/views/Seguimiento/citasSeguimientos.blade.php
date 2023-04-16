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
    
</head>

<body>
  <!--Main Navigation-->
  @include("layouts.header")
<!--Main Navigation-->
  
    <!-- Aqui empieza el  formulario -->
    <div class= "form-card">
        <h4 class="text-center">VICERRECTORÍA DE DOCENCIA</h4><H5 class="text-center">ÉXITO ACADÉMICO</H5><h4 class="text-center">DISPONIBILIDAD PARA ASESORIAS</h4>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Agendar cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="table-responsive ">
      <div><h6 id='modalBody' ></h6></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id='agendarCita' data-dismiss="modal">Reservar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@include("layouts.footer")
</body>

</html>

<script>

    let horarioActual;
    let resultado;
    var calendar;
    function empezar(){
      //Funcionalidad del boton reservar
      $("#agendarCita").on("click", function(){agendarUnaCita()});

      //Oculpar el popup
        $("#boton-desplegar").hide();
        
      //Manejar la tabla de seleccion de horario
        calendar = $('#calendar').fullCalendar({
          monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
          monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
          dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
          dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
          header: {
              left   : 'prev,next',
              center : 'title',
              right  : 'agendaWeek, agendaDay'
              },
          defaultView: 'agendaWeek',
          selectable: true,
          selectAllow: false,
          events: async function(start, end, timezone, callback) {
            var response = await fetch('AgendarSeguimientos/create', {method: 'GET'});
            var resul = await response.json();
            var events = [];
            console.log(resul);
            resul.forEach((row)=>{
              if(row.title === 'Disponible'){
                events.push({
                  id: row.id,
                  title: row.title,
                  start: row.start,
                  end: row.end
                });
              }
              else{
                events.push({
                  id: row.id,
                  title: 'Reservado',
                  start:  row.start,
                  end: row.end,
                  backgroundColor:'#e52b2b', 
                });
              }
            });
            callback(events);
            },
            eventClick: function(info) {
              var today = new Date();
              var tomorrow = new Date(today);
            if(info.title == 'Disponible' && !info.start.isBefore(tomorrow)){
              horarioActual = info;
              let dia = $.fullCalendar.formatDate(info.start,"DD/MM/YYYY");
              let hora = $.fullCalendar.formatDate(info.start,"hh:mm a");
              $("#boton-desplegar").trigger("click");
              document.getElementById("modalBody").innerHTML = "Seguro que quiere agendar una cita el "+ dia + " a las " + hora;
            }
            else{
              mostrarMensaje("error",'Horario no disponible');
            }
            },

        });
    }

    empezar();

    function agendarUnaCita(){
      try{
        let obj = {id: horarioActual.id}; 
        console.log(obj);
        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
          url: "AgendarSeguimientos",
          type: "POST",
          data: {horario:JSON.stringify(obj) , _token: '{{csrf_token()}}' } ,
          success: function (result) {
              console.log("success");
              mostrarMensaje("success","Cita agenda correctamente");
              calendar.fullCalendar('refetchEvents');
          },
          error: function(status, error){
            mostrarMensaje("error","Hubo un error al agendar la cita");
          }
      });
      }catch(err){
        mostrarMensaje("error","Hubo un error en la conexion con la base de datos");
      }


    }



</script>