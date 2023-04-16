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
</head>

<body onload="cargaInicial()">
    <!--Main Navigation-->
    @include('layouts.header')
    <!--Main Navigation-->
    <form method="post" action="/EstudianteDetalle/{{$estudiante-> id}}" id="formInformacionDetallada">
        @csrf
        @method('PUT')
        <!--<input type="hidden" name="_method" value="PUT"> -->
        <!-- Aqui empieza el  formulario -->
        <div class="form-card">
            <h4>VICERRECTORÍA DE DOCENCIA</h4>
            <H5>ÉXITO ACADÉMICO</H5>
            <h4>REGISTRO DE ENTREVISTA</h4>
            <!-- Hilera del formulario -- nombre -->

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">NOMBRE COMPLETO:</span>
                </div>
                <input type="text" class="form-control" id="campo-nombre" value="{{ $estudiante->name.' '.$estudiante->apellido }}" aria-describedby="basic-addon1" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">NUMERO DE IDENTIFICACIÓN:</span>
                </div>
                <input type="hidden" value="{{ $estudiante->id }}">
                <input type="number" class="form-control no-spin" aria-describedby="basic-addon1" value="{{ $estudiante->id }}" disabled>
            </div>
            <!-- Hilera del formulario -- cedula y telefono -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">FECHA DE NACIMIENTO:</span>
                    <input type="date" class="form-control" name="campo-fecha-nacimiento" id="campo-fecha-nacimiento" aria-describedby="basic-addon2" require value="{{$estudianteDetalle->fecha_nacimiento}}" readonly>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">EDAD:</span>
                    <input type="number" class="form-control" name="campo-edad" id="campo-edad" aria-describedby="basic-addon2" autocomplete="off" require min="16" max="100" value="{{$estudianteDetalle->edad}}" readonly>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">TEL. CELULAR:</span>
                </div>
                <input type="number" class="form-control no-spin" placeholder="Celular" name="campo-tel-celular" id="campo-tel-celular" aria-describedby="basic-addon2" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" require value="{{$estudianteDetalle->tel_celular}}">

                <div class="input-group-append">
                    <span class="input-group-text">TEL. HABITABIÓN:</span>
                </div>
                <input type="number" class="form-control no-spin" placeholder="Habitacion" name="campo-tel-habitacion" id="campo-tel-habitacion" aria-describedby="basic-addon2" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" require value="{{$estudianteDetalle->tel_habitacion}}">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">ESTADO CIVIL:</span>
                </div>
                <select class="form-control" name="campo-estado-civil" id="campo-estado-civil" form="formInformacionDetallada" aria-describedby="basic-addon2" style="margin-right: 15px;">
                    <option value="Soltero(a)">Soltero(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Union libre/Union de hecho">Union libre/Union de hecho</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Viudo(a)">Viudo(a)</option>
                </select>
                <div class="input-group-append">
                    <span class="input-group-text" style="margin-right: 10px;">HIJOS:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-hijos" id="campo-hijos1" onclick="habilitarCampoHijos3()">
                        <label class="form-check-label" for="campo-hijos1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-hijos" id="campo-hijos2" onclick="deshabilitarCampoHijos3()">
                        <label class="form-check-label" for="campo-hijos2">No</label>
                    </div>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">CUANTOS:</span>
                </div>
                <input type="number" class="form-control" name="campo-hijos" id="campo-hijos3" aria-describedby="basic-addon2" require min="0" value="{{$estudianteDetalle->hijos}}">
                <script>
                    function deshabilitarCampoHijos3() {
                        document.getElementById("campo-hijos3").setAttribute('readonly', true);
                        document.getElementById("campo-hijos3").value = '0';
                    }

                    function habilitarCampoHijos3() {
                        document.getElementById("campo-hijos3").removeAttribute('readonly');
                        document.getElementById("campo-hijos3").value = "{{$estudianteDetalle->hijos}}";
                    }
                </script>
            </div>
            <!-- Hilera del formulario -- Correo y beca -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">CORREO:</span>
                </div>
                <input type="email" class="form-control" name="campo-correo" id="campo-correo" aria-describedby="basic-addon2" value="{{ $estudiante->email}}" disabled>

                <div class="input-group-append">
                    <span class="input-group-text">ZONA DE PROCEDENCIA:</span>
                </div>
                <input type="text" class="form-control" name="campo-procedencia" id="campo-procedencia" aria-describedby="basic-addon2" value="{{ $estudianteDetalle->zona_procedencia}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">DIRECCIÓN ACTUAL:</span>
                </div>
                <input type="text" class="form-control" name="campo-direccion" id="campo-direccion" aria-describedby="basic-addon1" value="{{ $estudianteDetalle->direccion_actual}}">
            </div>
            <br>
            <h5> DATOS FAMILIARES </h5>
            <!-- Hilera del formulario -- Carrera y ano de ingreso -->
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">¿Con quién/es vive? </span>
                </div>
                <input type="text" class="form-control" name="campo-vivenda" id="campo-vivenda" aria-describedby="basic-addon2" value="{{ $estudianteDetalle->familiares_convive}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">¿Cómo es su relación con esta/s persona/s? </span>
                </div>
                <input type="text" class="form-control" name="campo-relacion" id="campo-relacion" aria-describedby="basic-addon2" value="{{ $estudianteDetalle->familiares_relacion}}">
            </div>
            <div class="input-group-append">
                <span class="input-group-text" style="margin-right: 15px;">¿Recibe el apoyo de la familia para continuar con sus estudios?: </span>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-apoyo" id="campo-apoyo1" value="Si" onclick="habilitarCampoApoyo3()">
                    <label class="form-check-label" for="campo-apoyo1">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-apoyo" id="campo-apoyo2" onclick="deshabilitarCampoApoyo3()">
                    <label class="form-check-label" for="campo-apoyo2">No</label>
                </div>
                <input type="text" class="form-control" name="campo-apoyo" id="campo-apoyo3" aria-describedby="basic-addon2" placeholder="¿Por qué?">
            </div>
            <script>
                function deshabilitarCampoApoyo3() {
                    document.getElementById("campo-apoyo3").disabled = false;
                }

                function habilitarCampoApoyo3() {
                    document.getElementById("campo-apoyo3").disabled = true;
                    document.getElementById("campo-apoyo3").value = '';
                }
            </script>
            <br>
            <h5> SITUACIÓN SOCIOECONOMICA </h5>
            <h6> Forma en que financia los estudio universitarios </h6>

            <div class="input-group mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-financiacion" id="campo-financiacion1" value="Beca UNA" onclick="deshabilitarFinanciacion()">
                    <label class="form-check-label" for="campo-financiacion1">Beca UNA</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-financiacion" id="campo-financiacion2" value="Recursos propios" onclick="deshabilitarFinanciacion()">
                    <label class="form-check-label" for="campo-financiacion2">Recursos propios</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-financiacion" id="campo-financiacion3" value="Recursos familiares" onclick="deshabilitarFinanciacion()">
                    <label class="form-check-label" for="campo-financiacion3">Recursos familiares</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-financiacion" id="campo-financiacion4" value="Creditos educativos" onclick="deshabilitarFinanciacion()">
                    <label class="form-check-label" for="campo-financiacion4">Creditos educativos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-financiacion" id="campo-financiacion5" value="FONABE" onclick="deshabilitarFinanciacion()">
                    <label class="form-check-label" for="campo-financiacion5">FONABE</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="campo-financiacion" id="campo-financiacion6" onclick="habilitarFinanciacion()">
                    <label class="form-check-label" for="campo-financiacion6" style="margin-right: 15px;">Otros</label>

                    <input type="text" class="form-control" name="campo-financiacion" id="campo-financiacion-otros" aria-describedby="basic-addon2" disabled>
                </div>
                <script>
                    function deshabilitarFinanciacion() {
                        document.getElementById("campo-financiacion-otros").disabled = true;
                        document.getElementById("campo-financiacion-otros").value = '';
                    }

                    function habilitarFinanciacion() {
                        document.getElementById("campo-financiacion-otros").disabled = false;
                        document.getElementById("campo-financiacion-otros").value = "{{$estudianteDetalle->financiamiento}}";
                    }
                </script>
                <div class="form-check form-check-inline">
                    <!-- Trabaja -->
                    <label class="form-check-label" for="inlineRadio1" style="margin-right: 5px;">Trabaja:</label>
                    <!-- Si o NO -->
                    <input class="form-check-input" type="radio" name="campo-trabaja" id="campo-trabaja1" value="Si" onclick="habilitarTrabajo()">
                    <label class="form-check-label" for="campo-trabaja1" style="margin-right: 5px;">Si</label>
                    <input class="form-check-input" type="radio" name="campo-trabaja" id="campo-trabaja2" value="No" onclick="deshabilitarTrabajo()">
                    <label class="form-check-label" for="campo-trabaja2" style="margin-right: 15px;">No</label>

                    <input type="text" class="form-control" name="campo-trabaja-lugar" id="campo-trabaja-lugar" aria-describedby="basic-addon2" placeholder="¿Lugar de trabajo?" disabled>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Cual es su jornada laboral? </span>
                </div>
                <input type="text" class="form-control" name="campo-trabaja-jornada" id="campo-trabaja-jornada" aria-describedby="basic-addon1" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Qué motivo tiene para trabajar? </span>
                </div>
                <input type="text" class="form-control" name="campo-trabaja-motivo" id="campo-trabaja-motivo" aria-describedby="basic-addon1" disabled>
            </div>
            <script>
                function deshabilitarTrabajo() {
                    document.getElementById("campo-trabaja-lugar").disabled = true;
                    document.getElementById("campo-trabaja-jornada").disabled = true;
                    document.getElementById("campo-trabaja-motivo").disabled = true;
                    document.getElementById("campo-trabaja-lugar").value = '';
                    document.getElementById("campo-trabaja-jornada").value = '';
                    document.getElementById("campo-trabaja-motivo").value = '';
                }

                function habilitarTrabajo() {
                    document.getElementById("campo-trabaja-lugar").disabled = false;
                    document.getElementById("campo-trabaja-jornada").disabled = false;
                    document.getElementById("campo-trabaja-motivo").disabled = false;
                    document.getElementById("campo-trabaja-lugar").value = "{{$estudianteDetalle->trabajoLugar}}";
                    document.getElementById("campo-trabaja-jornada").value = "{{$estudianteDetalle->trabajoJornada}}";
                    document.getElementById("campo-trabaja-motivo").value = "{{$estudianteDetalle->trabajoMotivo}}";
                }
            </script>
            <h5> ANTECEDENTES ACADEMICOS </h5>

            <!-- Hilera del formulario -- Materia -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nombre de la institución: </span>
                </div>
                <input type="text" class="form-control" name="campo-antecedente-institucion" id="campo-antecedente-institucion" aria-describedby="basic-addon1" value="{{$estudianteDetalle->antecedenteInstitucion}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Modalidad de egresó </span>
                </div>
                <input type="text" class="form-control" name="campo-antecedente-modalidadEgreso" id="campo-antecedente-modalidadEgreso" aria-describedby="basic-addon1" value="{{$estudianteDetalle->antecedenteModalidadEgreso}}">
                <div class="input-group-prepend">
                    <span class="input-group-text">Año en que egresó </span>
                    <input type="number" class="form-control" name="campo-antecedente-annoEgreso" id="campo-antecedente-annoEgreso" aria-describedby="basic-addon1" min="1900" onclick="AnnoActual()" value="{{$estudianteDetalle->antecedenteAnnoEgreso}}">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Reprobó algún nivel durante la secundaria? ¿Cual? </span>
                </div>
                <input type="text" class="form-control" name="campo-antecedente-reprobo" id="campo-antecedente-reprobo" aria-describedby="basic-addon1" value="{{$estudianteDetalle->antecedenteReprobo}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Cuáles materias representaron mayor dificultad? </span>
                </div>
                <input type="text" class="form-control" name="campo-antecedente-materiasDificiles" id="campo-antecedente-materiasDificiles" aria-describedby="basic-addon1" value="{{$estudianteDetalle->antecedenteMateriasDificiles}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Requirió algún tipo de adecuación curricular? </span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-antecedente-adecuacion" id="campo-antecedente-adecuacion1" value="Si" onclick="habilitarAdecuacion()">
                        <label class="form-check-label" for="campo-antecedente-adecuacion1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-antecedente-adecuacion" id="campo-antecedente-adecuacion2" value="No" onclick="deshabilitarAdecuacion()">
                        <label class="form-check-label" for="campo-antecedente-adecuacion2">No</label>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Cuándo? </span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-antecedente-adecuacionCuando" id="campo-antecedente-adecuacionCuando1" value="Primaria">
                        <label class="form-check-label" for="campo-antecedente-adecuacionCuando1">Primaria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-antecedente-adecuacionCuando" id="campo-antecedente-adecuacionCuando2" value="Secundaria">
                        <label class="form-check-label" for="campo-antecedente-adecuacionCuando2">Secundaria</label>
                    </div>
                    <span class="input-group-text">¿Qué tipo de adecuación?</span>
                </div>
                <input type="text" class="form-control" name="campo-antecedente-adecuacionTipo" id="campo-antecedente-adecuacionTipo" aria-describedby="basic-addon1">
            </div>
            <script>
                function deshabilitarAdecuacion() {
                    document.getElementById("campo-antecedente-adecuacionCuando1").disabled = true;
                    document.getElementById("campo-antecedente-adecuacionCuando2").disabled = true;
                    document.getElementById("campo-antecedente-adecuacionTipo").disabled = true;
                    document.getElementById("campo-antecedente-adecuacionTipo").value = '';
                    document.getElementById("campo-antecedente-adecuacionCuando1").checked = false;
                    document.getElementById("campo-antecedente-adecuacionCuando2").checked = false;

                }

                function habilitarAdecuacion() {
                    document.getElementById("campo-antecedente-adecuacionCuando1").disabled = false;
                    document.getElementById("campo-antecedente-adecuacionCuando2").disabled = false;
                    document.getElementById("campo-antecedente-adecuacionTipo").disabled = false;
                    document.getElementById("campo-antecedente-adecuacionCuando1").checked = true;
                    document.getElementById("campo-antecedente-adecuacionTipo").value = "{{$estudianteDetalle->antecedenteAdecuacionTipo}}";
                }
            </script>
            <h5> DATOS UNIVERSITARIO </h5>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">Posee actualmente algun tipo de adecuación curricular</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-adecuacion" id="campo-universidad-adecuacion1" onclick="deshabilitarUniversidadAdecuacion()">
                        <label class="form-check-label" for="campo-universidad-adecuacion1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-adecuacion" id="campo-universidad-adecuacion2" value="No" onclick="habilitarUniversidadAdecuacion()">
                        <label class="form-check-label" for="campo-universidad-adecuacion2">No</label>
                    </div>
                    <span class="input-group-text">Especifique:</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-adecuacion" id="campo-universidad-adecuacion3" aria-describedby="basic-addon1">
                <script>
                    function deshabilitarUniversidadAdecuacion() {
                        document.getElementById("campo-universidad-adecuacion3").disabled = false;
                        document.getElementById("campo-universidad-adecuacion3").value = "{{$estudianteDetalle->universidadAdecuacion}}";
                    }

                    function habilitarUniversidadAdecuacion() {
                        document.getElementById("campo-universidad-adecuacion3").disabled = true;
                        document.getElementById("campo-universidad-adecuacion3").value = '';
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Carrera que estudia: </span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-carrera" id="campo-materia" aria-describedby="basic-addon1" value="{{ $estudianteDetalle->universidadCarrera}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Campus actual: </span>
                </div>
                <select class="form-control" name="campo-universidad-campus" id="campo-universidad-campus"  aria-describedby="basic-addon1" require value="{{ $estudianteDetalle->universidadCampus}}">
                    <option name="Campus Omar Dengo">Campus Omar Dengo</option>
                    <option name="Campus Benjamín Núñez">Campus Benjamín Núñez</option>
                    <option name="Sede Interuniversitaria">Sede Interuniversitaria</option>
                    <option name="Campus Sarapiquí">Campus Sarapiquí</option>
                    <option name="Campus Coto">Campus Coto</option>
                    <option name="Campus Pérez Zeledón">Campus Pérez Zeledón</option>
                    <option name="Campus Liberia">Campus Liberia</option>
                    <option name="Campus Nicoya">Campus Nicoya</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Año de ingreso a la UNA: </span>
                    <input type="number" class="form-control" name="campo-universidad-ingreso" id="campo-universidad-ingreso" aria-describedby="basic-addon1" min="1976" value="{{ $estudianteDetalle->universidadAnnoIngreso}}">
                </div>
                <div class="input-group-prepend">
                    <span class="input-group-text"> Nivel que cursa: </span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-nivel" id="campo-universidad-nivel" aria-describedby="basic-addon1" value="{{ $estudianteDetalle->universidadNivel}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">Fue su primera opción la carrera que estudia?</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-opcion" id="campo-universidad-opcion1" value="Si" onclick="deshabilitarUniversidadOpcion()">
                        <label class="form-check-label" for="campo-universidad-opcion1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-opcion" id="campo-universidad-opcion2" onclick="habilitarUniversidadOpcion()">
                        <label class="form-check-label" for="campo-universidad-opcion2">No</label>
                    </div>
                    <span class="input-group-text">¿Cuál era?:</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-opcion" id="campo-universidad-opcion3" aria-describedby="basic-addon1">
                <script>
                    function deshabilitarUniversidadOpcion() {
                        document.getElementById("campo-universidad-opcion3").disabled = true;
                        document.getElementById("campo-universidad-opcion3").value = '';

                    }

                    function habilitarUniversidadOpcion() {
                        document.getElementById("campo-universidad-opcion3").disabled = false;
                        document.getElementById("campo-universidad-opcion3").value = "{{$estudianteDetalle->universidadOpcion}}";
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Que lo motivó a estudiar esa carrera? </span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-motivo" id="campo-universidad-motivo" aria-describedby="basic-addon1" value="{{ $estudianteDetalle->universidadMotivacion}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Se encuenta satisfecho/a con la eleccion de carrera?</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-satisfecho" id="campo-universidad-satisfecho1" value="Si" onclick="deshabilitarUniversidadSatisfecho()">
                        <label class="form-check-label" for="campo-universidad-satisfecho1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-satisfecho" id="campo-universidad-satisfecho2" onclick="habilitarUniversidadSatisfecho()">
                        <label class="form-check-label" for="campo-universidad-satisfecho2">No</label>
                    </div>
                    <span class="input-group-text">¿Por qué?:</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-satisfecho" id="campo-universidad-satisfecho3" aria-describedby="basic-addon1">
                <script>
                    function deshabilitarUniversidadSatisfecho() {
                        document.getElementById("campo-universidad-satisfecho3").disabled = true;
                        document.getElementById("campo-universidad-satisfecho3").value = '';

                    }

                    function habilitarUniversidadSatisfecho() {
                        document.getElementById("campo-universidad-satisfecho3").disabled = false;
                        document.getElementById("campo-universidad-satisfecho3").value = "{{$estudianteDetalle->universidadSatisfecho}}";
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Estudió o estudia otra carrera?</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-otraCarrera" id="campo-universidad-otraCarrera1" onclick="habilitarUniversidadOtraCarrera()">
                        <label class="form-check-label" for="campo-universidad-otraCarrera1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-otraCarrera" id="campo-universidad-otraCarrera2" value="No" onclick="deshabilitarUniversidadOtraCarrea()">
                        <label class="form-check-label" for="campo-universidad-otraCarrera2">No</label>
                    </div>
                    <span class="input-group-text">¿Cuál?:</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-otraCarrera" id="campo-universidad-otraCarrera3" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿En que institución? </span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-otraCarrera-institucion" id="campo-universidad-otraCarrera-institucion" aria-describedby="basic-addon1">
                <script>
                    function deshabilitarUniversidadOtraCarrea() {
                        document.getElementById("campo-universidad-otraCarrera3").disabled = true;
                        document.getElementById("campo-universidad-otraCarrera-institucion").disabled = true;
                        document.getElementById("campo-universidad-otraCarrera3").value = '';
                        document.getElementById("campo-universidad-otraCarrera-institucion").value = '';

                    }

                    function habilitarUniversidadOtraCarrera() {
                        document.getElementById("campo-universidad-otraCarrera3").disabled = false;
                        document.getElementById("campo-universidad-otraCarrera-institucion").disabled = false;
                        document.getElementById("campo-universidad-otraCarrera3").value = "{{$estudianteDetalle->universidadOtraCarrera}}";
                        document.getElementById("campo-universidad-otraCarrera-institucion").value = "{{$estudianteDetalle->universidadOtraCarreraInstitucion}}";
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Tiene cursos que haya repetido y que esten pendientes a a fecha?</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-cursosRepetidos" id="campo-universidad-cursosRepetidos1" onclick="habilitarUniversidadCursosRepetidos()">
                        <label class="form-check-label" for="campo-universidad-cursosRepetidos1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-cursosRepetidos" id="campo-universidad-cursosRepetidos2" checked value="No" onclick="deshabilitarUniversidadCursosRepetidos()">
                        <label class="form-check-label" for="campo-universidad-cursosRepetidos2">No</label>
                    </div>
                    <span class="input-group-text">¿Cuáles?</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-cursosRepetidos" id="campo-universidad-cursosRepetidos3" aria-describedby="basic-addon1" disabled>
                <script>
                    function deshabilitarUniversidadCursosRepetidos() {
                        document.getElementById("campo-universidad-cursosRepetidos3").disabled = true;
                        document.getElementById("campo-universidad-cursosRepetidos3").value = '';

                    }

                    function habilitarUniversidadCursosRepetidos() {
                        document.getElementById("campo-universidad-cursosRepetidos3").disabled = false;
                        document.getElementById("campo-universidad-cursosRepetidos3").value = "{{$estudianteDetalle->universidadCursosRepetidos}}";
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Asiste a la hora consulta con los profesores de los cursos?</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-consulta" id="campo-universidad-consulta1" value="Si" onclick="deshabilitarUniversidadConsulta()">
                        <label class="form-check-label" for="campo-universidad-consulta1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-consulta" id="campo-universidad-consulta2" onclick="habilitarUniversidadConsulta()">
                        <label class="form-check-label" for="campo-universidad-consulta2">No</label>
                    </div>
                    <span class="input-group-text">¿Por qué?</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-consulta" id="campo-universidad-consulta3" aria-describedby="basic-addon1">
                <script>
                    function deshabilitarUniversidadConsulta() {
                        document.getElementById("campo-universidad-consulta3").disabled = true;
                        document.getElementById("campo-universidad-consulta3").value = '';

                    }

                    function habilitarUniversidadConsulta() {
                        document.getElementById("campo-universidad-consulta3").disabled = false;
                        document.getElementById("campo-universidad-consulta3").value = "{{$estudianteDetalle->universidadHoraConsulta}}";
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Cuántos cursos tiene matriculados? </span>
                    <input type="number" class="form-control" name="campo-universidad-cursosMatriculados" id="campo-universidad-cursosMatriculados" aria-describedby="basic-addon1" min="0" value="{{ $estudianteDetalle->universidadCursosMatriculados}}" required>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Cuántas horas de estudio independiente dedica a esos cursos? </span>
                    <input type="number" class="form-control" name="campo-universidad-horasEstudio" id="campo-universidad-horasEstudio" aria-describedby="basic-addon1" min=0 value="{{ $estudianteDetalle->universidadHoraEstudio}}">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">¿Qué tecnicas de estudio emplea? </span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-tecEstudio" id="campo-universidad-tecEstudio" aria-describedby="basic-addon1" value="{{ $estudianteDetalle->universidadTecnicasEstudio}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-right: 10px;">¿Asiste puntualmente a clases?</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-puntualClases" id="campo-universidad-puntualClases1" value="Si" onclick="deshabilitarUniversidadPuntualClases()">
                        <label class="form-check-label" for="campo-universidad-puntualClases1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="campo-universidad-puntualClases" id="campo-universidad-puntualClases2" onclick="habilitarUniversidadPuntualClases()">
                        <label class="form-check-label" for="campo-universidad-puntualClases2">No</label>
                    </div>
                    <span class="input-group-text">¿Por qué?</span>
                </div>
                <input type="text" class="form-control" name="campo-universidad-puntualClases" id="campo-universidad-puntualClases3" aria-describedby="basic-addon1">
                <script>
                    function deshabilitarUniversidadPuntualClases() {
                        document.getElementById("campo-universidad-puntualClases3").disabled = true;
                        document.getElementById("campo-universidad-puntualClases3").value = '';

                    }

                    function habilitarUniversidadPuntualClases() {
                        document.getElementById("campo-universidad-puntualClases3").disabled = false;
                        document.getElementById("campo-universidad-puntualClases3").value = "{{$estudianteDetalle->universidadPuntualClases}}";
                    }
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mencione los factores que considera, han favorecido u obstaculidado en su
                        rendiminento academico:</span>
                </div>
                <div id="divTabla">
                    <table id='tabla'>
                        <tr>
                            <td>
                                Factores que favorecen
                            </td>
                            <td>
                                Factores que obstaculizan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="campo-universidad-factoresFavorecen" class="form-control" value="{{ $estudianteDetalle->universidadFactoresFavorecen}}"></textarea>
                            </td>
                            <td>
                                <textarea name="campo-universidad-factoresObtaculizan" class="form-control" value="{{ $estudianteDetalle->universidadFactoresObtaculizan}}"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="enviar" id='boton-enviar'>Actualizar</button>
            <!-- <button type="submit" class="btn btn-primary" name="imprimir" id='boton-imprimir' onclick="window.print()">Imprimir</button> -->
        </div>
    </form>
    @include("layouts.footer")
</body>

</html>

<script>
    function cargaInicial() {
        AnnoActual();
        var selectEstadoCivil = document.getElementById("campo-estado-civil").value = "{{$estudianteDetalle->estado_civil}}";
        var campohijos1 = document.getElementById("campo-hijos1");
        var campohijos2 = document.getElementById("campo-hijos2");
        var campohijos3 = document.getElementById("campo-hijos3");
        if ("{{$estudianteDetalle->hijos}}" > 0) {
            campohijos1.setAttribute('checked', true);
            campohijos3.value = "{{$estudianteDetalle->hijos}}";
        } else {
            campohijos2.setAttribute('checked', true);
            campohijos3.setAttribute('readonly', true);
            campohijos3.value = "{{$estudianteDetalle->hijos}}";
        }
        if ("{{$estudianteDetalle->familiares_apoyo}}" == "Si") {
            document.getElementById("campo-apoyo1").setAttribute('checked', true);
            document.getElementById("campo-apoyo3").disabled = true;
            document.getElementById("campo-apoyo3").value = '';
        } else {
            document.getElementById("campo-apoyo2").setAttribute('checked', true);
            document.getElementById("campo-apoyo3").disabled = false;
            document.getElementById("campo-apoyo3").value = "{{$estudianteDetalle->familiares_apoyo}}";
        }
        switch ("{{$estudianteDetalle->financiamiento}}") {
            case "Beca UNA":
                document.getElementById("campo-financiacion1").setAttribute('checked', true);
                break;
            case "Recursos propios":
                document.getElementById("campo-financiacion2").setAttribute('checked', true);
                break;
            case "Recursos familiares":
                document.getElementById("campo-financiacion3").setAttribute('checked', true);
                break;
            case "Creditos educativos":
                document.getElementById("campo-financiacion4").setAttribute('checked', true);
                break;
            case "FONABE":
                document.getElementById("campo-financiacion5").setAttribute('checked', true);
                break;
            default:
                document.getElementById("campo-financiacion6").setAttribute('checked', true);
                document.getElementById("campo-financiacion-otros").value = "{{$estudianteDetalle->financiamiento}}";
                document.getElementById("campo-financiacion-otros").disabled = false;
                break;
        }
        if ("{{$estudianteDetalle->trabaja}}" == "Si") {
            document.getElementById("campo-trabaja1").setAttribute('checked', true);
            document.getElementById("campo-trabaja-lugar").disabled = false;
            document.getElementById("campo-trabaja-lugar").value = "{{$estudianteDetalle->trabajoLugar}}";
            document.getElementById("campo-trabaja-jornada").disabled = false;
            document.getElementById("campo-trabaja-jornada").value = "{{$estudianteDetalle->trabajoJornada}}";
            document.getElementById("campo-trabaja-motivo").disabled = false;
            document.getElementById("campo-trabaja-motivo").value = "{{$estudianteDetalle->trabajoMotivo}}";
        } else {
            document.getElementById("campo-trabaja2").setAttribute('checked', true);
        }
        if ("{{$estudianteDetalle->antecedenteAdecuacion}}" == "Si") {
            document.getElementById("campo-antecedente-adecuacion1").setAttribute('checked', true);
            if ("{{$estudianteDetalle->antecedenteAdecuacionCuando}}" == "Primaria") {
                document.getElementById("campo-antecedente-adecuacionCuando1").setAttribute('checked', true);
            } else {
                document.getElementById("campo-antecedente-adecuacionCuando2").setAttribute('checked', true);
            }
            document.getElementById("campo-antecedente-adecuacionTipo").value = "{{$estudianteDetalle->antecedenteAdecuacionTipo}}";
        } else {
            document.getElementById("campo-antecedente-adecuacion2").setAttribute('checked', true);
            document.getElementById("campo-antecedente-adecuacionCuando1").disabled = true;
            document.getElementById("campo-antecedente-adecuacionCuando2").disabled = true;
            document.getElementById("campo-antecedente-adecuacionTipo").disabled = true;
        }
        if ("{{$estudianteDetalle->universidadAdecuacion}}" != "No") {
            document.getElementById("campo-universidad-adecuacion1").setAttribute('checked', true);
            document.getElementById("campo-universidad-adecuacion3").disabled = false;
            document.getElementById("campo-universidad-adecuacion3").value = "{{$estudianteDetalle->universidadAdecuacion}}";
        } else {
            document.getElementById("campo-universidad-adecuacion2").setAttribute('checked', true);
            document.getElementById("campo-universidad-adecuacion3").disabled = true;
            document.getElementById("campo-universidad-adecuacion3").value = '';
        }
        if ("{{$estudianteDetalle->universidadOpcion}}" == "Si") {
            document.getElementById("campo-universidad-opcion1").setAttribute('checked', true);
            document.getElementById("campo-universidad-opcion3").disabled = true;
            document.getElementById("campo-universidad-opcion3").value = '';
        } else {
            document.getElementById("campo-universidad-opcion2").setAttribute('checked', true);
            document.getElementById("campo-universidad-opcion3").disabled = false;
            document.getElementById("campo-universidad-opcion3").value = "{{$estudianteDetalle->universidadOpcion}}";
        }
        if ("{{$estudianteDetalle->universidadSatisfecho}}" == "Si") {
            document.getElementById("campo-universidad-satisfecho1").setAttribute('checked', true);
            document.getElementById("campo-universidad-satisfecho3").disabled = true;
            document.getElementById("campo-universidad-satisfecho3").value = '';
        } else {
            document.getElementById("campo-universidad-satisfecho2").setAttribute('checked', true);
            document.getElementById("campo-universidad-satisfecho3").disabled = false;
            document.getElementById("campo-universidad-satisfecho3").value = "{{$estudianteDetalle->universidadSatisfecho}}";
        }
        if ("{{$estudianteDetalle->universidadOtraCarrera}}" == "No") {
            document.getElementById("campo-universidad-otraCarrera2").setAttribute('checked', true);
            document.getElementById("campo-universidad-otraCarrera3").disabled = true;
            document.getElementById("campo-universidad-otraCarrera3").value = '';
            document.getElementById("campo-universidad-otraCarrera-institucion").disabled = true;
            document.getElementById("campo-universidad-otraCarrera-institucion").value = '';
        } else {
            document.getElementById("campo-universidad-otraCarrera1").setAttribute('checked', true);
            document.getElementById("campo-universidad-otraCarrera3").disabled = false;
            document.getElementById("campo-universidad-otraCarrera3").value = "{{$estudianteDetalle->universidadOtraCarrera}}";
            document.getElementById("campo-universidad-otraCarrera-institucion").disabled = false;
            document.getElementById("campo-universidad-otraCarrera-institucion").value = "{{$estudianteDetalle->universidadOtraCarreraInstitucion}}";
        }
        if ("{{$estudianteDetalle->universidadCursosRepetidos}}" == "No") {
            document.getElementById("campo-universidad-cursosRepetidos2").setAttribute('checked', true);
            document.getElementById("campo-universidad-cursosRepetidos3").disabled = true;
            document.getElementById("campo-universidad-cursosRepetidos3").value = '';
        } else {
            document.getElementById("campo-universidad-cursosRepetidos1").setAttribute('checked', true);
            document.getElementById("campo-universidad-cursosRepetidos3").disabled = false;
            document.getElementById("campo-universidad-cursosRepetidos3").value = "{{$estudianteDetalle->universidadCursosRepetidos}}";
        }
        if ("{{$estudianteDetalle->universidadHoraConsulta}}" == "Si") {
            document.getElementById("campo-universidad-consulta1").setAttribute('checked', true);
            document.getElementById("campo-universidad-consulta3").disabled = true;
            document.getElementById("campo-universidad-consulta3").value = '';
        } else {
            document.getElementById("campo-universidad-consulta2").setAttribute('checked', true);
            document.getElementById("campo-universidad-consulta3").disabled = false;
            document.getElementById("campo-universidad-consulta3").value = "{{$estudianteDetalle->universidadHoraConsulta}}";
        }
        if ("{{$estudianteDetalle->universidadPuntualClases}}" == "Si") {
            document.getElementById("campo-universidad-puntualClases1").setAttribute('checked', true);
            document.getElementById("campo-universidad-puntualClases3").disabled = true;
            document.getElementById("campo-universidad-puntualClases3").value = '';
        } else {
            document.getElementById("campo-universidad-puntualClases2").setAttribute('checked', true);
            document.getElementById("campo-universidad-puntualClases3").disabled = false;
            document.getElementById("campo-universidad-puntualClases3").value = "{{$estudianteDetalle->universidadPuntualClases}}";
        }
    }

    function empezar() {
        $(".opcion-tabla").hover(function() {
            $(this).css("background-color", "#f6f799");
        }, function() {
            $(this).css("background-color", "white");
        });
    }

    empezar();

    function AnnoActual() {
        var today = new Date();
        var yyyy = today.getFullYear();
        document.getElementById("campo-antecedente-annoEgreso").setAttribute("max", yyyy);
        document.getElementById("campo-universidad-ingreso").setAttribute("max", yyyy);
    }
</script>