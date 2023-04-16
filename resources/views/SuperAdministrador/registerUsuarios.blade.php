<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,initial-scale=1, shrink-to-fit=no">

    <title>Seguimiento Estudiantil</title>

    <link rel="shortcut icon" href="Imagenes/logo-blanco.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.header')
</head>

<body style="background-color: #cc071e;">
    <form action="/User" id="registrarUsuario" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 p-0">
            <div class="row mb-2">
                <span class="display-4 text-white">Registro de Usuarios</span>
            </div>
            <div class="row mb-5" style="background-color: #fff; padding: 4rem 2rem 6rem 2rem; border-radius: 10px;  box-shadow: 0px 0px 7px 0.2px #626262;">
                <div class="mensaje-container" id="mensaje-info" style="display:none;  ">
                    <div class="col-3 icono-mensaje d-flex align-items-center" id="icono-mensaje"></div>
                    <div class="col-9 texto-mensaje d-flex align-items-center text-center mx-2" id="texto-mensaje" style="color: #046704e8; ">Participante agregado correctamente</div>
                </div>
                <div class="col-sm-12 col-md-6 float-sm-none d-flex justify-content-center align-items-center ">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-4">
                                    <input class="form-control no-spin" type="number" id="cedula" name="id" placeholder="Cédula" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required autofocus autocomplete="id">
                                    <span class="input-group-text"><i class="fas fa-id-card text-primary"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-4">
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                                    <span class="input-group-text"><i class="fas fa-user text-primary"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-4">
                                    <input class="form-control" placeholder="Correo" type="email" id="email" name="email" required>
                                    <span class="input-group-text"><i class="fas fa-envelope text-primary"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-4">
                                    <input class="form-control" placeholder="Apellidos" type="text" id="apellido" name="apellido" required>
                                    <span class="input-group-text"><i class="fas fa-user text-primary"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-4">
                                    <input class="form-control" placeholder="Contraseña" type="password" name="password" id="contrasena" required>
                                    <span class="input-group-text"><i class="fas fa-key text-primary"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-4">
                                    <select class="form-control btn btn-secondary dropdown-toggle" name="rol" id="rol" form="registrarUsuario">
                                        <option class="dropdown-item" value="0" checked>Super Administrador</option>
                                        <option class="dropdown-item" value="1">Administrador</option>
                                        <option class="dropdown-item" value="2">Supervisor</option>
                                        <option class="dropdown-item" value="3">Tutor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="Confirmar contraseña" type="password" id="confirmPassword" name="password_confirmation">
                                    <span class="input-group-text"><i class="fas fa-key text-primary"></i></span>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn btn-outline-primary btn-lg w-100" type="submit" form="registrarUsuario" id='GuardarUsuario'>Registrar &nbsp;</button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="imagenes/pruebaregistro.png" alt="" class="img-responsive" style="max-width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
<!--  Se incluye el footer  -->
@include("layouts.footer")

</html>



<script>
    function init() {
        id2 = document.getElementById("id").value
        name2 = document.getElementById("nombre").value
        apellido2 = document.getElementById("apellido").value
        email2 = document.getElementById("email").value
        user2 = document.getElementById("usuario").value
        contrasena2 = document.getElementById("contrasena").value
        rol2 = document.getElementById("rol").value



        let obj = {
            id: id2,
            name: name2,
            apellido: apellido2,
            email: email2,
            user: user2,
            contrasena: contrasena2,
            rol: rol2
        }
        guarda(obj);
    }


    function guarda(datos) {

        console.log("Entro a guardar con:");
        console.log(datos);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "User",
            type: "POST",
            data: {
                usu: JSON.stringify(datos),
                _token: '{{csrf_token()}}'
            },
            success: function(result) {
                console.log("success");
                console.log(result);
            }
        });
    }
</script>