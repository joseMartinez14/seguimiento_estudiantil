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
        <h4>VICERRECTORIA DE DOCENCIA</h4>
        <H5>EXITO ACADEMICO</H5>
        <h4>HORARIO ASESOR</h4>
        <div class="form-card">
            <div class="container">
                <h5>Calendario de {{Auth::user()->name}} {{Auth::user()->apellido}}</h5>
                <div id="calendar"></div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLongTitle"></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="campo-id" id="campo-id">
                        <input type="hidden" name="campo-estudiante" id="campo-estudiante">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="campo-fecha">Fecha</label>
                                <input type="date" class="form-control" name="campo-fecha" id="campo-fecha">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="campo-hora">Hora</label>
                                <input type="time" class="form-control" name="campo-hora" id="campo-hora" placeholder="Hora" min="07:00" max="21:00" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="campo-duracion">Duracion(Horas)</label>
                                <input type="number" class="form-control" name="campo-duracion" id="campo-duracion" placeholder="duracion" min="1" max="2" value="1" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="campo-descripcion">Descripcion</label>
                            <textarea class="form-control" name="campo-descripcion" id="campo-descripcion" placeholder="descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="campo-tipo">Tipo de Seguimiento</label>
                            <input type="text" class="form-control" name="campo-tipo" id="campo-tipo" readonly>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="campo-estado">Estado</label>
                                <input type="text" class="form-control" name="campo-estado" id="campo-estado" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="modal-footer">
                        <button id="btnReunion" class="btn btn-info">Realizar Reunion</button>
                        <button id="btnModificar" class="btn btn-secondary">Modificar</button>
                        <button id="btnEliminar" class="btn btn-danger">Cancelar cita</button>
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
    $('#btnCancelar').click(function() {
        $('#ModalCenter').modal().hide();
    });

    $('#cerrar').click(function() {
        $('#ModalCenter').modal().hide();
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            weekends: false,
            editable: false,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            eventClick: function(info) {
                console.log(info);
                document.getElementById("ModalLongTitle").innerHTML = "<b><u>Estudiante:</u></b> " + info.event.title;
                if (info.event.extendedProps.estado == "Realizada") {
                    $("#btnReunion").prop("disabled", true);
                    $("#btnModificar").prop("disabled", true);
                    $("#btnEliminar").prop("disabled", true);
                    $("#campo-hora").prop("disabled", true);
                    $("#campo-duracion").prop("disabled", true);
                    $("#campo-descripcion").prop("disabled", true);
                    $("#campo-fecha").prop("disabled", true);
                    $("#campo-color").prop("disabled", true);
                    $('#modal-content').css("background-color","#ff9a9a");
                    $("#modal-footer").css('display', 'none');
                    $("#btnReunion").css('display', 'none');
                    $("#btnModificar").css('display', 'none');
                    $("#btnEliminar").css('display', 'none');
                } else {
                    $("#btnReunion").prop("disabled", false);
                    $("#btnModificar").prop("disabled", false);
                    $("#btnEliminar").prop("disabled", false);
                    $("#campo-hora").prop("disabled", false);
                    $("#campo-duracion").prop("disabled", false);
                    $("#campo-fecha").prop("disabled", false);
                    $("#campo-descripcion").prop("disabled", false);
                    $("#campo-color").prop("disabled", false);
                    $('#modal-content').css("background-color","#C3FF94");
                    $("#modal-footer").css('display', 'flex');
                    $("#btnReunion").css('display', 'flex');
                    $("#btnModificar").css('display', 'flex');
                    $("#btnEliminar").css('display', 'flex');
                }


                mes = (info.event.start.getMonth() + 1);
                mes = (mes < 10) ? "0" + mes : mes;
                dia = (info.event.start.getDate());
                dia = (dia < 10) ? "0" + dia : dia;
                anio = (info.event.start.getFullYear());

                hora = (info.event.start.getHours());
                hora = (hora < 10) ? "0" + hora : hora;
                minutos = (info.event.start.getMinutes());
                minutos = (minutos < 10) ? "0" + minutos : minutos;
                $('#campo-estudiante').val(info.event.extendedProps.estudiante_id);
                $('#campo-id').val(info.event.id);
                $('#campo-fecha').val(anio + "-" + mes + "-" + dia);
                $('#campo-hora').val(hora + ":" + minutos);
                $('#campo-duracion').val(info.event.extendedProps.duracion);
                $('#campo-descripcion').val(info.event.extendedProps.descripcion);
                $('#campo-tipo').val(info.event.extendedProps.tipo);
                $('#campo-color').val(info.event.backgroundColor);
                $('#campo-estado').val(info.event.extendedProps.estado);

                $('#ModalCenter').modal('toggle');
            },
            events: "{{url('/Calendario/show')}}"
        });

        calendar.setOption('locale', 'Es')
        calendar.render();

        $('#btnReunion').click(function() {
            window.location.href = "{{url('/Calendario')}}/" + $('#campo-id').val() + "/edit";
        });

        $('#btnEliminar').click(function() {
            swal.fire({
                title: 'Seguro que quiere cancelar esta cita?',
                text: "Podras reasignarla mas tarde",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, cancelarla!',
                cancelButtonText: 'No, cancelarla!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    ObjEvento = recolectarDatosGUI("DELETE");
                    EnviarInformacion('/' + $('#campo-id').val(), ObjEvento);
                    swal.fire(
                        'Eliminada!',
                        'Se elimino la reunión con exito!'
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
        });

        $('#btnModificar').click(function() {
            ObjEvento = recolectarDatosGUI("PATCH");
            EnviarInformacion('/' + $('#campo-id').val(), ObjEvento);
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: 'Se modifico la reunión con exito!',
                showConfirmButton: false,
                timer: 2000
            });
        });


        function recolectarDatosGUI(method) {
            var fecha_star = $('#campo-fecha').val() + " " + $('#campo-hora').val();
            var d = parseInt($('#campo-duracion').val());
            var t = new Date(fecha_star.replace(/-/g, "/"));

            t.setHours(t.getHours() + d);

            var hora = t.getHours().toString();
            var minuto = t.getMinutes().toString();
            var fecha_end = $('#campo-fecha').val() + " " + hora + ":" + minuto;

            nuevoEvento = {
                id: $('#campo-id').val(),
                asesor_id: '{{$asesor->id}}',
                estudiante_id: $('#campo-estudiante').val(),
                start: $('#campo-fecha').val() + " " + $('#campo-hora').val(),
                end: fecha_end,
                duracion: $('#campo-duracion').val(),
                descripcion: $('#campo-descripcion').val(),
                tipo: $('#campo-tipo').val(),
                estado: $('#campo-estado').val(),
                backgroundColor: $('#campo-color').val(),
                textColor: '#000000',
                '_token': $("meta[name='csrf-token']").attr("content"),
                '_method': method
            }
            return (nuevoEvento);
        }

        function EnviarInformacion(accion, objEvento) {
            $.ajax({
                type: "POST",
                url: "{{url('/Calendario')}}" + accion,
                data: objEvento,
                success: function(msg) {
                    console.log(msg);
                    $('#ModalCenter').modal('toggle');
                    calendar.refetchEvents();
                },
                error: function() {
                    mostrarMensaje("error", "Hay un error");
                }
            });
        }

        function limpiarFormurario() {
            $('#campo-id').val("");
            $('#campo-fecha').val("");
            $('#campo-hora').val("");
            $('#campo-duracion').val("");
            $('#campo-descripcion').val("");
            $('#campo-tipo').val("");
            $('#campo-color').val("");
            $('#exampleModalCenter').modal('toggle');
        }
    });
</script>