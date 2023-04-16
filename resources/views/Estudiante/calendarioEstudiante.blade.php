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

    <script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="{{ asset('fullcalendar-5.5.1/lib/main.css') }}" rel="stylesheet">
    <script src="{{ asset('fullcalendar-5.5.1/lib/main.js') }}"></script>
    <script src="{{ asset('fullcalendar-5.5.1/lib/locales/es.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->
    <!-- Aqui empieza el  formulario -->
    <div class="form-card">
        <h4 class="text-center" >VICERRECTORIA DE DOCENCIA</h4>
        <H5 class="text-center" >ÉXITO ACADEMICO</H5>
        <h4 class="text-center" >CALENDARIO DEL ESTUDIANTE</h4>
        <h3 class="text-center">{{$estudiante->name}} {{$estudiante->apellido}}</h3>

        <!-- Disponibilidad del Estudiante -->
        <!-- Aqui empieza el  formulario -->
        <div class="form-card">
            <div class="container">
                <div id="calendar"></div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body table-responsive">
                    <h2 class="text-center">Informacion de la clase</h3>
                    <h4 class="text-center" id='infoCurso'></h4>
                    <h4 class="text-center" id='codigoAula'></h4>
                    <h4 class="text-center" id='sedeAula'></h4>
                    <h4 class="text-center" id='nombreAula'></h4>
                    <h4 class="text-center" id='nombreTutor'></h4>
                    <h4 class="text-center" id='horaInicio'></h4>
                    <h4 class="text-center" id='fechaClase'></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN del modal para desplegar la clase -->


        <!-- Modal para mostrar una reunion-->

        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body table-responsive">
                    <h2 class="text-center">Informacion de la reunion</h3>
                    <h4 class="text-center" id='tipo'></h4>
                    <h4 class="text-center" id='estado'></h4>
                    <h4 class="text-center" id='asesor'></h4>
                    <h4 class="text-center" id='emailAsesor'></h4>
                    <h4 class="text-center" id='descripcion'></h4>
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- FIN del modal para desplegar la reunion -->




    </div>
    @include("layouts.footer")
</body>

</html>

<script>
listaClases = [];
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: false,
            weekends: false,
            editable: false,
            select: function(start, end) {
                if (start.isBefore(moment())) {
                    $('#calendar').fullCalendar('unselect');
                    return false;
                }
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            eventClick: function(info) {
                console.log(info.event.extendedProps.reunion_id);
                console.log(info.event.extendedProps.clase_id);
                console.log(info.event.extendedProps.tipo_evento);
                if(info.event.extendedProps.tipo_evento == 'curso'){
                    $("#infoCurso").empty();
                    $("#codigoAula").empty();
                    $("#sedeAula").empty();
                    $("#nombreAula").empty();
                    $("#nombreTutor").empty();
                    $("#horaInicio").empty();
                    $("#fechaClase").empty();
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/calendarioEstudiante/"+info.event.extendedProps.clase_id,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(clase) {
                        console.log(clase);
                        /*
                        <h4 id='infoCurso'></h4>
                        <h4 id='codigoAula'></h4>
                        <h4 id='sedeAula'></h4>
                        <h4 id='nombreAula'></h4>
                        <h4 id='nombreTutor'></h4>
                        <h4 id='horaInicio'></h4>
                        <h4 id='fechaClase'></h4>
                        */
                    $("#infoCurso").append("Curso: "+clase.nombre_curso);
                    $("#codigoAula").append("Codigo del Aula: "+clase.codigo_aula);
                    $("#sedeAula").append("Sede: "+clase.sede_aula);
                    $("#nombreAula").append("Aula: "+clase.nombre_aula);
                    $("#nombreTutor").append("Tutor: "+clase.nombre_tutor +" "+clase.apellido_tutor);
                    $("#horaInicio").append("Hora: "+clase.hora_inicio);
                    $("#fechaClase").append("Fecha: "+clase.fecha);
                    

                        $('#exampleModalCenter').modal('toggle');
                    },
                    error: function(result) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error al cargar la clase'
                            })
                    }
                });
            }
            else{
                    $("#tipo").empty();
                    $("#estado").empty();
                    $("#asesor").empty();
                    $("#emailAsesor").empty();
                    
                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/calendarioEstudiante/"+info.event.extendedProps.reunion_id,
                    type: 'put',
                    dataType: 'JSON',
                    success: function(reunion) {
                        console.log(reunion);
                        $("#tipo").append("Tipo: "+ reunion.tipo);
                        $("#estado").append("Estado: "+ reunion.estado_reu);
                        $("#asesor").append("Nombre de la persona asesora: "+ reunion.nombre_asesor +" "+ reunion.apellido_asesor) ;
                        $("#emailAsesor").append("Email de persona asesora: " + reunion.emailAsesor);
                        $("#descripcion").append("Descripcion: "+ reunion.descripcion)

                        $('#exampleModalCenter2').modal('toggle');
                    },
                    error: function(result) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error al cargar la clase'
                            })
                    }
                });
            }
            },
            events: "{{url('/calendarioEstudiante/create')}}"
        });

        calendar.setOption('locale', 'Es')
        calendar.render();


    });

    function empezar(){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/calendarioEstudiante/estudiante/edit',
                type: 'get',
                dataType: 'JSON',
                success: function(clases) {
                    console.log(clases);
                    if(clases.length == 0){
                        Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'No se encontraron clases asignadas'
                        })
                    }
                },
                error: function(result) {
                    
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/calendarioEstudiante/10',
                type: 'get',
                dataType: 'JSON',
                success: function(clases) {
                    console.log(clases);
                },
                error: function(result) {
                    
                }
            });
    }
    empezar();
</script>