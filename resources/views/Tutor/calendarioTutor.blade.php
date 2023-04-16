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
        <H5 class="text-center" >EXITO ACADEMICO</H5>
        <h4 class="text-center" >CALENDARIO DE TUTORIAS</h4>
        <h3 class="text-center">{{$usuario->name}} {{$usuario->apellido}}</h3>

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
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Asistencia de Estudiantes</h5>
                    </div>
                    <div class="modal-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Estudiante</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Presente</th>
                                </tr>
                            </thead>
                            <tbody id="listarEstudiantes">
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button id='btnEliminar' type="button" class="btn btn-danger" > Eliminar </button>
                        <button id="btnEnviar" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN Disponibilidad del Estudiante -->
    </div>
    @include("layouts.footer")
</body>

</html>

<script>
    let listaEstudiantes = [];
    let listaAsistencia = [];
    let claseIdTemp = 0;
    let datosTemp;
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
                //Limpiar el model
                console.log(info);
                $("#btnEnviar").prop("disabled", false);
                claseIdTemp = parseInt(info.event.id);
                cargarEstudiantes(info.event.extendedProps.curso_id);
                cargarAsistencia(info.event.id);
                $('#exampleModalCenter').modal('toggle');
            },
            events: "{{url('/calendarioTutor/show')}}"
        });

        calendar.setOption('locale', 'Es')
        calendar.render();

        $('#btnCancelar').click(function() {
            console.log("Si entra")
            $('#exampleModalCenter').modal('hide');
        });

        $('#cerrar').click(function() {
            $('#exampleModalCenter').modal('hide');
        });
        
        $('#btnEliminar').click(function() {
            console.log("Entra en eliminar")
            swal.fire({
                title: 'Seguro que quiere eliminar esta clase?',
                text: "No podras cambiarlo despues de enviada",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    eliminarClase();
                    calendar.refetchEvents();
                    $('#exampleModalCenter').modal('hide');
                    swal.fire(
                    'Eliminada!',
                    'Se elimino la clase'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                    'Cancelado'
                    )
                }
                })
            //$('#exampleModalCenter').modal('hide');
        });

        $('#btnEnviar').click(function() {
            swal.fire({
                title: 'Seguro?',
                text: "No podras cambiarlo despues de enviada",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Si, enviar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    recolectarDatosGUI();
                    $('#exampleModalCenter').modal('hide');
                    swal.fire(
                    'Enviado!',
                    'Lista de asistencia enviada.'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal.fire(
                    'Cancelado'
                    )
                }
                })
            //recolectarDatosGUI();
            //$('#exampleModalCenter').modal('hide');
        });

        function recolectarDatosGUI() {
            console.log("Entro a recolectar Datps GUI");
            console.log(listaEstudiantes);
            listaEstudiantes.forEach((est) => {
                var asistencia
                if ($("#checkbox-" + est.estudiante_id).prop("checked") == true) {
                    console.log("Es check box de " + est.estudiante_id + " esta chequeado");
                    asistencia = 1; // presente
                } else {
                    console.log("Es check box de " + est.estudiante_id + " no esta chequeado");
                    asistencia = 2; //ausente
                }
                datosTemp = {
                    clase: claseIdTemp,
                    estudiante: est.estudiante_id,
                    presencialidad: asistencia
                }

                EnviarInformacion(datosTemp);

            });


        }

        function EnviarInformacion(datos) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{url('/Asistencia')}}",
                data: datos,
                success: function(msg) {
                    console.log(msg);
                    calendar.refetchEvents();
                },
                error: function() {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al enviar los datos. Asistencias no agregadas'
                    })
                }
            });
        }

        function cargarEstudiantes(curso_id) {
            listaEstudiantes = [];
            console.log("Curso id: " + curso_id);
            $("#listarEstudiantes").empty();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ListaCursoEstudiante/' + curso_id,
                type: 'get',
                dataType: 'JSON',
                success: function(estudiantes) {
                    listaEstudiantes = estudiantes;
                    console.log(listaEstudiantes);
                    cargarListaEstudiantes(estudiantes);
                },
                error: function(result) {
                }
            });
        }

        function cargarAsistencia(clase_id) {
            console.log("Clase id: " + clase_id);
            listaAsistencia = [];
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/Asistencia/' + clase_id,
                type: 'get',
                dataType: 'JSON',
                success: function(response) {
                    cargarListaAsistencia(response);
                },
                error: function(result) {}
            });

        }

        function cargarListaAsistencia(asistencia) {
            for (let j = 0; j < asistencia.length; j++) {
                    var cell = $('#checkbox-' + asistencia[j].estudiante_id)
                    $("#trasistencia-"+asistencia[j].estudiante_id).addClass("table-success")
                    $("#btnEnviar").prop("disabled", true)
                    $("#btnEliminar").prop("disabled", true)
                    if (asistencia[j].presencialidad == 1) {
                        cell.prop( "checked" ,"true");
                        cell.prop("disabled", true)
                    } else {
                        cell.prop("checked ", "false");
                        cell.prop("disabled", true)
                    }
                }
        }

        function cargarListaEstudiantes(estudiantes) {
            $("#listarEstudiantes").empty();
            var lista = $("#listarEstudiantes")
            estudiantes.forEach((est) => {
                rowListaEstudiante(lista, est);
            });
        }

        function rowListaEstudiante(lista, est) {
            var tr = $("<tr id='trasistencia-"+ est.estudiante_id +"'/>");
            tr.html("<td>" + est.nombre + " " + est.apellido + "</td>" +
                "<td>" + est.estudiante_id + "</td>" +
                "<td>" + est.correo + "</td>" +
                "<td>" +
                "<center><div><input class='form-check-input' type='checkbox' id='checkbox-" + est.estudiante_id + "' value='' aria-label=''></div></center>" +
                "</td>"
            );
            lista.append(tr);
        }

        function eliminarClase(){
            console.log("Clase id: " + claseIdTemp);
            listaAsistencia = [];
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/Clases/' + claseIdTemp,
                type: 'DELETE',
                dataType: 'JSON',
                success: function(response) {
                    //console.log("Se supone que se elimino la mierda")
                    //window.location.reload();
                },
                error: function(result) {
                    //console.log("Pues no se elimino la basura esa")
                }
            });

        }
        function limpiarFormurario() {}
    });
</script>