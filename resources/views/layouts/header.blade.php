<link href="{{ asset('css/styleHeader.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="Imagenes/logo-blanco.png" type="image/x-icon" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<header>

    <!-- Modal -->
    <div class="modal fade" id="ModalBuscar" tabindex="-1" role="dialog" aria-labelledby="ModalBuscarTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalBuscarTitle">Buscar por cédula</h5>
                    <button type="button" class="close" data-dismiss="modal" id="cerrar" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="campo-id">Cédula</label>
                            <input type="text" class="form-control" name="campo-id" id="campo-id" list="listEstudiantes">
                            <datalist id="listEstudiantes"></datalist>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnBuscar" class="btn btn-info">Buscar</button>
                    <button id="btnCancelar" data-dismiss="modal" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN Modal -->
    <!-- ****** Bara del header ************ -->
    <nav class="navbar navbar-expand-lg navbar-dark default-color">
        <a class="logoHeader"><img src="/imagenes/logo-largo.png" id="logoLargo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::user() == null)
            <!-- ///////////////////////////////////////////////////////////////////////////// Header Vacio ///////////////////////////////////////////////////////////////////////////// -->
            <ul class="navbar-nav mr-auto navbar-rigth">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio<span class="sr-only">(current) </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/"> <img src="/imagenes/home.png"><span class="sr-only">(current) </span></a>
                </li>
            </ul>
            @else
            @switch(Auth::user()->rol)
            @case(0)
            <!-- ///////////////////////////////////////////////////////////////////////////// Header Super Usuario ///////////////////////////////////////////////////////////////////////////// -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logged_in">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/User">Registrar Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Asesores">Eliminar asesores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Tutores">Eliminar tutores</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="/Aula" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aulas
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/Aula">Ver Aulas</a>
                        <a class="dropdown-item" href="/Aula/create">Agregar Aula</a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="/Cursos" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cursos
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/CursosDetallados">Ver Cursos</a>
                        <a class="dropdown-item" href="/CursosDetallados/create">Agregar Curso</a>
                        <a class="dropdown-item" href="/Cursos">Administar Cursos</a>
                    </div>
                </li>
            </ul>
            @break
            @case(1)
            <!-- ///////////////////////////////////////////////////////////////////////////// Header Administrador ///////////////////////////////////////////////////////////////////////////// -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logged_in">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/User">Registrar Usuario</a>
                </li>
            </ul>
            @break
            @case(2)
            <!-- ///////////////////////////////////////////////////////////////////////////// Header Asesor ///////////////////////////////////////////////////////////////////////////// -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logged_in">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link" id="seguimientoModal">Seguimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Calendario">Calendario</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Solicitudes de Seguimiento
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/SolicitudPrimerSeguimiento">Primer Contacto</a>
                        <a class="dropdown-item" href="/SolicitudSeguimientoRegular">Seguimiento Regular</a>
                    </div>
                </li>
            </ul>
            @break
            @case(3)
            <!-- ///////////////////////////////////////////////////////////////////////////// Header Tutor ///////////////////////////////////////////////////////////////////////////// -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logged_in">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Clases">Sesiones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calendarioTutor">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Tutorias-estudiantes">Estudiantes Asignados</a>
                </li>
            </ul>
            @break
            @case(4)
            <!-- ///////////////////////////////////////////////////////////////////////////// Header Estudiante ///////////////////////////////////////////////////////////////////////////// -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logged_in">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/SolicitudSeguimientosEstudiante">Solicitudes<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calendarioEstudiante">Calendario<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/EstudianteDetalle">Actulizar Informacion Personal<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Solicitudes de Seguimiento
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/SolicitudPrimerSeguimiento/create">Primer Contacto</a>
                        <a class="dropdown-item" href="/SolicitudSeguimientoRegular/create">Seguimiento Regular</a>
                    </div>
                </li>                
            </ul>
            @break
            @default
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            @endswitch
            @endif
            <ul class="navbar-nav navbar-rigth">
                @if (Route::has('login'))
                @auth
                <a class="nav-link" >
                    {{Auth::user()->name}} {{Auth::user()->apellido}}
                </a>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu " style="margin-left: -119%;" aria-labelledby="navbarDropdownMenuLink">
                        <a class="nav-link" href="/user/profile" :active="request()->routeIs('profile.show')">
                            {{ __('Actualizar Perfil') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Salir') }}
                            </a>
                        </form>

                    </div>
                </li>


                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                </li>
                @endif
                @endif
                @endif
            </ul>
        </div>

    </nav>
</header>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/Estudiante/Listar',
            type: 'get',
            dataType: 'JSON',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = response[i].id;
                    var nombre = response[i].nombre;
                    var apellido = response[i].apellido;
                    $('#listEstudiantes').append($('<option>', {
                        value: id,
                        text: nombre + " " + apellido
                    }));
                }
            },
            error: function(result) {}
        });
    });

    $('#seguimientoModal').click(function() {
        $('#ModalBuscar').modal('show');
    });
    $('#btnBuscar').click(function() {
        window.location.href = "{{url('/Seguimientos')}}/" + $('#campo-id').val();
    });

    $('#btnCancelar').click(function() {
        $('#ModalBuscar').modal('hide');
    });

    $('#cerrar').click(function() {
        $('#ModalBuscar').modal('hide');
    });
</script>