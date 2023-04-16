<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</head>

<body>
    <!--Main Navigation-->
    @include("layouts.header")
    <!--Main Navigation-->

    <!-- Aqui empieza el  formulario -->
    <div class="form-card">
        <h4>VICERRECTORIA DE DOCENCIA</h4>
        <H5>PROGRAMA ÉXITO ACADEMICO</H5>
        <h4>CONTRATO DEL SERVICIO DE TUTORIA INDIVIDUAL Y ESPECIALIZADA</h4>
        <!-- Hilera del formulario -- nombre -->
        <div class="input-group mb-3">
            <p>La tutoria individual y especializada consiste en sesiones de trabajo de __ semanales,
                en las que se brinda apoyo academico para la revisión y practica de conceptos claves
                del curso. Este servicio se asigna de acuerdo a la valoracion del profesional en Orientación
                de la Unidad Academica a la que pertenece el estudiante. Incluyendo los siguientes apoyos:
            </p>
            <ul>
                <li>Tutoria Academica en el curso que lo requiere, el momento en que se aprueba hasta finalizar el ciclo
                    lectivo</li>
                <li>Seguimiento académico por parte del profecional en Orientacion asignado a la Unidad Académica a la
                    cual pertenece el estudiante</li>
                <li>Talleres en relación con temas psicoeducativos y academicos impartidos por el Programa Éxito
                    Académico</li>
            </ul>
            <H5>REQUISITOS</H5>
            <ol>
                <li> Estar matriculado en el curso para el cual solicita la tutoria</li>
                <li> Asistir semanalmente a clases y a la hora consulta del profesor del curso</li>
                <li> Cumplir minomo con las horas de estudio independiente establecidas en el programa del curso o más
                    de acuerdo a las condiciones propias del estudiante</li>
                <li> Realizar semanalmente las tareas formativas asignadas en las tutorias</li>
                <li> Asistir puntualmente a las tutorias</li>
                <li> Firmar semanalmente la lista de asistencia</li>
                <li> Justificar en la recepción del programa, en un plazo de ocho dias naturale, en caso de ausentarse a
                    la tutoria</li>
                <li> Durante el espacio de tutoria se prohibe el uso del telefono celular. En caso de presentar alguna
                    situación especial, comunicarlo al tutor</li>
                <li> Mantener comunicación constante con el profecional en Orientación para informanr acerca de avances
                    y situaciones propias de la tutoría</li>
                <li> Presentarse puntualmente a las citas de seguimiento academico con los profesionales de Orientación
                    del Programa Éxito Académico</li>
                <li> Asistir a los talleres psicoeducativos y académicos indicados por el profecional en Orientación
                </li>
            </ol>
            <H5>Consideraciones generales</H5>
            <ul>
                <li> El servicio de tutoría individual y especializada para el curso solicitado sera asignada una unica
                    vez, sin excepción</li>
                <li> Tres ausencias injustificadas implican la suspensión del servicio asignado</li>
            </ul>
            <br>
            <p>
                Yo _________, cédula _________, estudiante del curso ____________ de la carrera de ___________
                acepto los requisitos y consideraciones generales del servicio de tutoría que he matriculado.
            </p>
            <br>
            <h6>Firma</h6>
            <p>__________</p>
            <h6>Fecha</h6>
            <p>__________</p>
        </div>
    </div>
        @include("layouts.footer")
</body>

</html>