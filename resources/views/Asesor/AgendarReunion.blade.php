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
    <link href="{{ asset('css/mensaje.css') }}" rel="stylesheet">

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
    <script src="{{ asset('js/mensaje.js') }}"></script>
</head>

<body>
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->

    <!-- Mensaje que se despliega-->
    <div class="mensaje-container" id="mensaje-info" style="display:none;">
        <div class="col-3 icono-mensaje d-flex align-items-center" id="icono-mensaje"></div>
        <div class="col-9 texto-mensaje d-flex align-items-center text-center mx-2" id="texto-mensaje" style="color: #046704e8; ">Mensaje</div>
    </div>

    <!-- Aqui empieza el  formulario -->
    <div class="form-card">
        <h4>VICERRECTORIA DE DOCENCIA</h4>
        <H5>EXITO ACADEMICO</H5>
        <h4>CALENDARIZAR REUNION</h4>
        <div class="form-card">
            <div class="container">
                <h5>Calendario de {{Auth::user()->name}} {{Auth::user()->apellido}}</h5>
                <div id="calendar"></div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Calendarizar Seguimiento</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="campo-id" id="campo-id">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="campo-fecha">Fecha</label>
                                <input type="date" class="form-control" name="campo-fecha" id="campo-fecha" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="campo-hora"><strong style="color:red">*</strong>Hora</label>
                                <input type="time" class="form-control" name="campo-hora" id="campo-hora" placeholder="Hora" min="07:00" max="21:00" step="1800" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="campo-duracion"><strong style="color:red">*</strong>Duracion(Horas)</label>
                                <input type="number" class="form-control" name="campo-duracion" id="campo-duracion" placeholder="duracion" min="1" max="2" value="1" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="campo-asesor">Asesor</label>
                            <select class="form-control" name="campo-asesor" id="campo-asesor"></select>
                        </div>
                        <div class="form-group">
                            <label for="campo-descripcion">Descripcion o Link de reunion virtual</label>
                            <textarea class="form-control" name="campo-descripcion" id="campo-descripcion" placeholder="descripcion o link"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="campo-tipo">Tipo de Seguimiento</label>
                            <input type="text" class="form-control" name="campo-tipo" id="campo-tipo" value='{{$tipo}}' readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAgregar" class="btn btn-success">Agregar</button>
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
    $(document).ready(function() {
        $.ajax({
            url: '/Asesor/Listar',
            type: 'get',
            dataType: 'JSON',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = response[i].id;
                    var nombre = response[i].nombre;
                    var apellido = response[i].apellido;
                    var selected1 = false;
                    if (id == '{{Auth::user()->id}}') {
                        selected1 = true
                    }
                    $('#campo-asesor').append($('<option>', {
                        value: id,
                        text: nombre + " " + apellido,
                        selected: selected1
                    }));
                }
            },
            error: function(result) {}
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            weekends: false,
            editable: false,
            /*select: function(start, end) {
                if (start.isBefore(moment())) {
                    $('#calendar').fullCalendar('unselect');
                    return false;
                }
            },*/
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            dateClick: function(info) {
                limpiarFormurario();
                $('#campo-fecha').val(info.dateStr);
                $('#campo-tipo').val('{{$tipo}}');
                $("#btnAgregar").prop("disabled", false);

                $('#exampleModalCenter').modal('toggle');

            },
            eventClick: function(info) {
                console.log(info);

                $("#btnAgregar").prop("disabled", true);

                mes = (info.event.start.getMonth() + 1);
                mes = (mes < 10) ? "0" + mes : mes;
                dia = (info.event.start.getDate());
                dia = (dia < 10) ? "0" + dia : dia;
                anio = (info.event.start.getFullYear());

                hora = (info.event.start.getHours());
                hora = (hora < 10) ? "0" + hora : hora;
                minutos = (info.event.start.getMinutes());
                minutos = (minutos < 10) ? "0" + minutos : minutos;
                $('#campo-id').val(info.event.id);
                $('#campo-fecha').val(anio + "-" + mes + "-" + dia);
                $('#campo-hora').val(hora + ":" + minutos);
                $('#campo-duracion').val(info.event.extendedProps.duracion);
                $('#campo-descripcion').val(info.event.extendedProps.descripcion);
                $('#campo-tipo').val(info.event.extendedProps.tipo);

                $('#exampleModalCenter').modal('toggle');
            },
            events: "{{url('/Calendario/show')}}"
        });

        calendar.setOption('locale', 'Es')
        calendar.render();

        $('#btnAgregar').click(function() {
            ObjEvento = recolectarDatosGUI("POST");
            EnviarInformacion('', ObjEvento);
        });

        $('#btnCancelar').click(function() {
            $('#exampleModalCenter').modal('hide');
        });

        $('#cerrar').click(function() {
            $('#exampleModalCenter').modal('hide');
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
                asesor_id: $('#campo-asesor').val(),
                estudiante_id: '{{$estudiante-> id}}',
                start: $('#campo-fecha').val() + " " + $('#campo-hora').val(),
                end: fecha_end,
                duracion: $('#campo-duracion').val(),
                descripcion: $('#campo-descripcion').val(),
                tipo: $('#campo-tipo').val(),
                estado: 'Pendiente',
                backgroundColor: "#2ECC71",
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
                    if (msg == "Error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'El estudiante ya tiene una reunion pendiente!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(function() {
                            window.location.href = "{{url('/Asesor')}}";
                        }, 2000);
                    } else {
                        console.log(msg);
                        $('#exampleModalCenter').modal('toggle');
                        calendar.refetchEvents();
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito',
                            text: 'Reunion Calendarizada con Exito!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(function() {
                            window.location.href = "{{url('/Asesor')}}";
                        }, 2000);
                    }
                },
                error: function() {
                    mostrarMensaje('error', "Error en el servidor");
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

            $('#exampleModalCenter').modal('toggle');
        }
    });
</script>